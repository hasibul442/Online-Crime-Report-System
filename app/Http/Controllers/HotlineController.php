<?php

namespace App\Http\Controllers;

use App\Models\Hotline;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Str;

class HotlineController extends Controller
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
        $hotlines = Hotline::all();
        return view('admin.hotline.hotline1',compact('hotlines'));


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

        $hotline = new Hotline;
        $slug=Str::slug($request->title);
        $hotline->title = $request->title;
        $hotline->phone_number = $request->phone_number;
        $hotline->description = $request->description;
        $hotline->slug = $slug.'-'.date('ymdis').'-'.rand(0,999);
        $hotline->save();
        return response()->json(['success'=>'Data Add successfully.']);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hotline  $hotline
     * @return \Illuminate\Http\Response
     */
    public function show(Hotline $hotline)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hotline  $hotline
     * @return \Illuminate\Http\Response
     */
    public function edit(Hotline $hotline)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hotline  $hotline
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hotline $hotline)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hotline  $hotline
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hotlines = Hotline::find($id);
        $hotlines->delete();
        return response()->json(['success'=>'Data Delete successfully.']);

    }
}
