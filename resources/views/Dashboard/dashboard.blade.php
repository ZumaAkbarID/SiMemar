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
        @if (Auth::user()->role == 'CEO')
            {{-- CEO --}}
            <div class="row">
                <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-9">
                                    <div class="d-flex align-items-center align-self-start">
                                        <h3 class="mb-0">{{ count($accPending) }}</h3>
                                        <p class="text-success ms-2 mb-0 font-weight-medium"></p>
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
                                        <h3 class="mb-0">{{ count($accActive) }}</h3>
                                        <p class="text-success ms-2 mb-0 font-weight-medium"></p>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="icon icon-box-success">
                                        <span class="mdi mdi-account-check icon-item"></span>
                                    </div>
                                </div>
                            </div>
                            <h6 class="text-muted font-weight-normal">Akun Aktif</h6>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-9">
                                    <div class="d-flex align-items-center align-self-start">
                                        <h3 class="mb-0">{{ count($accRejected) }}</h3>
                                        <p class="text-danger ms-2 mb-0 font-weight-medium"></p>
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
                                        <h3 class="mb-0">{{ count($accNonActive) }}</h3>
                                        <p class="text-success ms-2 mb-0 font-weight-medium"></p>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="icon icon-box-success ">
                                        <span class="mdi mdi-account-remove icon-item"></span>
                                    </div>
                                </div>
                            </div>
                            <h6 class="text-muted font-weight-normal">Akun Non Aktif</h6>
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
                                            <th> Nama </th>
                                            <th> Nomor HP </th>
                                            <th> Email </th>
                                            <th> Skill </th>
                                            <th> Keinginan Jabatan </th>
                                            <th> Tanggal Daftar </th>
                                            <th> Status </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($acc5Latest as $item)
                                            <tr>
                                                <td>
                                                    <img src="{{ asset('/storage') }}/{{ $item->profile_img }}"
                                                        alt="{{ $item->name }} - Foto Profil" />
                                                    <span class="ps-2">{{ $item->name }}</span>
                                                </td>
                                                <td> {{ $item->phone_number }} </td>
                                                <td> {{ $item->email }} </td>
                                                <td>
                                                    @if (is_null($item->skill))
                                                        Kosong
                                                    @else
                                                        {{ $item->skill }}
                                                    @endif
                                                </td>
                                                <td>
                                                    @if (is_null($item->position))
                                                        Kosong
                                                    @else
                                                        {{ $item->position }}
                                                    @endif
                                                </td>
                                                <td> {{ date('H:i:s d M, Y', strtotime($item->created_at)) }} </td>
                                                <td>
                                                    @if ($item->status == 'Aktif')
                                                        <div class="badge badge-outline-success">{{ $item->status }}</div>
                                                    @elseif($item->status == 'Non Aktif')
                                                        <div class="badge badge-outline-warning">{{ $item->status }}</div>
                                                    @elseif($item->status == 'Pending')
                                                        <div class="badge badge-outline-primary">{{ $item->status }}</div>
                                                    @else
                                                        <div class="badge badge-outline-danger">{{ $item->status }}</div>
                                                    @endif
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="7" align="center">Tidak ada Data</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- End CEO --}}
        @endif

        @if (Auth::user()->role !== 'CEO')
            <div class="row">
                <div class="col-xl-6 col-sm-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-10">
                                    <div class="d-flex align-items-center align-self-start">
                                        <h3 class="mb-0">{{ is_null($cv) ? 'Anda belum upload CV' : 'CV Tersimpan' }}
                                        </h3>
                                        <p class="text-success ms-2 mb-0 font-weight-medium"></p>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="icon icon-box-{{ is_null($cv) ? 'danger' : 'success' }}">
                                        <span class="mdi mdi-upload icon-item"></span>
                                    </div>
                                </div>
                            </div>
                            @if (!is_null($cv))
                                <a href="{{ route('Account_cv_download', Auth::user()->acc_code) }}"
                                    class="text-muted font-weight-normal" target="_blank">Download CV</a>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-sm-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-10">
                                    <div class="d-flex align-items-center align-self-start">
                                        <h3 class="mb-0">Akses sebagai</h3>
                                        <p class="text-success ms-2 mb-0 font-weight-medium"></p>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="icon icon-box-success">
                                        <span class="mdi mdi-account-key icon-item"></span>
                                    </div>
                                </div>
                            </div>
                            <h6 class="text-muted font-weight-normal">{{ Auth::user()->role }}</h6>
                        </div>
                    </div>
                </div>
            </div>
        @endif
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
