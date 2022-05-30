@extends('admin.layout.master')
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white mr-2">
                <i class="mdi mdi-cellphone"></i>
            </span>Police Station Details
        </h3>
    </div>

    <div class="card">
        <div class="card-body">
            <h3 class="text-center text-primary">{{ $policestation->name }}</h3>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="pl-3 pb-3">
                    <h3 class="text-center">Police Station Information</h3>
                    <span class="h6">Phone Number: </span><span>{{ $policestation->phone_no }}</span><br>
                    <span class="h6">Email: </span><span>{{ $policestation->email }}</span><br>
                    <span class="h6">Division: </span><span>{{ $policestation->division->bn_name }}</span><br>
                    <span class="h6">District: </span><span>{{ $policestation->district->bn_name }}</span><br>
                    <span class="h6">Upazila: </span><span>{{ $policestation->upazila->bn_name }}</span><br>
                    <span class="h6">Address: </span><span>{{ $policestation->address }}</span><br>
                </div>
            </div>
            <div class="col-md-6">
                <div class="pl-3 pb-3">
                    <h3 class="text-center">User Information</h3>
                    <span class="h6">User Email: </span><span>{{ $policestation->userinfo->email }}</span><br>
                    <span class="h6">User Name: </span><span>{{ $policestation->userinfo->name }}</span><br>
                    <span class="h6">User Type: </span><span>{{ $policestation->userinfo->user_type }}</span><br>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4 mt-4">
            <div class="card card2 shadow">
                <div class="card-body ">
                    <div>
                        <div class="text-center">
                            <h6>Total Complain</h6>
                            <h3>{{ App\Models\Complain::where('police_station', $policestation->id  )->where('type','Complain')->get()->count() }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 mt-4">
            <div class="card card2 shadow">
                <div class="card-body ">
                    <div>
                        <div class="text-center">
                            <h6>Pending Complain</h6>
                            <h3>{{ App\Models\Complain::where('police_station', $policestation->id  )->where('type','Complain')->where('status','Pending')->get()->count() }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 mt-4">
            <div class="card card2 shadow">
                <div class="card-body ">
                    <div>
                        <div class="text-center">
                            <h6>Solve Complain</h6>
                            <h3>{{ App\Models\Complain::where('police_station', $policestation->id  )->where('type','Complain')->where('status','Solved')->get()->count() }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4 mt-4">
            <div class="card card2 shadow">
                <div class="card-body ">
                    <div>
                        <div class="text-center">
                            <h6>Total General Diary</h6>
                            <h3>{{ App\Models\Complain::where('police_station', $policestation->id  )->where('type','GD')->get()->count() }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 mt-4">
            <div class="card card2 shadow">
                <div class="card-body ">
                    <div>
                        <div class="text-center">
                            <h6>Pending General Diary</h6>
                            <h3>{{ App\Models\Complain::where('police_station', $policestation->id  )->where('type','GD')->where('status','Pending')->get()->count() }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 mt-4">
            <div class="card card2 shadow">
                <div class="card-body ">
                    <div>
                        <div class="text-center">
                            <h6>Solve General Diary</h6>
                            <h3>{{ App\Models\Complain::where('police_station', $policestation->id  )->where('type','GD')->where('status','Solved')->get()->count() }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
