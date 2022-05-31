@extends('admin.layout.master')
@section('content')

<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white mr-2">
                <i class="mdi mdi-cellphone"></i>
            </span>Users List
        </h3>
    </div>

    <div class="card">
        <div class="card-body">
            <h3 class="text-center">User List</h3>

            <table class="table display table2">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>User Type</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i=0;
                    @endphp
                    @foreach ($users as $item)
                    <tr id="users{{ $item->id }}">
                        <td>{{ ++$i }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->user_type }}</td>
                        <td>
                            <a type="button" class="btn  btn-outline-view btn-xs" onclick="editUsers({{ $item->id }})"><i class="mdi mdi-lead-pencil"></i></a>
                            <a type="button" class="btn  btn-outline-info btn-xs" onclick="editPassword({{ $item->id }})"><i class="mdi mdi-lock"></i></a>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>


<div class="modal fade" id="userEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <form class="forms-sample" id="userEditForm"  enctype="multipart/form-data">

                    {{-- <ul class="alert alert-warning d-none" id="save_errorList"></ul> --}}

                    @csrf
                    <div style=" display:none">
                        <input type="text" name="id" id="id">
                    </div>

                    <div class="form-group mb-3">
                        <label for="name1">Full Name</label>
                        <input class="form-control" type="text" id="name1" name="name1">
                    </div>
                    <div class="form-group mb-3">
                        <label for="email1">Email address</label>
                        <input class="form-control" type="email" id="email1" name="email1">
                    </div>

                    <div class="form-group mb-3">
                        <label for="user_type1">Admin Roll</label>
                        <select class="form-control" name="user_type1" id="user_type1">
                            <option value="police_station">Police Station</option>
                            <option value="super_admin">Super Admin</option>
                        </select>
                        {{-- <input class="form-control" type="text" name="user_type" value="Admin"> --}}
                    </div>

                    <div class="text-center pb-2">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-success" name="submit" id="submit1" value="Submit" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!--Edit Password -->
<div class="modal fade" id="userPasswordUpdateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <form class="forms-sample" id="userPasswordUpdateForm"  enctype="multipart/form-data">

                    {{-- <ul class="alert alert-warning d-none" id="save_errorList"></ul> --}}

                    @csrf
                    <div style=" display:none">
                        <input type="text" name="id" id="id1">
                    </div>

                    <div class="form-group mb-3">
                        <label for="password1">Password <small>password content 8 letter</small></label>
                        <input class="form-control" type="password" name="password1" required id="password1" autocomplete="new-password" placeholder="Enter your password" minlength="8">
                    </div>


                    <div class="text-center pb-2">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-success" name="submit" id="submit1" value="Submit" />
                    </div>
                </form>
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
        function editUsers(id){
        $.get("/admin/users/edit/"+id, function(users){
            $('#id').val(users.id);
            $('#name1').val(users.name);
            $('#email1').val(users.email);
            $('#user_type1').val(users.user_type);
            // $('#balance').val(bank.balance);
            $('#userEditModal').modal("toggle");
        });
    }

    $('#userEditForm').submit(function (e) {
        e.preventDefault();

        let id = $('#id').val();
        let name1 = $('#name1').val();
        let email1 = $('#email1').val();
        let user_type1 = $('#user_type1').val();
        let _token = $('input[name=_token]').val();

        $.ajax({
            type: "PUT",
            url: "/admin/users/update",
            data: {
                id:id,
                name1:name1,
                email1:email1,
                user_type1:user_type1,
                _token:_token,
            },
            dataType: "json",
            success: function (response) {
                // console.log(response);
                $('#users'+response.id + 'td:nth-child(1)').text(response.name1);
                $('#users'+response.id + 'td:nth-child(2)').text(response.email1);
                $('#users'+response.id + 'td:nth-child(3)').text(response.user_type1);
                $('#userEditModal').modal("toggle");
                location.reload();
                $('#userEditForm')[0].reset();

            }
        });

    });

    function editPassword(id){
        $.get("/admin/users/edit/"+id, function(userspass){
            $('#id1').val(userspass.id);
            $('#password1').val(userspass.password);
            $('#userPasswordUpdateModal').modal("toggle");
        });
    }
    $('#userPasswordUpdateForm').submit(function (e) {
        e.preventDefault();

        let id1 = $('#id1').val();
        let password1 = $('#password1').val();
        let _token = $('input[name=_token]').val();

        $.ajax({
            type: "PUT",
            url: "/admin/users/password/update",
            data: {
                id:id1,
                password1:password1,
                _token:_token,
            },
            dataType: "json",
            success: function (response) {
                // console.log(response);
                $('#users'+response.id + 'td:nth-child(1)').text(response.password1);
                $('#userPasswordUpdatetModal').modal("toggle");
                location.reload();
                $('#userPasswordUpdateForm')[0].reset();

            }
        });

    });
</script>
@endsection
