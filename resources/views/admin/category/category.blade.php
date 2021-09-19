@extends('admin.layout.master')

@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                    <i class="mdi mdi-cube-send"></i>
                </span>Category
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
                    <table id="categoryTable" class="display table1 table table-hover nowrap">
                        <thead>
                            <th>#</th>
                            <th>Name</th>
                            <th>Parent Name</th>
                            <th>Status</th>
                            {{-- <th style="width: 30px">Description</th> --}}
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @php
                                $i = 0;
                            @endphp
                            @foreach ($categories as $item)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>
                                        @if ($item->parent_id == null)
                                            Primary Category
                                        @else
                                            {{ $item->parent->name }}
                                        @endif
                                    </td>
                                    <td>
                                        {{-- <input type="checkbox" data-on="On" data-off="Off" data-width="100"
                                            data-style="slow" data-toggle="toggle" data-onstyle="success"
                                            data-offstyle="danger" name="status1" class="status" id="status1"
                                            data-id="{{ $item->id }}" {{ $item->status == 1 ? 'checked' : '' }}> --}}

                                    </td>
                                    <td>
                                        <a type="button" class="btn  btn-outline-view btn-sm"><i
                                                class="mdi mdi-eye"></i></a>
                                        <a type="button" href="javascript:void(0);" data-id="{{ $item->id }}" class="btn editbtn  btn-outline-edit btn-sm"><i
                                                class="mdi mdi-grease-pencil"></i></a>
                                        {{-- <a type="button" href="#" class="btn  btn-outline-delete deletebtn btn-sm"><i
                                                class="mdi mdi-delete-forever"></i></a> --}}
                                        <a type="button" href="javascript:void(0);" data-id="{{ $item->id }}"
                                            class="btn  btn-outline-delete deletebtn btn-sm"><i
                                                class="mdi mdi-delete-forever"></i></a>
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
                            <input type="text" name="name" class="form-control" placeholder="Category name"
                                 required />
                        </div>
                        {{-- <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" name="image" class="form-control" required>
                        </div> --}}
                        <div class="form-group">
                            <div class="form-group">
                                <label>Select Parent Category<span class="text-danger">*</span></label>
                                <select type="text" name="parent_id" style="width: 100%;" class="js-example-basic-single form-control">
                                    <option value="">None</option>
                                    @if ($categories->count() == !0)
                                        @foreach (App\Models\Category::orderBy('name', 'desc')->where('parent_id', null)->get() as $parent_cat)
                                            <option class="font-weight-bold" value="{{ $parent_cat->id }}">
                                                {{ $parent_cat->name }}</option>
                                            @foreach (App\Models\Category::orderBy('name', 'desc')->where('parent_id', $parent_cat->id)->get() as $child_cat)
                                                <option value="{{ $child_cat->id }}">-->{{ $child_cat->name }}</option>
                                                @foreach (App\Models\Category::orderBy('name', 'desc')->where('parent_id', $child_cat->id)->get() as $child_sub_cat)-
                                                    <option value="{{ $child_sub_cat->id }}">----->{{ $child_sub_cat->name }}</option>
                                                @endforeach
                                            @endforeach
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        {{-- <div class="form-check form-check-flat form-check-primary">
                  <label class="form-check-label">
                    <input type="checkbox" class="form-check-input"> Remember me </label>
                </div> --}}
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


    <div class="modal fade" id="categoryEditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
            aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="text-center">
                        <h3 class="modal-title" id="exampleModalLabel">Category Update</h3>
                    </div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="forms-sample" method="POST" action=""  id="categoryEditForm" enctype="multipart/form-data">
