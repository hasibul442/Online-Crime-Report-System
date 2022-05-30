@extends('admin.layout.master')
@section('content')

<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
          <span class="page-title-icon bg-gradient-primary text-white mr-2">
            <i class="mdi mdi-cellphone"></i>
          </span>Case Details
        </h3>
      </div>

      <div class="card">
          <div class="card-body">
              <span class="h5 font-weight-bold">অভিযোগকারির নামঃ </span><span>{{ $complain->name }}</span><br>
              <span class="h5 font-weight-bold">পিতার নামঃ </span><span>{{ $complain->father_name }}</span><br>
              <span class="h5 font-weight-bold">বিভাগঃ </span><span>{{ $complain->division->bn_name }}</span><br>
              <span class="h5 font-weight-bold">জেলাঃ </span><span>{{ $complain->district->bn_name }}</span><br>
              <span class="h5 font-weight-bold">উপজেলাঃ </span><span>{{ $complain->upazila->bn_name }}</span><br>
              <span class="h5 font-weight-bold">থানাঃ </span><span>{{ $complain->policestation->name }}</span><br>
              <span class="h5 font-weight-bold">NID: </span><span>{{ $complain->nid }}</span><br>
              <span class="h5 font-weight-bold">Phone Number: </span><span>{{ $complain->phone_no }}</span><br>
              <span class="h5 font-weight-bold">Email: </span><span>{{ $complain->email }}</span><br><br>
              <span class="h5 font-weight-bold">বিবরণঃ </span><span>{!! $complain->description !!}</span><br>
              <span class="h5 font-weight-bold">Document </span><span><a href="{{ asset('admin/assets/complain/'.$complain->document) }}">{{ $complain->document }}</a></span><br>
              <span class="h5 font-weight-bold">Status: </span><span>{{ $complain->status}}</span><br>
          </div>
      </div>
</div>

@endsection
