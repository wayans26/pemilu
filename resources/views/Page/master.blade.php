<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="{{asset('assets/img/rel_icon.jpeg')}}">
    <title>
        Pemilu Raya - KMHD Stikom Bali
    </title>

    {{-- css --}}

    <!--     Fonts and icons     -->
    {{-- <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" /> --}}
    {{-- <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet"> --}}
    <link href="{{asset('assets/css/all.css')}}" rel="stylesheet">
    <!-- Nucleo Icons -->
    <link href="{{asset('assets/css/nucleo-icons.css')}}" rel="stylesheet" />
    <!-- CSS Files -->
    <link href="{{asset('assets/css/black-dashboard.css?v=1.0.0')}}" rel="stylesheet" />
    {{-- <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> --}}
    <link rel="stylesheet" href="{{asset('assets/css/sweetalert2.min.css')}}">

    {{-- js --}}
    
    <script src="{{asset('assets/js/sweetalert2.min.js')}}"></script>
    {{-- <script src="{{asset('assets/js/jquery.min.js')}}"></script> --}}
    <script src="{{asset('assets/js/sweetalertFunction.js')}}"></script>
    <!--   Core JS Files   -->
    <script src="{{asset('assets/js/core/jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/core/popper.min.js')}}"></script>
    <script src="{{asset('assets/js/core/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/perfect-scrollbar.jquery.min.js')}}"></script>
    <!-- Chart JS -->
    <script src="{{asset('assets/js/plugins/chartjs.min.js')}}"></script>
    <!--  Notifications Plugin    -->
    <script src="{{asset('assets/js/plugins/bootstrap-notify.js')}}"></script>
    <!-- Control Center for Black Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{asset('assets/js/black-dashboard.min.js?v=1.0.0')}}"></script>

    <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>

<body class="">
    <div class="wrapper">
        <div class="sidebar">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red"
    -->
            <div class="sidebar-wrapper">
                <div class="logo">
                    <a href="javascript:void(0)" class="simple-text logo-mini">
                        Blink
                    </a>
                    <a href="javascript:void(0)" class="simple-text logo-normal">
                        Pemilu Raya
                    </a>
                </div>
                <ul class="nav">
                    @if (Session::get('level') === 'Peserta')
                    <li class="@yield('dashboard')">
                        <a href="/">
                            <i class="fa fa-home"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    @endif
                    @if (Session::get('level') === 'Admin')
                    <li class="@yield('status')">
                        <a href="/status">
                            <i class="fa fa-users"></i>
                            <p>Status Pemilih</p>
                        </a>
                    </li>
                    <li class="@yield('kandidat')">
                        <a href="/kandidat">
                            <i class="fa fa-users"></i>
                            <p>Daftar Kandidat</p>
                        </a>
                    </li>
                    <li class="@yield('pemilih')">
                        <a href="/pemilih">
                            <i class="fa fa-user"></i>
                            <p>Daftar Pemilih</p>
                        </a>
                    </li>
                    <li class="@yield('perolehansuara')">
                        <a href="/perolehansuara">
                            <i class="far fa-chart-bar"></i>
                            <p>Perolehan Suara</p>
                        </a>
                    </li>
                    <li class="@yield('detailsuara')">
                        <a href="/detailsuara">
                            <i class="fas fa-chart-line"></i>
                            <p>Detail Suara Masuk</p>
                        </a>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-absolute navbar-transparent">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <div class="navbar-toggle d-inline">
                            <button type="button" class="navbar-toggler">
                                <span class="navbar-toggler-bar bar1"></span>
                                <span class="navbar-toggler-bar bar2"></span>
                                <span class="navbar-toggler-bar bar3"></span>
                            </button>
                        </div>
                        <a class="navbar-brand" href="javascript:void(0)">E-VOTING PEMIRA KMHD</a>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navigation">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span
                                        class="mr-2 d-none d-lg-inline text-gray-600 small">{{Session::get('nama')}}</span>
                                    <img class="img-profile rounded-circle" src="assets/img/anime3.png"
                                        style="width: 4vh;height: 4vh;">
                                </a>
                                <!-- Dropdown - User Information -->
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                    aria-labelledby="userDropdown">
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Logout
                                    </a>
                                </div>
                            </li>
                            <li class="separator d-lg-none"></li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
            <div class="content">
                @section('konten')
                    
                @show
            </div>
            <footer class="footer">
                <div class="container-fluid">
                    <ul class="nav">
                        <li class="nav-item">Pemilu Raya - KMHD STIKOM Bali</li>
                    </ul>
                    <div class="copyright">
                        ©
                        <script>
                            document.write(new Date().getFullYear())

                        </script> by
                        <a href="https://www.instagram.com/wayans26/?hl=id" target="_blank">Wayan Setiawan</a>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="/logout">Logout</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
