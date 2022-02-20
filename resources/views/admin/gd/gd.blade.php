@extends('admin.layout.master')
@section('content')

<div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white mr-2">
          <i class="mdi mdi-cellphone"></i>
        </span>General Diary List
      </h3>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
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
                        @foreach ($gd as $item)
                        <tr>
                            <td>{{ ++$i }}</td>
                            {{-- <td>{{ substr($item->title,0,30) }}</td> --}}
                            <td class="text-wrap">{{ $item->name }}</td>
                            {{-- <td>{{ substr($item->description,0,30) }}</td> --}}
                            <td class="text-wrap">
                                Division: {{ $item->division->bn_name}}<br/>
                                District: {{ $item->district->bn_name}}<br/>
                                Upazila: {{ $item->upazila->bn_name}}<br/>
                                Police Station: {{ $item->policestation->name}}<br/>

                            </td>
                            <td class="text-wrap">{{ $item->phone_no}}</td>
                            <td class="text-wrap">{{ $item->email}}</td>
                            <td>
                                {{-- {{ $item->status}} --}}
                                <input name="status" class="status" id="status" type="checkbox" data-toggle="toggle" data-on="Active" data-off="Deactive" data-size="xs" data-onstyle="success" data-offstyle="danger"
                                data-id="{{ $item->id }}" {{ $item->status == 1 ? 'checked' : '' }}>
                            </td>
                            <td>
                                <a type="button" class="btn  btn-outline-view btn-xs"><i class="mdi mdi-eye"></i></a>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
      var table =$('.table2').DataTable({
            "autoWidth": true,
            "processing": true,
            //"serverSide": true,
            "lengthMenu": [10, 15, 20, 25, 50, 100, 200],
        });
    });


</script>
@endsection
