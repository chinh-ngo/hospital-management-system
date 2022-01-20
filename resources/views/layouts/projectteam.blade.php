@extends('layouts.app')

@section('header')
    <!-- Specific Page Vendor CSS -->
    <link rel="stylesheet" href="{{asset('assets/vendor/select2/css/select2.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/vendor/select2-bootstrap-theme/select2-bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/vendor/jquery-datatables-bs3/assets/css/datatables.css')}}" />

    <link rel="stylesheet" href="{{asset('assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css')}}" />
@endsection

@section('content')

    <header class="page-header">
        <h2>Project Teams</h2>

    </header>
    <section class="panel">
        <header class="panel-heading">
            <div class="panel-actions">
            </div>

            <a class="modal-with-form btn btn-default" href="#modalForm"><span class="fa fa-plus"></span> Add Project Team</a>

            <!-- Modal Form -->
            <div id="modalForm" class="modal-block modal-block-primary mfp-hide">
                <section class="panel">
                    <form method="POST" action="{{route('projectTeam.add')}}" class="form-horizontal mb-lg">
                        @csrf
                        <header class="panel-heading">
                            <h2 class="panel-title">Add Project Team</h2>
                        </header>
                        <div class="panel-body">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Project</label>
                                    <div class="col-sm-9">
                                        <select name="project" data-plugin-selectTwo class="form-control populate js-example-responsive" style="width: 100%;">
                                            <optgroup label="project">
                                                @foreach($projects as $project)
                                                    <option value="{{$project->id}}">{{$project->title}}</option>
                                                @endforeach
                                            </optgroup>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">State</label>
                                    <div class="col-sm-9">
                                        <select name="state" data-plugin-selectTwo class="form-control populate js-example-responsive" style="width: 100%;">
                                            <optgroup label="state">
                                                @foreach($states as $state)
                                                    <option value="{{$state->id}}">{{$state->name}}</option>
                                                @endforeach
                                            </optgroup>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Team members</label>
                                    <div class="col-md-6">
                                        <div class="input-group btn-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-users"></i>
                                            </span>
                                            <select name="members[]" class="form-control" multiple="multiple" data-plugin-multiselect data-plugin-options='{ "maxHeight": 200 }' id="ms_example4" required>
                                                @foreach($users as $user)
                                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
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

            <div id="modalForm1" class="modal-block modal-block-primary mfp-hide">
                <section class="panel">
                    <form method="POST" action="{{route('projectTeam.update')}}" class="form-horizontal mb-lg">
                        @csrf
                        <header class="panel-heading">
                            <h2 class="panel-title">Update Project Team</h2>
                            <input type="hidden" name="updateid" id="updateid">
                        </header>
                        <div class="panel-body">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Project</label>
                                <div class="col-sm-9">
                                    <select name="updateproject" id="updateproject" data-plugin-selectTwo class="form-control populate js-example-responsive" style="width: 100%;">
                                        <optgroup label="project">
                                            @foreach($projects as $project)
                                                <option value="{{$project->id}}">{{$project->title}}</option>
                                            @endforeach
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">State</label>
                                <div class="col-sm-9">
                                    <select name="updatestate" id="updatestate" data-plugin-selectTwo class="form-control populate js-example-responsive" style="width: 100%;">
                                        <optgroup id="update" label="state">
                                            @foreach($states as $state)
                                                <option value="{{$state->id}}">{{$state->name}}</option>
                                            @endforeach
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Team members</label>
                                <div class="col-md-6">
                                    <div class="input-group btn-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-users"></i>
                                            </span>
                                        <select name="updatemembers[]" id="updatemembers" class="form-control" multiple="multiple" data-plugin-multiselect data-plugin-options='{ "maxHeight": 200 }' id="ms_example4" required>
                                            @foreach($users as $user)
                                                <option value="{{$user->id}}">{{$user->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
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
                    <th>Project Title</th>
                    <th>Location</th>
                    <th>Team Members</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($teams as $team)
                    <tr>
                        <td>{{$team->project->title}}</td>
                        <td>{{$team->state->name}}</td>
                        <td>
                            @foreach($team->members as $member)
                                {{$member->user->name}},
                            @endforeach
                        </td>
                        <td><a><i href="#modalForm1" class="modal-with-form fa fa-pencil" onclick="edit('{{$team->members}}','{{$team}}')"></i></a>  <a class="delete-row" href="/project-team/delete/{{$team->id}}"><i  class="fa fa-trash-o"></i></a> </td>
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

    <script src="{{asset('assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js')}}"></script>

    <script src="{{asset('assets/vendor/pnotify/pnotify.custom.js')}}"></script>

    <script src="{{asset('assets/javascripts/tables/examples.datatables.default.js')}}"></script>
    <script src="{{asset('assets/javascripts/tables/examples.datatables.row.with.details.js')}}"></script>
    <script src="{{asset('assets/javascripts/tables/examples.datatables.tabletools.js')}}"></script>

    <script src="{{asset('assets/javascripts/ui-elements/examples.modals.js')}}"></script>

    <script>

        function edit(members, team){
            members = JSON.parse(members);
            team = JSON.parse(team);
            $('#updateproject').val(team.project_id);
            $('#updateid').val(team.id);
            $('#updatestate').val(team.state_id);

            var ms = [];

            for (var i = 0; i < members.length; i++){
                ms.push(members[i]['user_id']);
            }
            // console.log(ms);
            // document.getElementById("updatemembers").valueOf(ms);
            $('#updatemembers').val(ms);

        }

        $('#menu_dashboard').removeClass('nav-active');
        $('#menu_zones').removeClass('nav-active');
        $('#menu_states').removeClass('nav-active');
        $('#menu_projects').removeClass('nav-active');
        $('#menu_finance').removeClass('nav-active');
        $('#menu_projectteam').addClass('nav-active');
        $('#menu_reports').removeClass('nav-active');
        $('#menu_users').removeClass('nav-active');
    </script>
@endsection