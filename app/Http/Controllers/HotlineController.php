<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Hotline;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class HotlineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hotlines = Hotline::all();
        return view('admin.hotline.hotline',compact('hotlines'));


    }
    public function fetchdata()
    {
        $hotlines = Hotline::all();
        return response()->json([
            'hotlines'=>$hotlines,
        ]);
        // if ($request->ajax()) {
        //     $data = Category::get();
        //     return DataTables::of($data)
        //             ->addIndexColumn()
        //             ->addColumn('action', function($row){

        //                    $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';

        //                     return $btn;
        //             })
        //             ->rawColumns(['action'])
        //             ->make(true);
        // }

        //return view('admin.hotline.hotline');
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
    public function destroy(Hotline $hotline)
    {
        //
    }
}
