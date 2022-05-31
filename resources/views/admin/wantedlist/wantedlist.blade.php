@extends('admin.layout.master')
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white mr-2">
                <i class="mdi mdi-cellphone"></i>
            </span>Wanted Criminal List
        </h3>
    </div>
    <div class="card">

        <div class="card-body ">
            <div class="float-right">
                <a type="button" href="#" class="btn btn-outline-success mb-5 btn-sm" data-toggle="modal" data-target="#wantedAddModal">
                    <i class="mdi mdi-plus-circle"></i>
                </a>
            </div>
            <div class="table-responsive">
                <table id="table" class="display table2 table table-hover table-sm">
                    <thead>
                        <th>#</th>
                        <th>Name</th>
                        <th>Father Name</th>
                        <th>Address</th>
                        <th>Details</th>
                        <th>Photo</th>
                        @if (Auth::user()->user_type == "super_admin" )
                        <th>Status</th>
                        <th>Action</th>
                        @endif
                    </thead>
                    <tbody>
                        @php
                        $i = 0;
                        @endphp
                        @foreach ($wantedlist as $item)
                        <tr>
                            <td>{{ ++$i }}</td>
                            {{-- <td>{{ substr($item->title,0,30) }}</td> --}}
                            <td class="text-wrap">{{ $item->name }}</td>
                            <td class="text-wrap">{{ $item->father_name }}</td>

                            {{-- <td>{{ substr($item->description,0,30) }}</td> --}}
                            <td class="text-wrap">{{ $item->address}}</td>
                            <td class="text-wrap">{{ $item->details}}</td>
                            <td>
                                @if($item->photo != NULL)
                                <img src="{{ asset('admin/assets/images/wantedlist/'.$item->photo) }}" alt="" style="height:100px;width:100px; round: none">
                                @else
                                <img src="{{ asset('admin/assets/images/default/images.png') }}" alt="">
                                @endif
                            </td>
                            @if (Auth::user()->user_type == "super_admin" )
                            <td>
                                {{-- {{ $item->status}} --}}
                                <input name="status" class="status" id="status" type="checkbox" data-toggle="toggle" data-on="Active" data-off="Deactive" data-size="xs" data-onstyle="success" data-offstyle="danger" data-id="{{ $item->id }}" {{ $item->status == 1 ? 'checked' : '' }}>
                            </td>
                            <td>
                                <a type="button" class="btn  btn-outline-view btn-xs" href="{{ route('wanted.details', $item->id) }}"><i class="mdi mdi-eye"></i></a>
                                <a type="button" class="btn  btn-outline-edit btn-xs" href="{{ route('wanted.edit', $item->id) }}"><i class="mdi mdi-grease-pencil"></i></a>
                                <a class="btn  btn-outline-delete btn-xs deletebtn" href="javascript:void(0);" data-id="{{ $item->id }}"><i class="mdi mdi-delete-forever"></i></a>
                            </td>
                            @endif
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>



{{-- Data add Model Start --}}
<div class="modal fade" id="wantedAddModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="text-center">
                    <h3 class="modal-title" id="exampleModalLabel">Wanted Criminal Details</h3>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="forms-sample" id="wantedForm" method="POST" enctype="multipart/form-data">
                    @csrf
                    {{-- <ul class="alert alert-warning d-none" id="save_errorList"></ul> --}}
                    <div class="form-group">
                        <label for="title">নাম<span class="text-danger">*</span></label>
                        <input type="text" name="name" id="name" class="form-control" required />
                    </div>
                    <div class="form-group">
                        <label for="title">বাবার নাম<span class="text-danger">*</span></label>
                        <input type="text" name="father_name" id="father_name" class="form-control" required />
                    </div>

                    <div class="form-group">
                        <label for="title">ঠিকানা<span class="text-danger">*</span></label>
                        <textarea type="text" name="address" id="address" class="form-control" required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="title">লিঙ্গ<span class="text-danger">*</span></label>
                        <select name="gander" id="gander" class="form-control">
                            <option selected disabled>Choose One</option>
                            <option value="male">পুরুষ</option>
                            <option value="female">মহিলা</option>
                            <option value="other">অন্য</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>বর্ণনা<span> (Optional)</span></label>
                        <textarea type="text" name="details" rows="5" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="title">ছবি<span class="text-danger">*</span></label>
                        <input type="file" name="photo" id="photo" class="form-control">
                    </div>
                    {{-- <input type="text" name="status" id="photo" class="form-control"  required /> --}}
                    <div class="float-right">
                        <button type="submit" class="btn  btn-sm btn-gradient-primary mr-2">Submit</button>
                        <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- Data Add Modal End --}}
<script>
    $('#wantedForm').on('submit', function(e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var myformData = new FormData($('#wantedForm')[0]);
        $.ajax({
            type: "post"
            , url: "/admin/wantedlist-add"
            , data: myformData
            , cache: false
            , processData: false
            , contentType: false
            , dataType: "json"
            , success: function(response) {
                console.log(response);
                $("#wantedForm").find('input').val('');
                $('#wantedAddModal').modal('hide');
                location.reload();
            }
            , error: function(error) {
                console.log(error);
                alert("Data Not Save");
            }
        });
    });

    $('body').on('click', '.deletebtn', function() {
        var id = $(this).data("id");
        var token = $("meta[name='csrf-token']").attr("content");
        if (confirm("Are You sure want to delete !")) {
            $.ajax({
                type: "DELETE"
                , url: "/admin/wantedlist/delete/" + id
                , data: {
                    "id": id
                    , "_token": token
                , }
                , success: function(data) {
                    location.reload();
                    console.log(data);
                }
                , error: function(data) {
                    console.log('Error:', data);
                }
            });
        }
    });

</script>

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
            var catstatus = 1;
        } else {
            var catstatus = 0;
        }
        $.ajax({
            dataType: "json"
            , url: '/admin/wantedlist/' + id + '/' + catstatus
            , method: 'get'
            , success: function(result1) {
                console.log(result1);
            }
        });
    })

</script>
@endsection
