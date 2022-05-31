@extends('admin.layout.master')
@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                    <i class="mdi mdi-cellphone"></i>
                </span>Police Station List
            </h3>
        </div>
        <div class="card">

            <div class="card-body ">
                <div class="float-right">
                    <a type="button" href="#" class="btn btn-outline-success mb-5 btn-sm" data-toggle="modal"
                        data-target="#policeStationAddModal">
                        <i class="mdi mdi-plus-circle"></i> Add Police Station
                    </a>
                </div>
                <div class="table-responsive">
                    <table id="table" class="display table2 table table-hover ">
                        <thead>
                            <th>#</th>
                            <th>Police Station Name</th>
                            <th>Address</th>
                            <th>Phone Number</th>
                            <th>Email</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @php
                                $i = 0;
                            @endphp
                            @foreach ($policestation as $item)
                                <tr id="policestation{{ $item->id }}">
                                    <td>{{ ++$i }}</td>
                                    <td style="max-width:100px;" class="text-wrap">{{ $item->name }}</td>
                                    <td style="max-width:100px;" class="text-wrap">{{ $item->division->bn_name }},
                                        {{ $item->district->bn_name }}, {{ $item->upazila->bn_name }},
                                        {{ $item->address }}</td>
                                    <td class="text-right"><a
                                            href="tel:{{ $item->phone_no }}">{{ $item->phone_no }}</a></td>
                                    <td class="text-right"><a
                                            href="mailto:{{ $item->email }}">{{ $item->email }}</a></td>
                                    <td>
                                        <a type="button" href="{{ route('policestation.details', $item->id) }}"
                                            class="btn  btn-outline-view btn-sm"><i class="mdi mdi-eye"></i></a>
                                        <a href="{{ route('policestation.edit', $item->id) }}" type="button"
                                            class="btn btn-outline-warning btn-sm"><i class="mdi mdi-grease-pencil"></i></a>
                                        <a class="btn  btn-outline-delete btn-sm deletebtn" href="javascript:void(0);"
                                            data-id="{{ $item->id }}"><i class="mdi mdi-delete-forever"></i></a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

    {{-- Data add Model Start --}}
    <div class="modal fade bd-example-modal-lg" id="policeStationAddModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="text-center">
                        <h3 class="modal-title" id="exampleModalLabel">থানার নাম অ্যাড</h3>
                    </div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="forms-sample" id="policeStationForm" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{-- <ul class="alert alert-warning d-none" id="save_errorList"></ul> --}}
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="name">থানার নাম<span class="text-danger">*</span></label>
                                        <input type="text" name="name" id="name" class="form-control" placeholder="Title"
                                            required />
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>ফোন নম্বর<span class="text-danger">*</span></label>
                                        <input type="text" name="phone_no" id="phone_no" class="form-control"
                                            placeholder="+88000" required />
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>ইমেইল</label>
                                        <input type="email" name="email" id="email" class="form-control" />
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>পাসওয়ার্ড দিন</label>
                                        <input type="password" name="password" id="password" class="form-control" />
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="password-confirm">পুনরায় পাসওয়ার্ড দিন</label>
                                        <input id="password-confirm" type="password" class="form-control"
                                            name="password_confirmation" required autocomplete="new-password" />
                                    </div>
                                </div>
                                {{-- <input style="display: none" type="text" value="1" name="user_type" class="form-control"/> --}}
                            </div>
                            <div class="col-sm-6">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="division_id">বিভাগ<span class="text-danger">*</span></label>
                                        <select name="division_id"  class="form-control division_id">
                                            <option selected disabled>বিভাগ নির্বাচন করুন</option>
                                            @foreach ($division as $item)
                                                <option value="{{ $item->id }}">{{ $item->bn_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="district_id">জেলা<span class="text-danger">*</span></label>
                                        <select name="district_id" class="form-control district_id">
                                            <option selected disabled>জেলা নির্বাচন করুন</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="upazila_id">উপজেলা<span class="text-danger">*</span></label>
                                        <select name="upazila_id" class="form-control upazila_id">
                                            <option selected disabled>উপজেলা নির্বাচন করুন</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>ঠিকানা<span class="text-danger">*</span></label>
                                        <textarea type="text" name="address" rows="5" class="form-control" required></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

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
        $('.division_id').change(function() {

            var divisionID = $(this).val();

            if (divisionID) {
                //console.log(companyID);
                $.ajax({
                    type: "GET",
                    url: "/admin/police/station/district/" + divisionID,
                    success: function(res) {
                        //console.log(res);
                        if (res) {

                            $(".district_id").empty();
                            $(".district_id").append('<option>জেলা নির্বাচন করুন</option>');
                            $.each(res, function(key, value) {
                                $(".district_id").append('<option value="' + value.id + '">' +
                                    value.bn_name +
                                    '</option>');
                                //console.log(value);
                            });

                        } else {

                            $(".district_id").empty();
                        }
                    }
                });
            } else {

                $(".district_id").empty();
                $(".upazila_id").empty();
            }
        });

        $('.district_id').on('change', function() {

            var districtID = $(this).val();
            // console.log(positionID);
            if (districtID) {

                $.ajax({
                    type: "GET",
                    url: "/admin/police/station/upazila/" + districtID,
                    success: function(res) {
                        // console.log(res);
                        if (res) {
                            $(".upazila_id").empty();
                            $(".upazila_id").append('<option>উপজেলা নির্বাচন করুন</option>');
                            $.each(res, function(key, value) {
                                $(".upazila_id").append('<option value="' + value.id + '">' +
                                    value.bn_name +
                                    '</option>');

                            });

                        } else {

                            $(".upazila_id").empty();
                        }
                    }
                });
            } else {

                $(".upazila_id").empty();
            }
        });
    </script>
    <script>
        $('#policeStationForm').on('submit', function(e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var myformData = new FormData($('#policeStationForm')[0]);
            $.ajax({
                type: "post",
                url: "/admin/police/station/add",
                data: myformData,
                cache: false,
                processData: false,
                contentType: false,
                dataType: "json",
                success: function(response) {
                    console.log(response);
                    $("#policeStationForm").find('input').val('');
                    $('#policeStationAddModal').modal('hide');
                    location.reload();
                },
                error: function(error) {
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
                    type: "DELETE",
                    url: "/admin/police/station/delete/" + id,
                    data: {
                        "id": id,
                        "_token": token,
                    },
                    success: function(data) {
                        location.reload();
                        console.log(data);
                    },
                    error: function(data) {
                        console.log('Error:', data);
                    }
                });
            }
        });

    </script>
    <script>
        $(document).ready(function() {
            var table = $('.table2').DataTable({
                "autoWidth": true,
                "processing": true,
                //"serverSide": true,
                "lengthMenu": [10, 15, 20, 25, 50, 100, 200],
            });
        });
    </script>
@endsection
