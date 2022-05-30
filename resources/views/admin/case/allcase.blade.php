@extends('admin.layout.master')
@section('content')

<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white mr-2">
                <i class="mdi mdi-cellphone"></i>
            </span>Complain List
        </h3>
    </div>

    <div class="card">
        <div class="card-body">

            <div class="table-responsive mt-5">
                <table id="table" class="display table2 table table-hover table-sm" >
                    <thead>
                        <th>#</th>
                        <th>Name</th>
                        <th>Police Station</th>
                        <th>Phone No</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @php
                             $i = 0;
                         @endphp
                        @foreach ($complain1 as $item)
                            @if ($item->police_station ==  Auth::user()->police_station && Auth::user()->user_type == "police_station" )
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    {{-- <td>{{ substr($item->title,0,30) }}</td> --}}
                                    <td class="text-wrap">{{ $item->name }}</td>
                                    <td class="text-wrap">
                                        {{ $item->policestation->name}}<br/>

                                    </td>
                                    <td class="text-wrap">{{ $item->phone_no}}</td>
                                    <td class="text-wrap">{{ $item->email}}</td>
                                    <td>
                                        {{-- {{ $item->status}} --}}
                                        <input name="status" class="status" id="status" type="checkbox" data-toggle="toggle" data-on="Solve" data-off="Pending" data-size="xs" data-onstyle="success" data-offstyle="info"
                                        data-id="{{ $item->id }}" {{ $item->status == "Solved" ? 'checked' : '' }}>
                                    </td>
                                    <td>
                                        <a type="button" class="btn  btn-outline-view btn-xs" href="{{ route('complain.details',$item->id) }}"><i class="mdi mdi-eye"></i></a>
                                    </td>
                                </tr>
                            @elseif(Auth::user()->user_type == "super_admin")
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td class="text-wrap">{{ $item->name }}</td>
                                {{-- <td>{{ substr($item->description,0,30) }}</td> --}}
                                <td class="text-wrap">
                                    {{ $item->policestation->name}}<br/>

                                </td>
                                <td class="text-wrap">{{ $item->phone_no}}</td>
                                <td class="text-wrap">{{ $item->email}}</td>
                                <td>
                                    {{-- {{ $item->status}} --}}
                                    <input name="status" class="status" id="status" type="checkbox" data-toggle="toggle" data-on="Solve" data-off="Pending" data-size="xs" data-onstyle="success" data-offstyle="info"
                                    data-id="{{ $item->id }}" {{ $item->status == "Solved" ? 'checked' : '' }}>
                                </td>
                                <td>
                                    <a type="button" class="btn  btn-outline-view btn-xs" href="{{ route('complain.details',$item->id) }}"><i class="mdi mdi-eye"></i></a>
                                </td>
                            </tr>
                            @endif
                        @endforeach

                    </tbody>
                </table>
            </div>


        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        var table = $('.table2').DataTable({
            "autoWidth": true
            , "processing": true,
            //"serverSide": true,
            "lengthMenu": [10, 15, 20, 25, 50, 100, 200]
        , });
    });

</script>

<script>
    $(document).on('change', '#status', function() {
        var id = $(this).attr('data-id');
        if (this.checked) {
            var catstatus = "Solved";
        } else {
            var catstatus = "Pending";
        }
        $.ajax({
            dataType: "json"
            , url: '/admin/complain/' + id + '/' + catstatus
            , method: 'get'
            , success: function(result1) {
                console.log(result1);
            }
        });
    })

</script>
@endsection
