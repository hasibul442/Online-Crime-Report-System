@extends('admin.layout.master')
@section('content')

<select name="division" id="division_id" class="form-control">
    <option selected disabled>বিভাগ নির্বাচন করুন</option>
    @foreach ($division as $item )
            <option value="{{ $item->id }}">{{ $item->bn_name }}</option>
    @endforeach
</select>
   <br />
   <select name="district" id="district_id" class="form-control">
    <option selected disabled>জেলা নির্বাচন করুন</option>
   </select>
   <br />
   <select name="upazila" id="upazila_id" class="form-control">
    <option selected disabled>উপজেলা নির্বাচন করুন</option>
</select>

<script>
    $('#division_id').change(function() {

    var divisionID = $(this).val();

    if (divisionID) {
        //console.log(companyID);
        $.ajax({
            type: "GET",
            url: "/admin/police/station/district/" + divisionID,
            success: function(res) {
                //console.log(res);
                if (res) {

                    $("#district_id").empty();
                    $("#district_id").append('<option>Select Position</option>');
                    $.each(res, function(key, value) {
                        $("#district_id").append('<option value="' + value.id + '">' + value.bn_name +
                            '</option>');
                            //console.log(value);
                    });

                } else {

                    $("#district_id").empty();
                }
            }
        });
    } else {

        $("#district_id").empty();
        $("#upazila_id").empty();
    }
    });

    $('#district_id').on('change', function() {

    var districtID = $(this).val();
    // console.log(positionID);
    if (districtID) {

        $.ajax({
            type: "GET",
            url: "/admin/police/station/upazila/" + districtID,
            success: function(res) {
                // console.log(res);
                if (res) {
                    $("#upazila_id").empty();
                    $("#upazila_id").append('<option>Select Employee</option>');
                    $.each(res, function(key, value) {
                        $("#upazila_id").append('<option value="' + value.id + '">' + value.bn_name +
                            '</option>');

                    });

                } else {

                    $("#upazila_id").empty();
                }
            }
        });
    } else {

        $("#upazila_id").empty();
    }
    });
    </script>
@endsection
