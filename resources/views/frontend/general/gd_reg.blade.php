@extends('frontend.layout.master')
@section('content')
  <!-- Categories section-->
  <img src="{{ asset('admin/assets/images/default/police-com-banner.jpg') }}" alt="" class="img-fluid">
  <section class="pb-5 pt-5">
    <div class="container pb-5">
       <div class="ml-5 mr-5">
        <div class="card shadow border-0">
            <div class="card-body border-0 rounded" style="background-color: #B2F9FC">
                <p class="text-center text-primary">পুলিশের সেবা প্রাপ্তিতে যেকোনো মতামত অথবা অভিযোগ আপনি সহজেই এ ওয়েবসাইটের মাধ্যমে কর্তৃপক্ষের নিকট উপস্থাপন করতে পারবেন। এটি বাংলাদেশ পুলিশ কর্তৃক পরিচালিত কেন্দ্রীয় অভিযোগ ব্যবস্থাপনার একটি অনলাইন প্ল্যাটফর্ম। বাংলাদেশ পুলিশ সম্পর্কে মতামত অথবা অভিযোগ ব্যবস্থাপনা পুলিশ সম্পর্কে জনগনকে আরো আস্থাশীল করে তুলবে এবং পুলিশকে করে তুলবে আরো দায়িত্ববান। জাতীয় শুদ্ধাচার কৌশলের আলোকে মতামত অথবা অভিযোগ ব্যবস্থাপনা বাংলাদেশ পুলিশের স্বচ্ছতা ও জবাবদিহিতা নিশ্চিত করবে।</p>
            </div>
        </div>
       </div>

       <div class="mt-5">
            <div class="card">
                <div class="card-body">
                        <form class="forms-sample" id="complainForm" method="POST" enctype="multipart/form-data">
                            @csrf
                            {{-- <ul class="alert alert-warning d-none" id="save_errorList"></ul> --}}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="division_id">বিভাগ<span class="text-danger">*</span></label>
                                        <select name="division_id" id="division_id" class="form-control" required>
                                            <option selected disabled>বিভাগ নির্বাচন করুন</option>
                                            @foreach ($division as $item )
                                                    <option value="{{ $item->id }}">{{ $item->bn_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="district_id">জেলা<span class="text-danger">*</span></label>
                                        <select name="district_id" id="district_id" class="form-control" required>
                                            <option selected disabled>জেলা নির্বাচন করুন</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="upazila_id">উপজেলা<span class="text-danger">*</span></label>
                                        <select name="upazila_id" id="upazila_id" class="form-control" required>
                                            <option selected disabled>উপজেলা নির্বাচন করুন</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="police_station">থানা<span class="text-danger">*</span></label>
                                        <select name="police_station" id="police_station" class="form-control" required>
                                            <option selected disabled>উপজেলা নির্বাচন করুন</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">নাম<span class="text-danger">*</span></label>
                                        <input type="text" name="name" id="name" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="father_name">বাবার নাম<span class="text-danger">*</span></label>
                                        <input type="text" name="father_name" id="father_name" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nid">NID<span class="text-danger">*</span></label>
                                        <input type="text" name="nid" id="nid" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-6">

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="phone_no">ফোন নম্বর<span class="text-danger">*</span></label>
                                        <input type="text" name="phone_no" id="phone_no" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">ইমেইল<span class="text-danger">*</span></label>
                                        <input type="email" name="email" id="email" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="email">বর্ণনা<span class="text-danger">*</span></label>
                                        <textarea id="description" class="description" name="description" required></textarea>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">File<span class="text-danger">*</span></label>
                                        <input type="file" name="document" id="document" class="form-control">
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
  </section>
  <!-- Resources section-->

  <script>
    $('#division_id').change(function() {
        var divisionID = $(this).val();
        if (divisionID) {
            //console.log(companyID);
            $.ajax({
                type: "GET",
                url: "/complaint/registration/district/" + divisionID,
                success: function(res) {
                    //console.log(res);
                    if (res) {

                        $("#district_id").empty();
                        $("#district_id").append('<option>জেলা নির্বাচন করুন</option>');
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
            $("#plice_station").empty();
        }
    });

    $('#district_id').on('change', function() {
        var districtID = $(this).val();
        if (districtID) {

            $.ajax({
                type: "GET",
                url: "/complaint/registration/upazila/" + districtID,
                success: function(res) {
                    // console.log(res);
                    if (res) {
                        $("#upazila_id").empty();
                        $("#upazila_id").append('<option>উপজেলা নির্বাচন করুন</option>');
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
            $("#plice_station").empty();
        }
    });

    $('#upazila_id').on('change', function() {
        var upazila_id = $(this).val();
        if (upazila_id) {

            $.ajax({
                type: "GET",
                url: "/complaint/registration/policestation/" + upazila_id,
                success: function(res) {
                    // console.log(res);
                    if (res) {
                        $("#police_station").empty();
                        $("#police_station").append('<option>উপজেলা নির্বাচন করুন</option>');
                        $.each(res, function(key, value) {
                            $("#police_station").append('<option value="' + value.id + '">' + value.name +
                                '</option>');
                        });

                    } else {
                        $("#police_station").empty();
                    }
                }
            });
        } else {
            $("#police_station").empty();
        }
    });

    $(document).ready(function() {
        $('.description').summernote({
            tabsize: 2,
            height: 200
        });
    });



    $('#complainForm').on('submit', function(e) {
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var myformData = new FormData($('#complainForm')[0]);
                $.ajax({
                    type: "post",
                    url: "/complaint/registration/add",
                    data: myformData,
                    cache: false,
                    processData: false,
                    contentType: false,
                    dataType: "json",
                    success: function(response) {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'আপনার অভিযোগটি সম্পুর্ন ভাবে নিবন্ধিত হয়েচে খুব তারাতারি আপনার থানা থেকে একজন আপনার সাথে যোগাযোগ করবে।।',
                            timer: 1000,
                            showConfirmButton: false,
                        });
                        console.log(response);
                        location.reload();
                    },
                    error: function(error) {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'Error',
                            title: 'Data Not Deleted',
                            showConfirmButton: false,
                            timer: 1000
                        });
                        console.log(error);
                        alert("Data Not Save");
                    }
                });
            });
    </script>
@endsection
