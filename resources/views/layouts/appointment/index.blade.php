@extends('layouts.app')

@section('header')

    <!-- Specific Page Vendor CSS -->
    <link rel="stylesheet" href="{{asset('assets/vendor/select2/css/select2.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/vendor/select2-bootstrap-theme/select2-bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/vendor/jquery-datatables-bs3/assets/css/datatables.css')}}" />

    <link rel="stylesheet" href="{{asset('assets/vendor/bootstrap-colorpicker/css/bootstrap-colorpicker.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/vendor/bootstrap-timepicker/css/bootstrap-timepicker.css')}}" />
@endsection

@section('content')

    <header class="page-header">
        <h2>Appointments</h2>
    </header>
    <section class="panel">
        <header class="panel-heading">
            <div class="panel-actions">
            </div>

            <a class="modal-with-form btn btn-default" href="#modalForm"><span class="fa fa-plus"></span> Add Appointment</a>
            <!-- Modal Form -->
            <div id="modalForm" class="modal-block modal-block-primary mfp-hide">
                <section class="panel">

                    <form method="POST" action="{{route('zone.add')}}">
                        @csrf
                        <header class="panel-heading">
                            <h2 class="panel-title">Add Appointment</h2>
                        </header>

                        <div class="panel-body">
                            <div class="form-group mt-lg">
                                <label class="col-sm-3 control-label">Reason</label>
                                <div class="col-sm-9">
                                    <input type="text" name="reason" class="form-control" placeholder="Type Reason" required/>
                                </div>
                            </div>

                            <div class="form-group mt-lg">
                                <label class="col-sm-3 control-label">Date</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </span>
                                        <input type="text" data-plugin-datepicker="" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mt-lg">
                                <label class="col-sm-3 control-label">Time</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-clock-o"></i>
                                        </span>
                                        <input type="text" data-plugin-timepicker="" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">Doctor to see</label>
                                <div class="col-sm-9">
                                    <select name="user_id" id="user_id" data-plugin-selectTwo class="form-control populate js-example-responsive" style="width: 100%;">
                                        <optgroup label="user">
                                            @foreach($users as $user)
                                                <option value="{{$user->id}}">{{$user->name}}</option>
                                            @endforeach
                                        </optgroup>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group mt-lg">
                                <label class="col-sm-3 control-label">Consulting Room</label>
                                <div class="col-sm-9">
                                    <input type="text" name="room" class="form-control" placeholder="Type Consulting Room" required/>
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

            <a class="btn btn-default" onclick="exportToExcel()" ><span class="fa fa-download"></span> Export as Excel</a>

        </header>
        <div class="panel-body">
            <table class="table table-bordered table-striped mb-none" id="datatable-default">
                <thead>
                <tr>
                    <th>Reason</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Doctor to see</th>
                    <th>Consulting Room</th>
                </tr>
                </thead>
                <tbody>
                @foreach($appointments as $appointment)
                    <tr>
                        <td>{{$appointment->reason}}</td>
                        <td>{{$appointment->date}}</td>
                        <td>{{$appointment->time}}</td>
                        <td>{{$appointment->user->name}}</td>
                        <td>{{$appointment->room}}</td>
                        <td><a><i onclick="update('{{$appointment}}')" class="fa fa-pencil"></i></a>   <a class="delete-row" href="/appointment/delete/{{$appointment->id}}"><i  class="fa fa-trash-o"></i></a> </td>
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

    <script src="{{asset('assets/vendor/bootstrap-colorpicker/js/bootstrap-colorpicker.js')}}"></script>
    <script src="{{asset('assets/vendor/bootstrap-timepicker/bootstrap-timepicker.js')}}"></script>

    <script src="{{asset('assets/vendor/bootstrap-confirmation/bootstrap-confirmation.js')}}"></script>


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


        $('#menu_appointments').addClass('nav-active');
    </script>
@endsection