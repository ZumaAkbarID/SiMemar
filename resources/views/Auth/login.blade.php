@extends('Layouts.SiMemar')

@section('SiMemar_css')
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('/storage') }}/SiMemar/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="{{ asset('/storage') }}/SiMemar/assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('/storage') }}/SiMemar/assets/css/style.css">
    <!-- End layout styles -->
@endsection

@section('SiMemar_content')
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="row w-100 m-0">
                <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
                    <div class="card col-12 col-sm-12 col-md-6 col-lg-4 mx-auto">
                        <div class="card-body px-5 py-5">
                            @include('Partials.alert')
                            <h3 class="card-title text-left mb-4">{{ $title }}</h3>
                            <form method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Email atau Nomor HP *</label>
                                    <input type="text" name="auth"
                                        class="@if ($errors->has('auth')) is-invalid @endif form-control p_input"
                                        required value="{{ old('auth') }}">
                                </div>
                                <div class="form-group">
                                    <label>Password *</label>
                                    <input type="password" name="password"
                                        class="@if ($errors->has('password')) is-invalid @endif form-control p_input"
                                        required>
                                </div>

                                <div class="text-center pt-3">
                                    <button type="submit" class="btn btn-primary btn-block enter-btn w-50">Masuk</button>
                                </div>
                                <p class="sign-up text-center">Belum memiliki Akun? <a
                                        href="{{ route('Auth_register') }}">Daftar</a>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->
            </div>
            <!-- row ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
@endsection

@section('SiMemar_js')
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{ asset('/storage') }}/SiMemar/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('/storage') }}/SiMemar/assets/js/off-canvas.js"></script>
    <script src="{{ asset('/storage') }}/SiMemar/assets/js/hoverable-collapse.js"></script>
    <script src="{{ asset('/storage') }}/SiMemar/assets/js/misc.js"></script>
    <script src="{{ asset('/storage') }}/SiMemar/assets/js/settings.js"></script>
    <script src="{{ asset('/storage') }}/SiMemar/assets/js/todolist.js"></script>
    <!-- endinject -->
    <script>
        $(document).ready(function() {
            $('#password').on('change', function() {
                if ($('#password').val().length < 8) {
                    $('#password').addClass('is-invalid');
                    $('#password_error').show();
                    $('#password_error').html('Password minimal 8 karakter');
                } else {
                    $('#password_error').hide();
                    $('#password').removeClass('is-invalid');
                }
            });

            $('#password_confirmation').on('change', function() {
                if ($('#password_confirmation').val() !== $('#password').val()) {
                    $('#password_confirmation').addClass('is-invalid');
                    $('#password_confirmation_error').show();
                    $('#password_confirmation_error').html('Password tidak sama');
                } else {
                    $('#password_confirmation_error').hide();
                    $('#password_confirmation').removeClass('is-invalid');
                }
            });
        });
    </script>
@endsection
