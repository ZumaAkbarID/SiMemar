@extends('Layouts.SiMemar')

@section('SiMemar_css')
    <link rel="stylesheet" href="{{ asset('/storage') }}/SiMemar/assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="{{ asset('/storage') }}/SiMemar/assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="{{ asset('/storage') }}/SiMemar/assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ asset('/storage') }}/SiMemar/assets/vendors/owl-carousel-2/owl.theme.default.min.css">
@endsection

@section('SiMemar_content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card corona-gradient-card">
                    <div class="card-body py-0 px-0 px-sm-3">
                        <div class="row align-items-center">
                            <div class="col-4 col-sm-3 col-xl-2">
                                <img src="{{ asset('/storage') }}/SiMemar/assets/images/dashboard/Group126@2x.png"
                                    class="gradient-corona-img img-fluid" alt="">
                            </div>
                            <div class="col-5 col-sm-7 col-xl-8 p-0">
                                <h4 class="mb-1 mb-sm-0">Selamat datang di
                                    {{ $SiMemarConfig->app_name }}</h4>
                                <p class="mb-0 font-weight-normal d-none d-sm-block">
                                    {{ Auth::user()->name }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9">
                                <div class="d-flex align-items-center align-self-start">
                                    <h3 class="mb-0">$12.34</h3>
                                    <p class="text-success ms-2 mb-0 font-weight-medium">+3.5%</p>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="icon icon-box-success ">
                                    <span class="mdi mdi-account-search icon-item"></span>
                                </div>
                            </div>
                        </div>
                        <h6 class="text-muted font-weight-normal">Akun Pending</h6>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9">
                                <div class="d-flex align-items-center align-self-start">
                                    <h3 class="mb-0">$17.34</h3>
                                    <p class="text-success ms-2 mb-0 font-weight-medium">+11%</p>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="icon icon-box-success">
                                    <span class="mdi mdi-account-check icon-item"></span>
                                </div>
                            </div>
                        </div>
                        <h6 class="text-muted font-weight-normal">Akun Diterima</h6>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9">
                                <div class="d-flex align-items-center align-self-start">
                                    <h3 class="mb-0">$12.34</h3>
                                    <p class="text-danger ms-2 mb-0 font-weight-medium">-2.4%</p>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="icon icon-box-danger">
                                    <span class="mdi mdi-account-off icon-item"></span>
                                </div>
                            </div>
                        </div>
                        <h6 class="text-muted font-weight-normal">Akun Ditolak</h6>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9">
                                <div class="d-flex align-items-center align-self-start">
                                    <h3 class="mb-0">$31.53</h3>
                                    <p class="text-success ms-2 mb-0 font-weight-medium">+3.5%</p>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="icon icon-box-success ">
                                    <span class="mdi mdi-account-multiple icon-item"></span>
                                </div>
                            </div>
                        </div>
                        <h6 class="text-muted font-weight-normal">Total Akun</h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="row ">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">5 Akun Terbaru</h4>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>
                                            <div class="form-check form-check-muted m-0">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input">
                                                </label>
                                            </div>
                                        </th>
                                        <th> Client Name </th>
                                        <th> Order No </th>
                                        <th> Product Cost </th>
                                        <th> Project </th>
                                        <th> Payment Mode </th>
                                        <th> Start Date </th>
                                        <th> Payment Status </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="form-check form-check-muted m-0">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input">
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <img src="{{ asset('/storage') }}/SiMemar/assets/images/faces/face1.jpg"
                                                alt="image" />
                                            <span class="ps-2">Henry Klein</span>
                                        </td>
                                        <td> 02312 </td>
                                        <td> $14,500 </td>
                                        <td> Dashboard </td>
                                        <td> Credit card </td>
                                        <td> 04 Dec 2019 </td>
                                        <td>
                                            <div class="badge badge-outline-success">Approved</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-check form-check-muted m-0">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input">
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <img src="{{ asset('/storage') }}/SiMemar/assets/images/faces/face2.jpg"
                                                alt="image" />
                                            <span class="ps-2">Estella Bryan</span>
                                        </td>
                                        <td> 02312 </td>
                                        <td> $14,500 </td>
                                        <td> Website </td>
                                        <td> Cash on delivered </td>
                                        <td> 04 Dec 2019 </td>
                                        <td>
                                            <div class="badge badge-outline-warning">Pending</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-check form-check-muted m-0">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input">
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <img src="{{ asset('/storage') }}/SiMemar/assets/images/faces/face5.jpg"
                                                alt="image" />
                                            <span class="ps-2">Lucy Abbott</span>
                                        </td>
                                        <td> 02312 </td>
                                        <td> $14,500 </td>
                                        <td> App design </td>
                                        <td> Credit card </td>
                                        <td> 04 Dec 2019 </td>
                                        <td>
                                            <div class="badge badge-outline-danger">Rejected</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-check form-check-muted m-0">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input">
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <img src="{{ asset('/storage') }}/SiMemar/assets/images/faces/face3.jpg"
                                                alt="image" />
                                            <span class="ps-2">Peter Gill</span>
                                        </td>
                                        <td> 02312 </td>
                                        <td> $14,500 </td>
                                        <td> Development </td>
                                        <td> Online Payment </td>
                                        <td> 04 Dec 2019 </td>
                                        <td>
                                            <div class="badge badge-outline-success">Approved</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-check form-check-muted m-0">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input">
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <img src="{{ asset('/storage') }}/SiMemar/assets/images/faces/face4.jpg"
                                                alt="image" />
                                            <span class="ps-2">Sallie Reyes</span>
                                        </td>
                                        <td> 02312 </td>
                                        <td> $14,500 </td>
                                        <td> Website </td>
                                        <td> Credit card </td>
                                        <td> 04 Dec 2019 </td>
                                        <td>
                                            <div class="badge badge-outline-success">Approved</div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('SiMemar_js')
    <!-- Plugin js for this page -->
    <script src="{{ asset('/storage') }}/SiMemar/assets/vendors/chart.js/Chart.min.js"></script>
    <script src="{{ asset('/storage') }}/SiMemar/assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="{{ asset('/storage') }}/SiMemar/assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
    <script src="{{ asset('/storage') }}/SiMemar/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="{{ asset('/storage') }}/SiMemar/assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
    <script src="{{ asset('/storage') }}/SiMemar/assets/js/jquery.cookie.js" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <!-- endinject -->
    <script src="{{ asset('/storage') }}/SiMemar/assets/js/dashboard.js"></script>
@endsection