@csrf

                        <input type="hidden" name="id" id="id">
                        {{-- <ul class="alert alert-warning d-none" id="save_errorList"></ul> --}}
                        <div class="form-group">
                            <label>Category name<span class="text-danger">*</span></label>
                            <input type="text" name="name" id="name" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <div id="imagineThisIsYourModal">Image</div>

                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" id="image" name="image" class="form-control">
                        </div>
                        <div class="form-group">
                            <div class="form-group">
                                <label>Select Parent Category<span class="text-danger">*</span></label>
                                <select type="text" id="parent" name="parent_id" style="width: 100%;" class="form-control">
                                    <option value="">None</option>
                                    @if ($categories->count() == !0)
                                        @foreach (App\Models\Category::orderBy('name', 'desc')->where('parent_id', null)->get()
                                                as $parent_cat)
                                            <option class="font-weight-bold" value="{{ $parent_cat->id }}">
                                                {{ $parent_cat->name }}</option>
                                            {{-- @if (count($category->subcategory))
                                                @include('backend.admin.presetdata.category.subcategoryList-option',['subcategories' => $category->subcategory])
                                        @endif --}}
                                            @foreach (App\Models\Category::orderBy('name', 'desc')->where('parent_id', $parent_cat->id)->get()
                                                as $child_cat)
                                                <option value="{{ $child_cat->id }}">-->{{ $child_cat->name }}</option>
                                                @foreach (App\Models\Category::orderBy('name', 'desc')->where('parent_id', $child_cat->id)->get()
                                                    as $child_sub_cat)
                                                    <option value="{{ $child_sub_cat->id }}">
                                                        ----->{{ $child_sub_cat->name }}</option>
                                                @endforeach
                                            @endforeach
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        {{-- <div class="form-check form-check-flat form-check-primary">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input"> Remember me </label>
                </div> --}}
                        <div class="float-right">
                            <button type="submit" class="btn  btn-sm btn-gradient-primary mr-2">Submit</button>
                            <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    {{-- DElete Modal Start --}}

    {{-- <div class="modal fade" id="categorydeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="forms-sample" id="categoryDeleteID" enctype="multipart/form-data">
                        @csrf
                        @method('DELETE')

                        <input type="hidden" name="id" id="delete_id">
                        <p>Are You Sure !! You want to Delete this Data ?</p>

                        <div class="float-right">
                            <button type="submit" class="btn btn-sm btn-gradient-primary mr-2">Yes</button>
                            <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">No</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}

    {{-- DElete Modal Delete --}}
    <script>
        $(document).on('change', '#status1', function() {
            var id = $(this).attr('data-id');
            if (this.checked) {
                var catstatus = 1;
            } else {
                var catstatus = 0;
            }
            $.ajax({
                dataType: "json",
                url: '/category/' + id + '/' + catstatus,
                method: 'get',
                success: function(result1) {
                    console.log(result1);
                }
            });
        })
    </script>
    <script>
        $('#categoryForm').on('submit', function(e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var myformData = new FormData($('#categoryForm')[0]);
            $.ajax({
                type: "post",
                url: "{{ route('category.add') }}",
                data: myformData,
                cache: false,
                //enctype: 'multipart/form-data',
                processData: false,
                contentType: false,
                dataType: "json",
                success: function(response) {
                    console.log(response);
                    //$("#categoryform").reset();
                    $("#categoryform").find('input').val('');
                    //$("#categoryTable").DataTable().ajax.reload();
                    $('#categoryAddModal').modal('hide');
                    //alert("Data Save");
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
                    url: "category/" + id,
                    data: {
                        "id": id,
                        "_token": token,
                        },
                    success: function(data) {
                        location.reload();
                    },
                    error: function(data) {
                        console.log('Error:', data);
                    }
                });
                }
        });

        // $(document).ready(function () {
        //     $('.editbtn').on('click', function () {
        //         $('#categoryEditModal').modal('show');

        //         $tr = $(this).closest('tr');

        //         let data = $tr.children("td").map(function(){
        //             return $(this).text();
        //         }).get();
        //         console.log(data);

        //         $('#name1').val(data[1]);
        //         $('#parent1').val(data[2]);
        //         $('#image1').val(data.image);
        //     });
        // });

        $(document).on('click','.editbtn', function (e) {
            e.preventDefault();

            var id1 = $(this).data("id");

            $('#categoryEditModal').modal('show');

            $.ajax({
                type: "GET",
                url: "/category-edit/"+id1,
                success: function (response) {
                        $('#name').val(response.name);
                        $('#parent').val(response.parent_id);
                        $('#id').val(id1);
                        $('#imagineThisIsYourModal').html('<img src="/admin/assets/images/category/'+response.image + '"' +'class="img-responsive"'+'style="width:200px; height: 200px"'+'/>');
                      // console.log(id1);

                }
            });
        });

        $(document).on('submit','#categoryEditForm', function (e) {

            e.preventDefault();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var cat_id = $('#id1').val("id");
            console.log(cat_id);
            let editformData = new FormData($('#categoryEditForm')[0]);

            $.ajax({

                url: "/category-update/" + cat_id,
                type: 'POST',
                data: editformData,
                processData: false,
                contentType: false,
                success: function(response) {
                    console.log(response);
                    $("#categoryEditForm").find('input').val('');
                    $('#categoryEditModal').modal('hide');
                    //alert("Data Save");
                    location.reload();
                },
                error: function(error) {
                    console.log(error.id);
                    console.log(error);
                    alert("Data Not Save");
                },
            });
        });

        $(document).ready(function() {
    $('.js-example-basic-single').select2();
});
    </script>


@endsection
