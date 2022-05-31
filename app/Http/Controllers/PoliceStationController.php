<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Division;
use App\Models\Policestation;
use App\Models\Upazila;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PoliceStationController extends Controller
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
        $policestation = Policestation::get();
        $division = Division::get();
        return view('admin.police-station.police-station',compact('division','policestation'));
    }

    public function getdistrict($id){
        $district = District::where('division_id', $id)->get();
        return response()->json($district);
    }

    public function getupazilla($district_id){
        $upazilla = Upazila::where('district_id', $district_id)->get();
        return response()->json($upazilla);
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
        $users= new User;
        $policestation = new Policestation;

        $users->name = $request->name;
        $users->email = $request->email;
        $users->password = Hash::make($request['password']);
        $users->user_type = 'police_station';
        $users->save();



        $policestation->user_id = $users->id;
        $policestation->name = $request->name;
        $policestation->phone_no = $request->phone_no;
        $policestation->email = $request->email;

        $policestation->division_id = $request->division_id;
        $policestation->district_id = $request->district_id;
        $policestation->upazila_id = $request->upazila_id;
        $policestation->address = $request->address;


        $policestation->save();
        $users->police_station = $policestation->id;
        $users->save();
        return response()->json(['success'=>'Data Add successfully.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Policestation  $policestation
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $policestation = Policestation::find($id);
        return view('admin.police-station.details', compact('policestation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Policestation  $policestation
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $policestation = Policestation::find($id);
        return view('admin.police-station.edit', compact('policestation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Policestation  $policestation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $policestation = Policestation::find($request->id);
        $policestation->name = $request->name;
        $policestation->phone_no = $request->phone_no;

        $policestation->division_id = $request->division_id;
        $policestation->district_id = $request->district_id;
        $policestation->upazila_id = $request->upazila_id;
        $policestation->address = $request->address;


        $policestation->update();
        return redirect()->route('police.division');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Policestation  $policestation
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $policestation = Policestation::find($id);
        $policestation->delete();
        return response()->json(['success'=>'Data Delete successfully.']);
    }
}
