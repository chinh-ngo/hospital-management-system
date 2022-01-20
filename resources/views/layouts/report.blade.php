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
        <header class="panel-heading">
            <div class="panel-actions">
            </div>

            <a class="btn btn-default" href="{{route('report.add')}}"><span class="fa fa-plus"></span> Add Report</a>
            <a class="btn btn-default" onclick="exportToExcel()" ><span class="fa fa-download"></span> Export as Excel</a>

        </header>
        <div class="panel-body">
            <table class="table table-bordered table-striped mb-none" id="datatable-default">
                <thead>
                <tr>
                    <th>Supervisor's name</th>
                    <th>Visit Date</th>
                    <th>Project Location</th>
                    <th>Percentage completion</th>
                    <th>Challenges</th>
                    <th>Recommendations</th>
                    <th>Doc</th>
                    <th>Supervisor division</th>
                    <th>Supervision Location</th>
                    <th>Socio Economic Impact of the Project</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($reports as $report)
                <tr>
                    <td>{{$report->user->name}}</td>
                    <td>{{$report->visit_date}}</td>
                    <td>{{$report->project_location}}</td>
                    <td>{{$report->percentage_completion}}</td>
                    <td>{{$report->challenges}}</td>
                    <td>{{$report->recommendations}}</td>
                    <td>
                        @if($report->upload_document)
                            <a href="/uploadFiles/{{$report->upload_document}}"><span class="fa fa-download"></span></a>
                        @endif
                    </td>
                    <td>{{$report->supervisor_division}}</td>
                    <td>{{$report->supervision_location}}</td>
                    <td>{{$report->impact_project}}</td>
                    <td><a><i onclick="update('{{$report}}')" class="fa fa-pencil"></i></a>   <a class="delete-row" href="/report/delete/{{$report->id}}"><i  class="fa fa-trash-o"></i></a> </td>

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


        function update(data){
            data = JSON.parse(data);
            window.location.assign('/report/update/' + data.id);
        }

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