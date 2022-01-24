@extends('layouts.app')

@section('header')

    <!-- Specific Page Vendor CSS -->
    <link rel="stylesheet" href="{{asset('assets/vendor/select2/css/select2.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/vendor/select2-bootstrap-theme/select2-bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/vendor/jquery-datatables-bs3/assets/css/datatables.css')}}" />

@endsection

@section('content')

    <header class="page-header">
        <h2>Users</h2>

    </header>
    <section class="panel">
        <header class="panel-heading">
            <div class="panel-actions">

            </div>

            <a class="modal-with-form btn btn-default" href="#modalForm"><span class="fa fa-plus"></span> Add User</a>

            <!-- Modal Form -->
            <div id="modalForm" class="modal-block modal-block-primary mfp-hide">
                <section class="panel">

                    <form method="POST" action="{{route('user.add')}}" class="form-horizontal mb-lg" novalidate="novalidate">
                        @csrf
                        <header class="panel-heading">
                            <h2 class="panel-title">Add User</h2>
                        </header>
                        <div class="panel-body">
                                <div class="form-group mt-lg">
                                    <label class="col-sm-3 control-label">Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="name" class="form-control" placeholder="Type a name..." required/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Email</label>
                                    <div class="col-sm-9">
                                        <input type="email" name="email" class="form-control" placeholder="Type an email..." required/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Phone Number</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="phoneNum" class="form-control" placeholder="Type an phone number..." />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Role</label>
                                    <div class="col-sm-9">
                                        <select name="role" data-plugin-selectTwo class="form-control populate js-example-responsive" style="width: 100%;">
                                            <optgroup label="Role">
                                                <option value="superAdmin">SuperAdmin</option>
                                                <option value="doctor">Doctor</option>
                                                <option value="nurse">Nurse</option>
                                                <option value="lab">Lab Scientist</option>
                                                <option value="xray">Xray</option>
                                                <option value="receptionist">Receptionist</option>
                                                <option value="pharmacist">Pharmacist</option>
                                            </optgroup>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Password</label>
                                    <div class="col-sm-9">
                                        <input type="password" name="pwd" class="form-control" placeholder="Type a password..." />
                                    </div>
                                </div>

                        </div>
                        <footer class="panel-footer">
                            <div class="row">
                                <div class="col-md-12 text-right">
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                    <button class="btn btn-default modal-dismiss">Cancel</button>
                                </div>
                            </div>
                        </footer>
                    </form>
                </section>
            </div>


            <!--Modal update-->

            <div id="modalForm1" class="modal-block modal-block-primary mfp-hide ">
                <section class="panel">

                    <form method="POST" action="{{route('user.update')}}">
                        @csrf
                        <header class="panel-heading">
                            <h2 class="panel-title">Update Zone</h2>
                        </header>

                        <div class="panel-body">
                            <div class="form-group mt-lg">
                                <label class="col-sm-3 control-label">Name</label>
                                <div class="col-sm-9">
                                    <input type="text" name="updateUserName" id="updateUserName" class="form-control" placeholder="Type name" required/>
                                    <input type="hidden" name="updateUserId" id="updateUserId">
                                </div>
                            </div>
                            <div class="form-group mt-lg">
                                <label class="col-sm-3 control-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="text" name="updateUserEmail" id="updateUserEmail" class="form-control" placeholder="Type email" required/>
                                </div>
                            </div>
                            <div class="form-group mt-lg">
                                <label class="col-sm-3 control-label">PhoneNumber</label>
                                <div class="col-sm-9">
                                    <input type="text" name="updateUserPhone" id="updateUserPhone" class="form-control" placeholder="Type phoneNumber"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Role</label>
                                <div class="col-sm-9">
                                    <select name="updateUserRole" class="form-control populate js-example-responsive" style="width: 100%;">
                                        <optgroup label="Role">
                                            <option value="superAdmin">SuperAdmin</option>
                                            <option value="engr">supervisor</option>
                                            <option value="coodinator">Zonal coodinator</option>
                                            <option value="head">divisional head</option>
                                        </optgroup>
                                    </select>
                                </div>
                            </div>


                        </div>
                        <footer class="panel-footer">
                            <div class="row">
                                <div class="col-md-12 text-right">
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                    <button class="btn btn-default modal-dismiss">Cancel</button>
                                </div>
                            </div>
                        </footer>
                    </form>
                </section>
            </div>

        </header>
        <div class="panel-body">
            <table class="table table-bordered table-striped mb-none" id="datatable-default">
                <thead>
                <tr>
                    <th>username</th>
                    <th>useremail</th>
                    <th>phoneNumber</th>
                    <th>role</th>
                    <th>action</th>

                </tr>

                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->phonenum}}</td>
                        <td>{{$user->role}}</td>
                        <td><a><i href="#modalForm1" class="modal-with-form fa fa-pencil" onclick="edit('{{$user}}')"></i></a>  <a class="delete-row" href="/user/delete/{{$user->id}}"><i  class="fa fa-trash-o"></i></a> </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </section>

@endsection

@section('footer')

    <!-- Specific Page Vendor -->
    <script src="{{asset('assets/vendor/select2/js/select2.js')}}"></script>
    <script src="{{asset('assets/vendor/jquery-datatables/media/js/jquery.dataTables.js')}}"></script>
    <script src="{{asset('assets/vendor/jquery-datatables/extras/TableTools/js/dataTables.tableTools.min.js')}}"></script>
    <script src="{{asset('assets/vendor/jquery-datatables-bs3/assets/js/datatables.js')}}"></script>

    <script src="{{asset('assets/vendor/pnotify/pnotify.custom.js')}}"></script>

    <script src="{{asset('assets/javascripts/tables/examples.datatables.default.js')}}"></script>
    <script src="{{asset('assets/javascripts/tables/examples.datatables.row.with.details.js')}}"></script>
    <script src="{{asset('assets/javascripts/tables/examples.datatables.tabletools.js')}}"></script>

    <script src="{{asset('assets/javascripts/ui-elements/examples.modals.js')}}"></script>

    <script>
        function edit(data) {
            data= JSON.parse(data)
            $('#updateUserName').val(data.name);
            $('#updateUserId').val(data.id);
            $('#updateUserPhone').val(data.phonenum);
            $('#updateUserEmail').val(data.email);
            $('#updateUserRole').value = data.role;
        }

        $('#menu_dashboard').removeClass('nav-active');
        $('#menu_zones').removeClass('nav-active');
        $('#menu_states').removeClass('nav-active');
        $('#menu_projects').removeClass('nav-active');
        $('#menu_finance').removeClass('nav-active');
        $('#menu_projectteam').removeClass('nav-active');
        $('#menu_reports').removeClass('nav-active');
        $('#menu_users').addClass('nav-active');
    </script>

@endsection