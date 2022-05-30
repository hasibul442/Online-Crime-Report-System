<?php

namespace App\Http\Controllers;

use App\Models\Complain;
use Illuminate\Http\Request;

class ComplainController extends Controller
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
        $complain = Complain::where('type','Complain')->where('status','Pending')->get();
        return view('admin.case.case', compact('complain'));
    }
    public function allcase(){
        $complain1 = Complain::where('type','Complain')->get();
        return view('admin.case.allcase',compact('complain1'));
    }
    public function gdindex()
    {
        $gd = Complain::where('type','GD')->where('status','Pending')->get();

        return view('admin.gd.gd', compact('gd'));
    }
    public function allgdindex()
    {
        $gd1 = Complain::where('type','GD')->get();
        return view('admin.gd.allgd', compact('gd1'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Complain  $complain
     * @return \Illuminate\Http\Response
     */
    public function complainshow($id)
    {
        $complain = Complain::find($id);
        return view('admin.case.details',compact('complain'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Complain  $complain
     * @return \Illuminate\Http\Response
     */
    public function edit(Complain $complain)
    {
        //
    }
    public function complainstatus($id,$status){
        $complain = Complain::find($id);
        $complain->status = $status;
        $complain->update();
        return response()->json(['success'=>'Status changed successfully.']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Complain  $complain
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Complain $complain)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Complain  $complain
     * @return \Illuminate\Http\Response
     */
    public function destroy(Complain $complain)
    {
        //
    }
}
