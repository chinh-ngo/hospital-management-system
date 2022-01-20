@extends('layouts.app')

@section('header')

    <!-- Specific Page Vendor CSS -->
    <link rel="stylesheet" href="{{asset('assets/vendor/select2/css/select2.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/vendor/select2-bootstrap-theme/select2-bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/vendor/jquery-datatables-bs3/assets/css/datatables.css')}}" />

@endsection

@section('content')

    <header class="page-header">
        <h2>States</h2>

    </header>
    <section class="panel">
        <header class="panel-heading">
            <div class="panel-actions">

            </div>

            <a class="modal-with-form btn btn-default" href="#modalForm"><span class="fa fa-plus"></span> Add State</a>

            <!-- Modal Form -->
            <div id="modalForm" class="modal-block modal-block-primary mfp-hide">
                <section class="panel">

                    <form method="POST" action="{{route('state.add')}}" class="form-horizontal mb-lg">
                        @csrf
                        <header class="panel-heading">
                            <h2 class="panel-title">Add State</h2>
                        </header>
                        <div class="panel-body">
                                <div class="form-group mt-lg">
                                    <label class="col-sm-3 control-label">Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="stateName" class="form-control" placeholder="Type your name..." required/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">State</label>
                                    <div class="col-sm-9">
                                        <select name="zoneId" data-plugin-selectTwo class="form-control populate js-example-responsive" style="width: 100%;">
                                            <optgroup label="Zones">
                                                @foreach($zones as $zone)
                                                    <option value="{{$zone->id}}">{{$zone->zone}}</option>
                                                @endforeach
                                            </optgroup>
                                        </select>
                                    </div>
                                </div>

                        </div>
                        <footer class="panel-footer">
                            <div class="row">
                                <div class="col-md-12 text-right">
                                    <button class="btn btn-primary">Submit</button>
                                    <button class="btn btn-default modal-dismiss">Cancel</button>
                                </div>
                            </div>
                        </footer>
                    </form>
                </section>
            </div>

            <div id="modalForm1" class="modal-block modal-block-primary mfp-hide ">
                <section class="panel">

                    <form method="POST" action="{{route('state.update')}}">
                        @csrf
                        <header class="panel-heading">
                            <h2 class="panel-title">Update State</h2>
                        </header>

                        <div class="panel-body">
                            <div class="form-group mt-lg">
                                <label class="col-sm-3 control-label">Name</label>
                                <div class="col-sm-9">
                                    <input type="text" name="updateStateName" id="updateStateName" class="form-control" placeholder="Type your zone name..." required/>
                                    <input type="hidden" name="updateStateId" id="updateStateId">
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
                    <th>State</th>
                    <th>Zone</th>
                    <th>No of projects</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($states as $state)
                    <tr>
                        <td style="cursor: pointer;color: #3aadf1;" onclick="showByStateId({{$state->id}})">{{$state->name}}</td>
                        <td>{{$state->zone->zone}}</td>
                        <td>{{$state->projects->count()}}</td>
                        <td><a><i href="#modalForm1" class="modal-with-form fa fa-pencil" onclick="edit('{{$state}}')"></i></a>  <a class="delete-row" href="/state/delete/{{$state->id}}"><i  class="fa fa-trash-o"></i></a> </td>
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
            $('#updateStateName').val(data.name);
            $('#updateStateId').val(data.id);
        }

        function showByStateId(id){
            window.location.assign('projects/' + id);
        }

        $('#menu_dashboard').removeClass('nav-active');
        $('#menu_zones').removeClass('nav-active');
        $('#menu_states').addClass('nav-active');
        $('#menu_projects').removeClass('nav-active');
        $('#menu_finance').removeClass('nav-active');
        $('#menu_projectteam').removeClass('nav-active');
        $('#menu_reports').removeClass('nav-active');
        $('#menu_users').removeClass('nav-active');



    </script>

@endsection