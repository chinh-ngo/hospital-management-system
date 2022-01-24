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
        <h2>Patients</h2>
    </header>
    <section class="panel">
        <header class="panel-heading">
            <div class="panel-actions">
            </div>

            <a class="modal-with-form btn btn-default" href="#modalForm"><span class="fa fa-plus"></span> Add Patient</a>
            <!-- Modal Form -->
            <div id="modalForm" class="modal-block modal-block-primary mfp-hide">
                <section class="panel">

                    <form method="POST" action="{{url('/patient/add')}}"  enctype="multipart/form-data">
                        @csrf
                        <header class="panel-heading">
                            <h2 class="panel-title">Add Patient</h2>
                        </header>

                        <div class="panel-body">
                            <div class="form-group mt-lg">
                                <label class="col-sm-3 control-label">Card Number</label>
                                <div class="col-sm-9">
                                    <input type="number" name="card_num" class="form-control" required/>
                                </div>
                            </div>

                            <div class="form-group mt-lg">
                                <label class="col-sm-3 control-label">Name</label>
                                <div class="col-sm-9">
                                    <input type="text" name="name" class="form-control" required/>
                                </div>
                            </div>

                            <div class="form-group mt-lg">
                                <label class="col-sm-3 control-label">Age</label>
                                <div class="col-sm-9">
                                    <input type="number" name="age" class="form-control" required/>
                                </div>
                            </div>

                            <div class="form-group mt-lg">
                                <label class="col-sm-3 control-label">Address</label>
                                <div class="col-sm-9">
                                    <input type="text" name="address" class="form-control" required/>
                                </div>
                            </div>

                            <div class="form-group mt-lg">
                                <label class="col-sm-3 control-label">State</label>
                                <div class="col-sm-9">
                                    <input type="text" name="state" class="form-control" required/>
                                </div>
                            </div>

                            <div class="form-group mt-lg">
                                <label class="col-sm-3 control-label">Phone Number</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                    <span class="input-group-addon">
                                    <i class="fa fa-phone"></i>
                                    </span>
                                        <input id="phone" name="phone_num" data-plugin-masked-input data-input-mask="(999) 999-9999" placeholder="(123) 123-1234" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mt-lg">
                                <label class="col-sm-3 control-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="text" name="email" class="form-control" required/>
                                </div>
                            </div>

                            <div class="form-group mt-lg">
                                <label class="col-sm-3 control-label">King Phone</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                    <span class="input-group-addon">
                                    <i class="fa fa-phone"></i>
                                    </span>
                                        <input id="kingphone" name="king_phone" data-plugin-masked-input data-input-mask="(999) 999-9999" placeholder="(123) 123-1234" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">Doctor to see</label>
                                <div class="col-sm-9">
                                    <select name="insurance" id="insurance" data-plugin-selectTwo class="form-control populate js-example-responsive" style="width: 100%;">
                                        <optgroup label="insurance">
                                            @foreach($insurances as $insurance)
                                                <option value="{{$insurance->id}}">{{$insurance->name}}</option>
                                            @endforeach
                                        </optgroup>
                                    </select>
                                </div>
                            </div>


                            <div class="form-group mt-lg">
                                <label class="col-sm-3 control-label">Blood Group</label>
                                <div class="col-sm-9">
                                    <input type="text" name="blood" class="form-control" required/>
                                </div>
                            </div>
                            <div class="form-group mt-lg">
                                <label class="col-sm-3 control-label">Patient Picture</label>
                                <div class="col-sm-9">
                                    <input type="file" required name="patient_avatar" id="input-file-now" class="form-control"/>
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
                    <th>Card Number</th>
                    <th>Picture</th>
                    <th>Patient name</th>
                    <th>Age</th>
                    <th>Insurance</th>
                    <th>State</th>
                    <th>Phone number</th>
                    <th>To do</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($patients as $patient)
                    <tr style="text-align: center;">
                        <td>{{$patient->card_num}}</td>
                        <td><img src="uploadFiles/patients/{{$patient->upload_file}}" width="50" height="50"/></td>
                        <td>{{$patient->name}}</td>
                        <td>{{$patient->age}}</td>
                        <td>{{$patient->insurance_id}}</td>
                        <td>{{$patient->state}}</td>
                        <td>{{$patient->phone_num}}</td>
                        <td>{{$patient->phone_num}}</td>
                        <td><a><i onclick="update('{{$patient}}')" class="fa fa-pencil"></i></a>   <a class="delete-row" href="/patient/delete/{{$patient->id}}"><i  class="fa fa-trash-o"></i></a> </td>
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

    <script src="{{asset('assets/vendor/jquery-maskedinput/jquery.maskedinput.js')}}"></script>

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


        $('#menu_patients').addClass('nav-active');
    </script>
@endsection