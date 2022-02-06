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
        <div class="col-sm-4">
                <div class="card card1 shadow">
                    <div class="row card-body ">
                        <div class="col-sm-6 text-center text-dark">
                            <i class="fas fa-building fa-3x"></i>
                        </div>
                        <div class="col-sm-6">
                            <div class="text-center">
                                <h6>Police Station</h6>
                                <h3>{{ App\Models\PoliceStation::get()->count() }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        <div class="col-sm-4">
                <div class="card card2 shadow">
                    <div class="row card-body ">
                        <div class="col-sm-6 text-center text-dark">
                            <i class="fas fa-building fa-3x"></i>
                        </div>
                        <div class="col-sm-6">
                            <div class="text-center">
                                <h6>Hotline</h6>
                                <h3>{{ App\Models\Hotline::get()->count() }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
        </div>

    </div>
  </div>
@endsection
