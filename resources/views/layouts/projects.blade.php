@extends('layouts.app')

@section('header')

    <!-- Specific Page Vendor CSS -->
    <link rel="stylesheet" href="{{asset('assets/vendor/select2/css/select2.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/vendor/select2-bootstrap-theme/select2-bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/vendor/jquery-datatables-bs3/assets/css/datatables.css')}}" />

@endsection

@section('content')

    <header class="page-header">
        <h2>Projects</h2>

    </header>
    <section class="panel">
        <header class="panel-heading">
            <div class="panel-actions">


            </div>

            <a class="modal-with-form btn btn-default" href="#modalForm"><span class="fa fa-plus"></span> Add Project</a>

            <a class="btn btn-default" onclick="exportToExcel()"><span class="fa fa-download"></span> Export as Excel</a>
            <!-- Modal Form -->
            <div id="modalForm" class="modal-block modal-block-primary mfp-hide">
                <section class="panel">
                    <form method="POST" action="{{route('project.add')}}" class="form-horizontal mb-lg">
                        @csrf
                        <header class="panel-heading">
                            <h2 class="panel-title">Add Project</h2>
                        </header>
                        <div class="panel-body">
                                <div class="form-group mt-lg">
                                    <label class="col-sm-3 control-label">Title of Project</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="title" class="form-control" placeholder="Type title" required/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Awarded Date</label>
                                    <div class="col-sm-9">
                                        <input type="date" name="awardDate" class="form-control" placeholder="Type date" required/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Contractor</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="contractor" class="form-control" placeholder="Type contractor" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Supervisor</label>
                                    <div class="col-sm-9">
                                        <select name="supervisor" data-plugin-selectTwo class="form-control populate js-example-responsive" style="width: 100%;">
                                            <optgroup label="SuperVisor">
                                                @foreach($supervisors as $supervisor)
                                                    <option value="{{$supervisor->id}}">{{$supervisor->name}}</option>
                                                @endforeach
                                            </optgroup>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">State</label>
                                    <div class="col-sm-9">
                                        <select name="stateId" data-plugin-selectTwo class="form-control populate js-example-responsive" style="width: 100%;">
                                            <optgroup label="State">
                                                @foreach($states as $state)
                                                    <option value="{{$state->id}}">{{$state->name}}</option>
                                                @endforeach
                                            </optgroup>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Objectives</label>
                                    <div class="col-sm-9">
                                        <textarea rows="5" class="form-control" name="objectives" placeholder="Type Objectives" required></textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Percent of Complete</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="completepercent" class="form-control" placeholder="Type percentage" />
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Retention</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="retention" class="form-control" placeholder="Type retention" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Commencement Date</label>
                                    <div class="col-sm-9">
                                        <input type="date" name="commenDate" class="form-control" placeholder="Type date" required/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Complete Date</label>
                                    <div class="col-sm-9">
                                        <input type="date" name="completeDate" class="form-control" placeholder="Type date" required/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Direct</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="direct" class="form-control" placeholder="Type direct" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Indirect</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="indirect" class="form-control" placeholder="Type indirect" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Induced</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="induced" class="form-control" placeholder="Type induced" />
                                    </div>
                                </div>
                        </div>
                        <footer class="panel-footer">
                            <div class="row">
                                <div class="col-md-12 text-right">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <button class="btn btn-default modal-dismiss">Cancel</button>
                                </div>
                            </div>
                        </footer>
                    </form>
                </section>
            </div>

            <div id="modalForm1" class="modal-block modal-block-primary mfp-hide ">
                <section class="panel">

                    <form method="POST" action="{{route('project.update')}}">
                        @csrf
                        <header class="panel-heading">
                            <h2 class="panel-title">Update Project</h2>
                        </header>

                        <div class="panel-body">
                            <div class="form-group mt-lg">
                                <label class="col-sm-3 control-label">Title of Project</label>
                                <div class="col-sm-9">
                                    <input type="text" name="updatetitle" id="updatetitle" class="form-control" placeholder="Type title" required/>
                                    <input type="hidden" name="updateid" id="updateid" class="form-control" required/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Awarded Date</label>
                                <div class="col-sm-9">
                                    <input type="date" name="updateawardDate" id="updateawardDate" class="form-control" placeholder="Type date" required/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Contractor</label>
                                <div class="col-sm-9">
                                    <input type="text" name="updatecontractor" id="updatecontractor" class="form-control" placeholder="Type contractor" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Supervisor</label>
                                <div class="col-sm-9">
                                    <select name="updatesupervisor" id="updatesupervisor" data-plugin-selectTwo class="form-control populate js-example-responsive" style="width: 100%;">
                                        <optgroup label="SuperVisor">
                                            @foreach($supervisors as $supervisor)
                                                <option value="{{$supervisor->id}}">{{$supervisor->name}}</option>
                                            @endforeach
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">State</label>
                                <div class="col-sm-9">
                                    <select name="updatestateId" id="updatestateId" data-plugin-selectTwo class="form-control populate js-example-responsive" style="width: 100%;">
                                        <optgroup label="State">
                                            @foreach($states as $state)
                                                <option value="{{$state->id}}">{{$state->name}}</option>
                                            @endforeach
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Objectives</label>
                                <div class="col-sm-9">
                                    <textarea rows="5" class="form-control" name="updateobjectives" id="updateobjectives" placeholder="Type Objectives" required></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">Percent of Complete</label>
                                <div class="col-sm-9">
                                    <input type="text" name="updatecompletepercent" id="updatecompletepercent" class="form-control" placeholder="Type percentage" />
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-sm-3 control-label">Retention</label>
                                <div class="col-sm-9">
                                    <input type="text" name="updateretention" id="updateretention" class="form-control" placeholder="Type retention" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">Commencement Date</label>
                                <div class="col-sm-9">
                                    <input type="date" name="updatecommenDate" id="updatecommenDate" class="form-control" placeholder="Type date" required/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">Complete Date</label>
                                <div class="col-sm-9">
                                    <input type="date" name="updatecompleteDate" id="updatecompleteDate" class="form-control" placeholder="Type date" required/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Direct</label>
                                <div class="col-sm-9">
                                    <input type="text" name="updatedirect" id="updatedirect" class="form-control" placeholder="Type direct" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">Indirect</label>
                                <div class="col-sm-9">
                                    <input type="text" name="updateindirect" id="updateindirect" class="form-control" placeholder="Type indirect" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">Induced</label>
                                <div class="col-sm-9">
                                    <input type="text" name="updateinduced" id="updateinduced" class="form-control" placeholder="Type induced" />
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
                    <th>Year Of Award</th>
                    <th>Project title</th>
                    <th>Contractor</th>
                    <th>Supervisor</th>
                    <th>State</th>
                    <th>Objectives</th>
                    <th>percentage completion</th>
                    <th>Retention</th>
                    <th>Commencement Date</th>
                    <th>Completion Date</th>
                    <th>Direct</th>
                    <th>Indirect</th>
                    <th>Induced</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($projects as $project)
                    <tr>
                        <td>{{$project->awarddate}}</td>
                        <td>{{$project->title}}</td>
                        <td>{{$project->contractor}}</td>
                        <td>{{$project->user->name}}</td>
                        <td>{{$project->state->name}}</td>
                        <td>{{$project->objectives}}</td>
                        <td>{{$project->percentcomplete}}</td>
                        <td>{{$project->retention}}</td>
                        <td>{{$project->commendate}}</td>
                        <td>{{$project->completedate}}</td>
                        <td>{{$project->direct}}</td>
                        <td>{{$project->indirect}}</td>
                        <td>{{$project->induced}}</td>
                        <td><a><i href="#modalForm1" class="modal-with-form fa fa-pencil" onclick="edit('{{$project}}')"></i></a>   <a class="delete-row" href="/project/delete/{{$project->id}}"><i  class="fa fa-trash-o"></i></a> </td>
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
            $('#updatetitle').val(data.title);
            $('#updateid').val(data.id);
            $('#updateawardDate').val(data.awarddate);
            $('#updatecontractor').val(data.contractor);
            $('#updatesupervisor').val(data.user_id);
            $('#updatestateId').val(data.state_id);
            $('#updateobjectives').val(data.objectives);
            $('#updatecompletepercent').val(data.percentcomplete);
            $('#updateretention').val(data.retention);
            $('#updatecommenDate').val(data.commendate);
            $('#updatecompleteDate').val(data.completedate);
            $('#updatedirect').val(data.direct);
            $('#updateindirect').val(data.indirect);
            $('#updateinduced').val(data.induced);

        }
        $('#menu_dashboard').removeClass('nav-active');
        $('#menu_zones').removeClass('nav-active');
        $('#menu_states').removeClass('nav-active');
        $('#menu_projects').addClass('nav-active');
        $('#menu_finance').removeClass('nav-active');
        $('#menu_projectteam').removeClass('nav-active');
        $('#menu_reports').removeClass('nav-active');
        $('#menu_users').removeClass('nav-active');

        function exportToExcel(){
            var tab_text="<table border='2px'><tr bgcolor='#87AFC6'>";
            var textRange; var j=0;
            tab = document.getElementById('datatable-default'); // id of table

            for(j = 0 ; j < tab.rows.length ; j++)
            {
                tab_text=tab_text+tab.rows[j].innerHTML+"</tr>";
                //tab_text=tab_text+"</tr>";
            }

            tab_text=tab_text+"</table>";
            tab_text= tab_text.replace(/<A[^>]*>|<\/A>/g, "");//remove if u want links in your table
            tab_text= tab_text.replace(/<img[^>]*>/gi,""); // remove if u want images in your table
            tab_text= tab_text.replace(/<input[^>]*>|<\/input>/gi, ""); // reomves input params

            var ua = window.navigator.userAgent;
            var msie = ua.indexOf("MSIE ");

            if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./))      // If Internet Explorer
            {
                txtArea1.document.open("txt/html","replace");
                txtArea1.document.write(tab_text);
                txtArea1.document.close();
                txtArea1.focus();
                sa=txtArea1.document.execCommand("SaveAs",true,"Say Thanks to Sumit.xls");
            }
            else                 //other browser not tested on IE 11
                sa = window.open('data:application/vnd.ms-excel,' + encodeURIComponent(tab_text));

            return (sa);
        }


    </script>

@endsection