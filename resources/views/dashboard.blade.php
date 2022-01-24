@extends('layouts.app')

@section('header')
    @include('partials/header')
@endsection

@section('content')
    <header class="page-header">
        <h2>Hospital Management Software</h2>

    </header>

    <div>
        <div class="row">

            <div class="col-md-12 col-lg-4 col-xl-4">
                <section class="panel panel-featured-left panel-featured-primary">
                    <div class="panel-body">
                        <div class="widget-summary">
                            <div class="widget-summary-col widget-summary-col-icon">
                                <div class="summary-icon bg-primary">
                                    <i class="fa fa-user"></i>
                                </div>
                            </div>
                            <div class="widget-summary-col">
                                <div class="summary">
                                    <h4 class="title">Patients</h4>
                                    <div class="info">
                                        <strong class="amount">{{$patients}}</strong>
                                    </div>
                                </div>
                                <div class="summary-footer">
                                    <a class="text-muted text-uppercase" href="{{url('/patient')}}">(View All)</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="col-md-12 col-lg-4 col-xl-4">
                <section class="panel panel-featured-left panel-featured-secondary">
                    <div class="panel-body">
                        <div class="widget-summary">
                            <div class="widget-summary-col widget-summary-col-icon">
                                <div class="summary-icon bg-secondary">
                                    <i class="fa fa-building"></i>
                                </div>
                            </div>
                            <div class="widget-summary-col">
                                <div class="summary">
                                    <h4 class="title">Wards</h4>
                                    <div class="info">
                                        <strong class="amount">{{$wards}}</strong>
                                    </div>
                                </div>
                                <div class="summary-footer">
                                    <a class="text-muted text-uppercase" href="{{url('/ward')}}">(View All)</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="col-md-12 col-lg-4 col-xl-4">
                <section class="panel panel-featured-left panel-featured-tertiary">
                    <div class="panel-body">
                        <div class="widget-summary">
                            <div class="widget-summary-col widget-summary-col-icon">
                                <div class="summary-icon bg-tertiary">
                                    <i class="fa fa-bed"></i>
                                </div>
                            </div>
                            <div class="widget-summary-col">
                                <div class="summary">
                                    <h4 class="title">Beds</h4>
                                    <div class="info">
                                        <strong class="amount">{{$beds}}</strong>
                                    </div>
                                </div>
                                <div class="summary-footer">
                                    <a class="text-muted text-uppercase" href="{{url('/bed')}}">(View All)</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="col-md-12 col-lg-4 col-xl-4">
                <section class="panel panel-featured-left panel-featured-quaternary">
                    <div class="panel-body">
                        <div class="widget-summary">
                            <div class="widget-summary-col widget-summary-col-icon">
                                <div class="summary-icon bg-quaternary">
                                    <i class="fa fa-object-group"></i>
                                </div>
                            </div>
                            <div class="widget-summary-col">
                                <div class="summary">
                                    <h4 class="title">Amount Owning</h4>
                                    <div class="info">
                                        <strong class="amount">3765</strong>
                                    </div>
                                </div>
                                <div class="summary-footer">
                                    <a class="text-muted text-uppercase">(View All)</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>


            <div class="col-md-12 col-lg-4 col-xl-4">
                <section class="panel panel-featured-left panel-featured-info">
                    <div class="panel-body">
                        <div class="widget-summary">
                            <div class="widget-summary-col widget-summary-col-icon">
                                <div class="summary-icon bg-info">
                                    <i class="fa fa-usd"></i>
                                </div>
                            </div>
                            <div class="widget-summary-col">
                                <div class="summary">
                                    <h4 class="title">Amount Paid</h4>
                                    <div class="info">
                                        <strong class="amount">3765</strong>
                                    </div>
                                </div>
                                <div class="summary-footer">
                                    <a class="text-muted text-uppercase">(View All)</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>


            <div class="col-md-12 col-lg-4 col-xl-4">
                <section class="panel panel-featured-left panel-featured-success">
                    <div class="panel-body">
                        <div class="widget-summary">
                            <div class="widget-summary-col widget-summary-col-icon">
                                <div class="summary-icon bg-success">
                                    <i class="fa fa-pencil"></i>
                                </div>
                            </div>
                            <div class="widget-summary-col">
                                <div class="summary">
                                    <h4 class="title">Appointments</h4>
                                    <div class="info">
                                        <strong class="amount">{{$appointments}}</strong>
                                    </div>
                                </div>
                                <div class="summary-footer">
                                    <a class="text-muted text-uppercase" href="{{url('/appointment')}}">(View All)</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-lg-12 col-md-12">
            <section class="panel">
                <header class="panel-heading panel-heading-transparent">
                    <div class="panel-actions">
                    </div>
                    <h2 class="panel-title">Latest Patients</h2>
                </header>
                <div class="panel-body">
                    <div class="row">
                        @foreach($latestPatients as $patient)
                        <div class="col-md-12 col-lg-3 col-xl-3">
                            <section class="panel">
                                <header class="panel-heading bg-default">
                                    <div class="panel-heading-profile-picture">
                                        <img src="uploadFiles/patients/{{$patient->upload_file}}">
                                    </div>
                                </header>
                                <div class="panel-body">
                                    <h4 class="text-weight-semibold mt-sm">{{$patient->name}}</h4>
                                    <p>{{$patient->state}}</p>
                                    <hr class="solid short">
                                    <p><i class="fa fa-id-card mr-xs">  card:</i> {{$patient->card_num}}</p>
                                    <p><i class="fa fa-user mr-xs">   age:</i> {{$patient->age}}</p>
                                    <p><i class="fa fa-phone mr-xs">    phone:</i> {{$patient->phone_num}}</p>
                                </div>
                            </section>
                        </div>
                        @endforeach
                    </div>

                </div>
            </section>
        </div>

    </div>

@endsection


@section('footer')
    <script>
        $('#menu_dashboard').addClass('nav-active');
        $('#menu_zones').removeClass('nav-active');
        $('#menu_states').removeClass('nav-active');
        $('#menu_projects').removeClass('nav-active');
        $('#menu_finance').removeClass('nav-active');
        $('#menu_projectteam').removeClass('nav-active');
        $('#menu_reports').removeClass('nav-active');
        $('#menu_users').removeClass('nav-active');


        function goToStates(id){
            window.location.assign('states/'+id);
        }
    </script>
@endsection