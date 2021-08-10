@extends('admin.layout.master')

@section('content')
<div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white mr-2">
          <i class="mdi mdi-cellphone"></i>
        </span>Hotline Number
      </h3>
    </div>
    <div class="card">

        <div class="card-body ">
            <div class="float-right">
                <a type="button" href="#" class="btn   btn-outline-success mb-5 btn-sm" data-toggle="modal"
                    data-target="#categoryAddModal">
                    <i class="mdi mdi-plus-circle"></i>
                </a>
            </div>
            <div class="table-responsive">
                <table id="table" class="display table2 table table-hover nowrap">
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
                            <td>{{ substr($item->title,0,30) }}</td>
                            <td>{{ $item->phone_number }}</td>
                            <td>{{ substr($item->description,0,30) }}</td>
                            <td>
                                <a type="button" class="btn  btn-outline-view btn-sm"><i class="mdi mdi-eye"></i></a>
                                <a type="button" class="btn  btn-outline-edit btn-sm"><i class="mdi mdi-grease-pencil"></i></a>
                                <a type="button" class="btn  btn-outline-delete btn-sm"><i class="mdi mdi-delete-forever"></i></a>
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
    <div class="modal fade" id="categoryAddModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
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
                    <form class="forms-sample" id="categoryForm" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{-- <ul class="alert alert-warning d-none" id="save_errorList"></ul> --}}
                        <div class="form-group">
                            <label>Category name<span class="text-danger">*</span></label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Category name"
                                value="{{ old('name') }}" required />
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" id="image" name="image" class="form-control" required>
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
