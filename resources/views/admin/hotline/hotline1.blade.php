@extends('admin.layout.master')

@section('content')
<div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white mr-2">
          <i class="mdi mdi-cellphone"></i>
        </span>Emergency Helpline Number
      </h3>
    </div>
    <div class="card">

        <div class="card-body ">
            <div class="float-right">
                <a type="button" href="#" class="btn btn-outline-success mb-5 btn-sm" data-toggle="modal"
                    data-target="#HelplineAddModal">
                    <i class="mdi mdi-plus-circle"></i>
                </a>
            </div>
            <div class="table-responsive">
                <table id="table" class="display table2 table table-hover " >
                    <thead>
                        <th>#</th>
                        <th>Title</th>
                        <th>Number</th>
                        <th>Description</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @php
                                $i = 0;
                            @endphp
                        @foreach ($hotlines as $item)
                        <tr>
                            <td>{{ ++$i }}</td>
                            {{-- <td>{{ substr($item->title,0,30) }}</td> --}}
                            <td style="max-width:100px;" class="text-wrap">{{ $item->title }}</td>
                            <td class="text-center"><a href="tel:{{ $item->phone_number }}">{{ $item->phone_number }}</a></td>
                            {{-- <td>{{ substr($item->description,0,30) }}</td> --}}
                            <td style="max-width:200px;" class="text-wrap">{{ $item->description}}</td>
                            <td>
                                <a type="button" class="btn  btn-outline-view btn-sm"><i class="mdi mdi-eye"></i></a>
                                <a type="button" class="btn  btn-outline-edit btn-sm"><i class="mdi mdi-grease-pencil"></i></a>
                                <a class="btn  btn-outline-delete btn-sm deletebtn" href="javascript:void(0);" data-id="{{ $item->id }}"><i class="mdi mdi-delete-forever"></i></a>
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
    <div class="modal fade" id="HelplineAddModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="text-center">
                        <h3 class="modal-title" id="exampleModalLabel">Category Add</h3>
                    </div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="forms-sample" id="HelplineForm" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{-- <ul class="alert alert-warning d-none" id="save_errorList"></ul> --}}
                        <div class="form-group">
                            <label for="title">Title<span class="text-danger">*</span></label>
                            <input type="text" name="title" id="title" class="form-control" placeholder="Title" required />
                        </div>
                        <div class="form-group">
                            <label>Phone Number<span class="text-danger">*</span></label>
                            <input type="text" name="phone_number" id="title" class="form-control" placeholder="+88000" required />
                        </div>
                        <div class="form-group">
                            <label>Description<span class="text-danger">*</span></label>
                            <textarea type="text" name="description" rows="5" class="form-control" required></textarea>
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
        $('#HelplineForm').on('submit', function(e) {
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var myformData = new FormData($('#HelplineForm')[0]);
                $.ajax({
                    type: "post",
                    url: "/hotlines-add",
                    data: myformData,
                    cache: false,
                    processData: false,
                    contentType: false,
                    dataType: "json",
                    success: function(response) {
                        console.log(response);
                        $("#HelplineForm").find('input').val('');
                        $('#HelplineAddModal').modal('hide');
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
                    url: "/admin/hotlines/delete/" + id,
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
            var table =$('.table2').DataTable({
                  "autoWidth": true,
                  "processing": true,
                  //"serverSide": true,
                  "lengthMenu": [10, 15, 20, 25, 50, 100, 200],
              });
          });


</script>


@endsection
