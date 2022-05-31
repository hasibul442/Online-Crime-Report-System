@extends('admin.layout.master')
@section('content')

<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white mr-2">
                <i class="mdi mdi-cellphone"></i>
            </span>Police Station Details update
        </h3>
    </div>

    <div class="card">
        <div class="card-body">
            <form class="forms-sample" action="{{ url('/admin/police/station/update/'.$policestation->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                {{-- <ul class="alert alert-warning d-none" id="save_errorList"></ul> --}}
                <div class="row">
                    <div class="col-sm-6">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">থানার নাম<span class="text-danger">*</span></label>
                                <input type="text" name="name"  class="form-control"
                                    value="{{ $policestation->name }}" />
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>ফোন নম্বর<span class="text-danger">*</span></label>
                                <input type="text" name="phone_no" id="phone_no" class="form-control"
                                value="{{ $policestation->phone_no }}" />
                            </div>
                        </div>

                        {{-- <input style="display: none" type="text" value="1" name="user_type" class="form-control"/> --}}
                    </div>
                    <div class="col-sm-6">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="division_id">বিভাগ<span class="text-danger">*</span></label>
                                <select name="division_id"  class="form-control division_id">
                                    <option value="{{ $policestation->division_id }}">{{ $policestation->division->bn_name }}</option>
                                    @foreach (App\Models\Division::get() as $item)
                                        <option value="{{ $item->id }}">{{ $item->bn_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="district_id">জেলা<span class="text-danger">*</span></label>
                                <select name="district_id" class="form-control district_id">
                                    <option value="{{ $policestation->district_id }}">{{ $policestation->district->bn_name }}</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="upazila_id">উপজেলা<span class="text-danger">*</span></label>
                                <select name="upazila_id" class="form-control upazila_id">
                                    <option value="{{ $policestation->upazila_id }}">{{ $policestation->upazila->bn_name }}</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>ঠিকানা<span class="text-danger">*</span></label>
                                <textarea type="text" name="address" rows="5" class="form-control" value="{{ $policestation->address }}" >{{ $policestation->address }}</textarea>
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
@endsection
