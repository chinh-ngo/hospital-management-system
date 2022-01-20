@extends('layouts.app')

@section('header')

    <!-- Specific Page Vendor CSS -->
    <link rel="stylesheet" href="{{asset('assets/vendor/select2/css/select2.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/vendor/select2-bootstrap-theme/select2-bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/vendor/jquery-datatables-bs3/assets/css/datatables.css')}}" />

@endsection

@section('content')

    <header class="page-header">
        <h2>Finances</h2>

    </header>
    <section class="panel">
        <header class="panel-heading">
            <div class="panel-actions">

            </div>

            <a class="modal-with-form btn btn-default" href="#modalForm"><span class="fa fa-plus"></span> Add Finance</a>

            <a class="btn btn-default" onclick="exportToExcel()"><span class="fa fa-download"></span> Export as Excel</a>

            <!-- Modal Form -->
            <div id="modalForm" class="modal-block modal-block-primary mfp-hide">
                <section class="panel">

                    <form method="POST" action="{{route('finance.add')}}" class="form-horizontal mb-lg" novalidate="novalidate">
                        @csrf
                        <header class="panel-heading">
                            <h2 class="panel-title">Add Finance</h2>
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
                                    <label class="col-sm-3 control-label">Contract Sum</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="contract" class="form-control" placeholder="Type contract" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Amount Paid till date</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="amount" class="form-control" placeholder="Type amount" />
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

            <div id="modalForm1" class="modal-block modal-block-primary mfp-hide ">
                <section class="panel">

                    <form method="POST" action="{{route('finance.update')}}">
                        @csrf
                        <header class="panel-heading">
                            <h2 class="panel-title">Update Finance</h2>
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
                                <label class="col-sm-3 control-label">Contract Sum</label>
                                <div class="col-sm-9">
                                    <input type="text" name="updatecontract" id="updatecontract" class="form-control" placeholder="Type contract" />
                                    <input type="hidden" name="updateid" id="updateid" class="form-control"/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">Amount Paid till date</label>
                                <div class="col-sm-9">
                                    <input type="text" name="updateamount" id="updateamount" class="form-control" placeholder="Type amount" />
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
                    <th>Project</th>
                    <th>State</th>
                    <th>Contract Sum</th>
                    <th>Amount Paid till date</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($finances as $finance)
                    <tr>
                        <td>{{$finance->project->title}}</td>
                        <td>{{$finance->project->state->name}}</td>
                        <td>{{$finance->contract_sum}}</td>
                        <td>{{$finance->amount}}</td>
                        <td><a><i href="#modalForm1" class="modal-with-form fa fa-pencil" onclick="edit('{{$finance}}')"></i></a>  <a class="delete-row" href="/finance/delete/{{$finance->id}}"><i  class="fa fa-trash-o"></i></a> </td>
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
            $('#updateproject').val(data.project_id);
            $('#updatecontract').val(data.contract_sum);
            $('#updateamount').val(data.contract_sum);
            $('#updateid').val(data.id);

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
                sa=txtArea1.document.execCommand("SaveAs",true,"excel.xls");
            }
            else                 //other browser not tested on IE 11
                sa = window.open('data:application/vnd.ms-excel,' + encodeURIComponent(tab_text));

            return (sa);
        }

        $('#menu_dashboard').removeClass('nav-active');
        $('#menu_zones').removeClass('nav-active');
        $('#menu_states').removeClass('nav-active');
        $('#menu_projects').removeClass('nav-active');
        $('#menu_finance').addClass('nav-active');
        $('#menu_projectteam').removeClass('nav-active');
        $('#menu_reports').removeClass('nav-active');
        $('#menu_users').removeClass('nav-active');
    </script>

@endsection