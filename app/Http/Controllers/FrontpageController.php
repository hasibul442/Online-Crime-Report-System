<?php

namespace App\Http\Controllers;

use App\Mail\ComplainMail;
use App\Mail\GdMail;
use App\Models\Complain;
use App\Models\District;
use App\Models\Division;
use App\Models\Policestation;
use App\Models\Upazila;
use Facade\FlareClient\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class FrontpageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.home');
    }
    public function general_diary()
    {
        return view('frontend.general.general_diary');
    }
    public function general_diary_register()
    {
        $division = Division::get();
        return view('frontend.general.gd_reg',compact('division'));
    }
    public function gd_sample()
    {
        return view('frontend.general.gd_sample');
    }
    public function casestatus(Request $request)
    {
        $searchtext = $request->search_;
        $data = Complain::where('complain_no','like','%'.$searchtext.'%')->get();
        return view('frontend.casestatus',compact('data','searchtext'));
    }
    public function complaint()
    {
        return view('frontend.complain.complaint');
    }
    public function policestation()
    {
        return view('frontend.policestation');
    }
    public function helpline()
    {
        return view('frontend.helpline');
    }
    public function wantedlist()
    {
        return view('frontend.wantedcriminal');
    }
    public function expatriate()
    {
        return view('frontend.expatriate.expatriate');
    }
    public function complaint_reg()
    {
        $division = Division::get();
        return view('frontend.complain.complan-register',compact('division'));
    }
    // public function getdivision()
    // {
    //     $division = Division::get();
    //     return view('frontend.complain.complan-register',compact('division'));
    // }
    public function getdistrict($id){
        $district = District::where('division_id', $id)->get();
        return response()->json($district);
    }

    public function getupazilla($district_id){
        $upazilla = Upazila::where('district_id', $district_id)->get();
        return response()->json($upazilla);
    }
    public function getthana($upazila_id){
        $policestation = Policestation::where('upazila_id', $upazila_id)->get();
        return response()->json($policestation);
    }

    public function complainstore(Request $request)
    {
        $slug = Str::slug($request->name);
        $complain = new Complain;
        $complain->division_id = $request->division_id;
        $complain->district_id = $request->district_id;
        $complain->upazila_id = $request->upazila_id;
        $complain->police_station = $request->police_station;
        $complain->complain_no = date('ymdis').'-'.rand(0,999);
        $complain->name = $request->name;
        $complain->father_name = $request->father_name;
        $complain->nid = $request->nid;
        $complain->phone_no = $request->phone_no;
        $complain->email = $request->email;
        $complain->type = "Complain";
        $complain->description = $request->description;
        $complain->status = "Pending";
        $complain->slug = $slug.'-'.date('ymdis').'-'.rand(0,999);
        if($request->hasFile('document')){
            $image = $request->file('document');
            $image_name = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path().'/admin/assets/complain/',$image_name);
            $complain->document = $image_name;
            }

        $complain->save();
        $this->sendcomplaincode($complain);
        return response()->json(['success'=>'Data Add successfully.']);

    }
    public function sendcomplaincode($complain){
        Mail::to($complain->email)->send(new ComplainMail($complain));
    }

    public function gdstore(Request $request)
    {
        $slug = Str::slug($request->name);
        $complain = new Complain;
        $complain->division_id = $request->division_id;
        $complain->district_id = $request->district_id;
        $complain->upazila_id = $request->upazila_id;
        $complain->police_station = $request->police_station;
        $complain->complain_no = date('ymdis').'-'.rand(0,999);
        $complain->name = $request->name;
        $complain->father_name = $request->father_name;
        $complain->nid = $request->nid;
        $complain->phone_no = $request->phone_no;
        $complain->email = $request->email;
        $complain->subject = $request->subject;
        $complain->type = "GD";
        $complain->description = $request->description;
        $complain->status = "Pending";
        $complain->slug = $slug.'-'.date('ymdis').'-'.rand(0,999);
        if($request->hasFile('document')){
            $image = $request->file('document');
            $image_name = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path().'/admin/assets/complain/',$image_name);
            $complain->document = $image_name;
            }
        $complain->save();
        $this->sendgdcode($complain);
        return response()->json(['success'=>'Data Add successfully.']);

    }
    public function sendgdcode($genarel_diary){
        Mail::to($genarel_diary->email)->send(new GdMail($genarel_diary));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
