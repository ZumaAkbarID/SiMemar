<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="shortcut icon" href="{{ $SiMemarConfig->favicon }}" type="image/x-icon">

    <title>{{ $title }}</title>

    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('/storage') }}/SiMemar/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="{{ asset('/storage') }}/SiMemar/assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    @yield('SiMemar_css')
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('/storage') }}/SiMemar/assets/css/style.css">
    <!-- End layout styles -->
</head>

<body>
    @if (Request::segment(1) !== 'auth')
        <div class="container-scroller">
            <div class="row p-0 m-0 proBanner" id="proBanner">
                <div class="col-md-12 p-0 m-0">
                    <div class="card-body card-body-padding d-flex align-items-center justify-content-between">
                        <div class="ps-lg-1">
                            <div class="d-flex align-items-center justify-content-between">
                                <p class="mb-0 font-weight-medium me-3 buy-now-text">Support developer via Saweria !</p>
                                <a href="https://saweria.co/ZumaID" target="_blank"
                                    class="btn me-2 buy-now-btn border-0">Support <span
                                        class="text-danger">&hearts;</span></a>
                            </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-between">
                            <button id="bannerClose" class="btn border-0 p-0">
                                <i class="mdi mdi-close text-white me-0"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- partial:partials/_sidebar -->
            @include('Partials.SiMemar._sidebar')
            <!-- partial -->
            <div class="container-fluid page-body-wrapper">
                <!-- partial:partials/_navbar -->
                @include('Partials.SiMemar._navbar')
                <!-- partial -->
                <div class="main-panel">
                    @yield('SiMemar_content')
                    <!-- content-wrapper ends -->
                    <!-- partial:partials/_footer -->
                    @include('Partials.SiMemar._footer')
                    <!-- partial -->
                </div>
                <!-- main-panel ends -->
            </div>
            <!-- page-body-wrapper ends -->
        </div>
    @else
        @yield('SiMemar_auth_content')
    @endif

    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{ asset('/storage') }}/SiMemar/assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="{{ asset('/storage') }}/SiMemar/assets/js/jquery.cookie.js"></script>
    <!-- endinject -->
    <script src="{{ asset('/storage') }}/SiMemar/assets/js/off-canvas.js"></script>
    <script src="{{ asset('/storage') }}/SiMemar/assets/js/hoverable-collapse.js"></script>
    <script src="{{ asset('/storage') }}/SiMemar/assets/js/misc.js"></script>
    <script src="{{ asset('/storage') }}/SiMemar/assets/js/settings.js"></script>
    <!-- Custom js for this page -->
    @yield('SiMemar_js')
    <!-- End custom js for this page -->
</body>

</html>
