<!DOCTYPE html>
<html class="fixed sidebar-light">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Link of CSS files -->

        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

        <!-- Vendor CSS -->
        <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.css')}}" />
        <link rel="stylesheet" href="{{ asset('assets/vendor/font-awesome/css/font-awesome.css')}}" />
        <link rel="stylesheet" href="{{ asset('assets/vendor/magnific-popup/magnific-popup.css')}}" />
        <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css')}}" />

        @yield('header')

        <!-- Theme CSS -->
        <link rel="stylesheet" href="{{ asset('assets/stylesheets/theme.css')}}" />

        <!-- Skin CSS -->
        <link rel="stylesheet" href="{{ asset('assets/stylesheets/skins/default.css')}}" />

        <!-- Theme Custom CSS -->
        <link rel="stylesheet" href="{{ asset('assets/stylesheets/theme-custom.css')}}">

        <!-- Head Libs -->
        <script src="{{ asset('assets/vendor/modernizr/modernizr.js')}}"></script>

    </head>
    <body>


    <section class="body">
        <header class="header">
            <div class="logo-container">
                <a href="#" class="logo">
                    <img src="{{asset('assets/images/logo.png')}}" width="75" height="35" alt="Porto Admin" />
                </a>
                <div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
                    <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
                </div>
            </div>

            <!-- start: search & user box -->
            <div class="header-right">

                <span class="separator"></span>

                <div id="userbox" class="userbox">
                    <a href="#" data-toggle="dropdown">
                        <div class="profile-info" data-lock-name="John Doe" data-lock-email="johndoe@okler.com">
                            <span class="name">{{auth()->user()->name}}</span>
                            <span class="role">
                                @if(auth()->user()->role == "superAdmin")
                                    administrator
                                @else
                                    user
                                @endif
                            </span>
                        </div>

                        <i class="fa custom-caret"></i>
                    </a>

                    <div class="dropdown-menu">
                        <ul class="list-unstyled">
                            <li class="divider"></li>
                            <li>
                                <a role="menuitem" tabindex="-1" href="{{route('signout')}}"><i class="fa fa-power-off"></i> Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- end: search & user box -->
        </header>

        <div class="inner-wrapper">
            <!-- start: sidebar -->
            <aside id="sidebar-left" class="sidebar-left">

                <div class="sidebar-header">
                    <div class="sidebar-title">
                        Navigation
                    </div>
                    <div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
                        <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
                    </div>
                </div>

                <div class="nano">
                    <div class="nano-content">
                        <nav id="menu" class="nav-main" role="navigation">

                            <ul class="nav nav-main">
                                <li id="menu_dashboard">
                                    <a href="{{route('dashboard')}}">
                                        <i class="fa fa-home" aria-hidden="true"></i>
                                        <span>Dashboard</span>
                                    </a>
                                </li>
                                <li id="menu_appointments">
                                    <a href="{{url('/appointment')}}">
                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                        <span>Appointments</span>
                                    </a>
                                </li>


                                <li id="menu_patients">
                                    <a href="{{url('/patient')}}">
                                        <i class="fa fa-bed" aria-hidden="true"></i>
                                        <span>Patients</span>
                                    </a>
                                </li>

                                @can('manage-project')

                                <li id="menu_drugs" class="nav-parent">
                                    <a href="#">
                                        <i class="fa fa-medkit" aria-hidden="true"></i>
                                        <span>Drugs</span>
                                    </a>
                                    <ul class="nav nav-children">
                                        <li id="li-drug">
                                            <a href="{{url('/drug')}}">
                                                Drugs
                                            </a>
                                        </li>
                                        <li id="li-category">
                                            <a href="{{url('/drug/category')}}">
                                                Drug Category
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                <li id="menu_tests">
                                    <a href="{{url('/test')}}">
                                        <i class="fa fa-pencil-square" aria-hidden="true"></i>
                                        <span>Test</span>
                                    </a>
                                </li>

                                <li id="menu_params">
                                    <a href="{{url('/parameter')}}">
                                        <i class="fa fa-flag" aria-hidden="true"></i>
                                        <span>Result Parameters</span>
                                    </a>
                                </li>

                                <li id="menu_scans">
                                    <a href="{{url('/scan')}}">
                                        <i class="fa fa-search" aria-hidden="true"></i>
                                        <span>Scan</span>
                                    </a>
                                </li>

                                <li id="menu_wards">
                                    <a href="{{url('/ward')}}">
                                        <i class="fa fa-building" aria-hidden="true"></i>
                                        <span>Wards</span>
                                    </a>
                                </li>

                                <li id="menu_beds">
                                    <a href="{{url('/bed')}}">
                                        <i class="fa fa-bed" aria-hidden="true"></i>
                                        <span>Beds</span>
                                    </a>
                                </li>

                                <li id="menu_reports">
                                    <a href="{{route('reports')}}">
                                        <i class="fa fa-search" aria-hidden="true"></i>
                                        <span>HMO</span>
                                    </a>
                                </li>

                                <li id="menu_reports">
                                    <a href="{{route('reports')}}">
                                        <i class="fa fa-server" aria-hidden="true"></i>
                                        <span>Other Services</span>
                                    </a>
                                </li>

                                <li id="menu_reports">
                                    <a href="{{route('reports')}}">
                                        <i class="fa fa-building-o" aria-hidden="true"></i>
                                        <span>Departments</span>
                                    </a>
                                </li>

                                <li id="menu_reports">
                                    <a href="{{route('reports')}}">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <span>Status</span>
                                    </a>
                                </li>

                                <li id="menu_reports">
                                    <a href="{{route('reports')}}">
                                        <i class="fa fa-heart" aria-hidden="true"></i>
                                        <span>Insurances</span>
                                    </a>
                                </li>


                                <li id="menu_users">
                                    <a href="{{route('users')}}">
                                        <i class="fa fa-user-plus" aria-hidden="true"></i>
                                        <span>Users</span>
                                    </a>
                                </li>
                                @endcan

                            </ul>
                        </nav>

                        <hr class="separator" />

                    </div>

                </div>

            </aside>
            <!-- end: sidebar -->

            <section role="main" class="content-body pb-none">

            @yield('content')

            </section>
        </div>

    </section>

    <script src="{{ asset('assets/vendor/jquery/jquery.js')}}"></script>
    <script src="{{ asset('assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js')}}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.js')}}"></script>
    <script src="{{ asset('assets/vendor/nanoscroller/nanoscroller.js')}}"></script>
    <script src="{{ asset('assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js')}}"></script>
    <script src="{{ asset('assets/vendor/magnific-popup/jquery.magnific-popup.js')}}"></script>
    <script src="{{ asset('assets/vendor/jquery-placeholder/jquery-placeholder.js')}}"></script>


    @yield('footer')
    <!-- Theme Base, Components and Settings -->
    <script src="{{ asset('assets/javascripts/theme.js')}}"></script>

    <!-- Theme Custom -->
    <script src="{{ asset('assets/javascripts/theme.custom.js')}}"></script>

    <!-- Theme Initialization Files -->
    <script src="{{ asset('assets/javascripts/theme.init.js')}}"></script>

    </body>
</html>