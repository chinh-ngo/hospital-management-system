@extends('layouts.app')

@section('header')

    <!-- Specific Page Vendor CSS -->
    <link rel="stylesheet" href="{{asset('assets/vendor/select2/css/select2.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/vendor/select2-bootstrap-theme/select2-bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/vendor/jquery-datatables-bs3/assets/css/datatables.css')}}" />

@endsection

@section('content')

    <header class="page-header">
        <h2>Add Appointment</h2>
    </header>
    <section class="panel">

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

        $('#menu_appointments').addClass('nav-active');
    </script>
@endsection