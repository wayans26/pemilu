<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="assets/img/rel_icon.jpeg">
    <title>
        Pemilu Raya - KMHD Stikom Bali
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <!-- Nucleo Icons -->
    <link href="assets/css/nucleo-icons.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link href="assets/css/black-dashboard.css?v=1.0.0" rel="stylesheet" />
    <!-- Parsley JS / VALIDATORS -->
    <script src="assets/js/jquery-3.1.1.slim.min.js"></script>
    <script src="assets/js/parsley.min.js"></script>
    <script src="assets/js/validator.js"></script>
    <link rel="stylesheet" href="assets/css/sweetalert2.min.css">
    <script src="assets/js/sweetalert2.min.js"></script>
    <script src="assets/js/sweetalertFunction.js"></script>
    <link rel="stylesheet" href="assets/css/parsley.css">
</head>

<body>
    <div class="wrapper">
        <div class="main-panel">
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">
                                    <center><img src="assets/img/login.png" width="90px" height="90px"></center>
                                </div>
                                @if (Session::has('status'))
                                <div class="alert alert-danger">
                                    <ul>
                                        <li>{!! Session::get('status') !!}</li>
                                    </ul>
                                </div>
                                @endif
                                <div class="card-body">
                                    <form method="POST" data-parsley-validate="">
                                        {{csrf_field()}}
                                        <div class="form-group">
                                            <label class="control-label" for="nim">Nim</label>
                                            <input type="text" name="nim" placeholder="masukkan nim" id="nim"
                                                class="form-control" data-parsley-type="number"
                                                data-parsley-required="true" data-parsley-length="[9, 10]">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="password">Password</label>
                                            <input type="password" name="password" placeholder="masukkan password"
                                                class="form-control" required="">
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6"></div>
                                                <div class="col-md-6">
                                                    <button type="reset"
                                                        class="btn btn-danger btn-lg">Cancel</button>
                                                    <button type="submit" class="btn btn-primary btn-lg"
                                                        name="btnLogin">Login</button>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <a href="input/pemilih.php" style="text-decoration: none; color: white; float: right;">Register</a> -->
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4"></div>
                    </div>
                </div>
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
                        <a href="javascript:void(0)" target="_blank">Wayan Setiawan</a>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    @if (Session::has('status-vote-berhasil'))
    <script>
        successAlert("Vote berhasil");

    </script>
    @elseif(Session::has('status-vote-gagal'))
    <script>
        errorAlert("Vote gagal");

    </script>
    @endif

    <!--   Core JS Files   -->
    <script src="assets/js/core/jquery.min.js"></script>
    <script src="assets/js/core/popper.min.js"></script>
    <script src="assets/js/core/bootstrap.min.js"></script>
    <script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
    <!-- Chart JS -->
    <script src="assets/js/plugins/chartjs.min.js"></script>
    <!--  Notifications Plugin    -->
    <script src="assets/js/plugins/bootstrap-notify.js"></script>
    <!-- Control Center for Black Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="assets/js/black-dashboard.min.js?v=1.0.0"></script>

    <script>
        $(document).ready(function () {
            // Javascript method's body can be found in assets/js/demos.js
            demo.initDashboardPageCharts();

        });

    </script>
</body>

</html>
