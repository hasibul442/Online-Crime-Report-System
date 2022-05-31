<?php

namespace App\Http\Controllers;

use App\Models\Wanted;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class WantedController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wantedlist = Wanted::get();
        return view('admin.wantedlist.wantedlist',compact('wantedlist'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $wanted = new Wanted;
        $wanted->name = $request->name;
        $wanted->father_name = $request->father_name;
        $wanted->address = $request->address;
        $wanted->gander = $request->gander;
        $wanted->details = $request->details;
        $wanted->status = '1';
        if($request->hasFile('photo')){
            $image = $request->file('photo');
            $image_name = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path().'/admin/assets/images/wantedlist/',$image_name);
            $wanted->photo = $image_name;
            }
        $wanted->save();
        return response()->json(['success'=>'Data Add successfully.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Wanted  $wanted
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $wanted = Wanted::find($id);
        return view('admin.wantedlist.details',compact('wanted'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Wanted  $wanted
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $wanted = Wanted::find($id);
        return view('admin.wantedlist.edit', compact('wanted'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Wanted  $wanted
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $wanted = Wanted::find($id);
        $wanted->name = $request->name;
        $wanted->father_name = $request->father_name;
        $wanted->address = $request->address;
        $wanted->gander = $request->gander;
        $wanted->details = $request->details;
        $wanted->status = '1';
        if($request->hasFile('photo')){
            $destination = public_path().'/admin/assets/images/wantedlist/'.$wanted->photo;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $image = $request->file('photo');
            $image_name = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path().'/admin/assets/images/wantedlist/',$image_name);
            $wanted->photo = $image_name;
            }
        $wanted->update();
        return redirect()->route('wanted.list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Wanted  $wanted
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $wanted = Wanted::find($id);
        if (!is_null($wanted)) {
            if(!is_null($wanted->photo)){
                $image_path = public_path().'/admin/assets/images/wantedlist/'.$wanted->photo;
                unlink($image_path);
                $wanted->delete();
                return response()->json(['success'=>'Data Delete successfully.']);
            }
            else{
                $wanted->delete();
                return response()->json(['success'=>'Data Delete successfully.']);
            }
        }
    }

    public function wantedstatusstatus($id,$status){
        $wanted = Wanted::find($id);
        $wanted->status = $status;
        $wanted->update();
        return response()->json(['success'=>'Status changed successfully.']);
    }
}
