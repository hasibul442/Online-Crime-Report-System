@extends('admin.layout.master')
@section('content')

<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white mr-2">
                <i class="mdi mdi-cellphone"></i>
            </span>Wanted Criminal Details
        </h3>
    </div>

    <div class="card">
        <div class="card-body">
            <h4 class="text-center"><span>Name: </span><span class="text-danger">{{ $wanted->name }}</span></h4><br>

            <div class="row">
                <div class="col-md-6">
                    <p>Father Name: {{ $wanted->father_name }}</p>
                    <p>Gender: {{ $wanted->gander }}</p>
                    <p>Address: {{ $wanted->address }}</p>
                    <p>Details: {{ $wanted->details }}</p>
                    <p>Status:
                        @if ( $wanted->status == '1')
                            <span class="text-danger">Searching</span>
                        @else
                             <span class="text-success">Arrested</span>
                        @endif
                    </p>
                </div>
                <div class="col-md-6">
                    <img src="{{ asset('admin/assets/images/wantedlist/'.$wanted->photo) }}" alt="" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
