@extends('layouts.app')

@section('header')

    <!-- Specific Page Vendor CSS -->
    <link rel="stylesheet" href="{{asset('assets/vendor/select2/css/select2.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/vendor/select2-bootstrap-theme/select2-bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/vendor/jquery-datatables-bs3/assets/css/datatables.css')}}" />

@endsection

@section('content')

    <header class="page-header">
        <h2>Reports</h2>
    </header>
    <section class="panel">

        <form class="form-horizontal mb-lg" method="POST" action="{{route('report.update.post')}}" enctype="multipart/form-data">
            @csrf
            <header class="panel-heading">
                <h2 class="panel-title">Update Report</h2>
            </header>
            <div class="panel-body">

                <div class="form-group mt-lg">
                    <label class="col-sm-3 control-label">visit date</label>
                    <div class="col-sm-9">
                        <input type="hidden" value="{{$report->id}}" name="reportid">
                        <input type="date" value="{{$report->visit_date}}" name="visitDate" class="form-control" required/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">project Location</label>
                    <div class="col-sm-9">
                        <input type="text" value="{{$report->project_location}}" name="projectLocation" class="form-control" required/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Percentage Completion</label>
                    <div class="col-sm-9">
                        <input type="text" value="{{$report->percentage_completion}}" name="percentage" class="form-control" required />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Challenges</label>
                    <div class="col-sm-9">
                        <input type="text" name="challenges" value="{{$report->challenges}}" class="form-control" required />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">recommendations</label>
                    <div class="col-sm-9">
                        <input type="text" name="recommendations" class="form-control" value="{{$report->recommendations}}" required/>
                    </div>
                </div>

                {{--<div class="form-group">--}}
                    {{--<label class="col-sm-3 control-label">Upload Doc</label>--}}
                    {{--<div class="col-sm-9">--}}
                        {{--<input type="file" name="uploadDoc"  class="form-control" value="/uploadFiles/{{$report->upload_document}}" required/>--}}
                    {{--</div>--}}
                {{--</div>--}}

                <div class="form-group">
                    <label class="col-sm-3 control-label">supervisor division</label>
                    <div class="col-sm-9">
                        <input type="text" name="superDivision" value="{{$report->supervisor_division}}" class="form-control" required/>
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-sm-3 control-label">supervision Location</label>
                    <div class="col-sm-9">
                        <input type="text" name="superLocation" class="form-control" required value="{{$report->supervision_location}}"/>
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-sm-3 control-label">Socio economic impact of the Project</label>
                    <div class="col-sm-9">
                        <input type="text" name="impactProject" class="form-control" value="{{$report->impact_project}}" required/>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">Zonal Coordinator Comment</label>
                    <div class="col-sm-9">
                        <textarea rows="5" name="zonalComment" class="form-control" required>{{$report->zonal_comment}} </textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Divisional Head Comment</label>
                    <div class="col-sm-9">
                        <textarea rows="5" name="divisionalComment" class="form-control" required>{{$report->divisional_comment}} </textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">HOD Comment</label>
                    <div class="col-sm-9">
                        <textarea rows="5" name="hodComment" class="form-control" required>{{$report->hod_comment}} </textarea>
                    </div>
                </div>

            </div>
            <footer class="panel-footer">
                <div class="row">
                    <div class="col-md-12 text-right">
                        <button class="btn btn-primary" type="submit">Update</button>
                    </div>
                </div>
            </footer>

        </form>
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

        $('#menu_dashboard').removeClass('nav-active');
        $('#menu_zones').removeClass('nav-active');
        $('#menu_states').removeClass('nav-active');
        $('#menu_projects').removeClass('nav-active');
        $('#menu_finance').removeClass('nav-active');
        $('#menu_projectteam').removeClass('nav-active');
        $('#menu_reports').addClass('nav-active');
        $('#menu_users').removeClass('nav-active');
    </script>
@endsection