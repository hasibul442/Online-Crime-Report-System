@extends('admin.layout.master')

@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white mr-2">
                <i class="mdi mdi-home"></i>
            </span> Dashboard
        </h3>
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                    <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                </li>
            </ul>
        </nav>
    </div>
    <div class="row">
        @if (Auth::user()->user_type == "super_admin" )
        <div class="col-sm-4 mt-4">
            <div class="card card1 shadow">
                <div class=" card-body ">
                    <div>
                        <div class="text-center">
                            <h6>Police Station</h6>
                            <h3>{{ App\Models\PoliceStation::get()->count() }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @if (Auth::user()->user_type == "super_admin" )
        <div class="col-sm-4 mt-4">
            <div class="card card2 shadow">
                <div class="card-body ">
                    <div>
                        <div class="text-center">
                            <h6>Hotline</h6>
                            <h3>{{ App\Models\Hotline::get()->count() }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif

        <div class="col-sm-4 mt-4">
            <div class="card card3 shadow">
                <div class="card-body ">
                    <div>
                        <div class="text-center">
                            <h6>Wanted Criminal</h6>
                            <h3>{{ App\Models\wanted::get()->count() }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-4 mt-4">
            <div class="card card3 shadow">
                <div class="card-body ">
                    <div>
                        <div class="text-center">
                            <h6>Total Complain</h6>
                            @if (Auth::user()->user_type == "super_admin" )
                            <h3>{{ App\Models\Complain::where('type','complain')->get()->count() }}</h3>
                            @elseif (App\Models\Complain::where('police_station', Auth::user()->police_station )->where('type','complain')->get() && Auth::user()->user_type == "police_station")

                            <h3>{{ App\Models\Complain::where('police_station',  Auth::user()->police_station  )->where('type','complain')->get()->count() }}</h3>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-4 mt-4">
            <div class="card card3 shadow">
                <div class=" card-body ">
                    <div>
                        <div class="text-center">
                            <h6>Total Complain</h6>
                            @if (Auth::user()->user_type == "super_admin" )
                            <h3>{{ App\Models\Complain::where('type','GD')->get()->count() }}</h3>
                            @elseif (App\Models\Complain::where('police_station', Auth::user()->police_station )->where('type','GD')->get() && Auth::user()->user_type == "police_station")

                            <h3>{{ App\Models\Complain::where('police_station',  Auth::user()->police_station  )->where('type','GD')->get()->count() }}</h3>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-md-6 mt-4">
            <div class="card card3 shadow">
                <div class="card-body ">
                    <div>
                        <div class="text-center">
                            <h6>Total Pending Complain</h6>
                            @if (Auth::user()->user_type == "super_admin" )
                            <h3>{{ App\Models\Complain::where('type','complain')->where('status','Pending')->get()->count() }}</h3>
                            @elseif (App\Models\Complain::where('police_station', Auth::user()->police_station )->where('type','complain')->get() && Auth::user()->user_type == "police_station")
                            <h3>{{ App\Models\Complain::where('police_station',  Auth::user()->police_station  )->where('type','complain')->where('status','Pending')->get()->count() }}</h3>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 mt-4">
            <div class="card card3 shadow">
                <div class="card-body ">
                    <div>
                        <div class="text-center">
                            <h6>Total Solved Complain</h6>
                            @if (Auth::user()->user_type == "super_admin" )
                            <h3>{{ App\Models\Complain::where('type','complain')->where('status','Solved')->get()->count() }}</h3>
                            @elseif (App\Models\Complain::where('police_station', Auth::user()->police_station )->where('type','complain')->get() && Auth::user()->user_type == "police_station")
                            <h3>{{ App\Models\Complain::where('police_station',  Auth::user()->police_station  )->where('type','complain')->where('status','Solved')->get()->count() }}</h3>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 mt-4">
            <div class="card card3 shadow">
                <div class="card-body ">
                    <div>
                        <div class="text-center">
                            <h6>Total Pending GD</h6>
                            @if (Auth::user()->user_type == "super_admin" )
                            <h3>{{ App\Models\Complain::where('type','GD')->where('status','Pending')->get()->count() }}</h3>
                            @elseif (App\Models\Complain::where('police_station', Auth::user()->police_station )->where('type','GD')->get() && Auth::user()->user_type == "police_station")
                            <h3>{{ App\Models\Complain::where('police_station',  Auth::user()->police_station  )->where('type','GD')->where('status','Pending')->get()->count() }}</h3>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 mt-4">
            <div class="card card3 shadow">
                <div class="card-body ">
                    <div>
                        <div class="text-center">
                            <h6>Total Solved GD</h6>
                            @if (Auth::user()->user_type == "super_admin" )
                            <h3>{{ App\Models\Complain::where('type','GD')->where('status','Solved')->get()->count() }}</h3>
                            @elseif (App\Models\Complain::where('police_station', Auth::user()->police_station )->where('type','GD')->get() && Auth::user()->user_type == "police_station")
                            <h3>{{ App\Models\Complain::where('police_station',  Auth::user()->police_station  )->where('type','GD')->where('status','Solved')->get()->count() }}</h3>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
