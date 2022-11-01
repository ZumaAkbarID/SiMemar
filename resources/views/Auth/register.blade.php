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
                    <div class="card col-lg-8 mx-auto">
                        <div class="card-body px-5 py-5">
                            @include('Partials.alert')
                            <h3 class="card-title text-left mb-3">{{ $title }}</h3>
                            <form method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-6">
                                            <div class="form-group">
                                                <label>Nama Lengkap *</label>
                                                <input type="text" name="name"
                                                    class="@if ($errors->has('name')) is-invalid @endif form-control p_input"
                                                    required value="{{ old('name') }}">
                                            </div>
                                            <div class="form-group">
                                                <label>Email Aktif *</label>
                                                <input type="email" name="email"
                                                    class="@if ($errors->has('email')) is-invalid @endif form-control p_input"
                                                    required value="{{ old('email') }}">
                                            </div>
                                            <div class="form-group">
                                                <label>Nomor HP *</label>
                                                <input type="text" name="phone_number"
                                                    class="@if ($errors->has('phone_number')) is-invalid @endif form-control p_input"
                                                    required value="{{ old('phone_number') }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <div class="form-group">
                                                <label>Foto Profil *</label>
                                                <input type="file" name="profile_img"
                                                    class="@if ($errors->has('profile_img')) is-invalid @endif form-control p_input"
                                                    required accept=".png,.jpg,.jpeg">
                                            </div>
                                            <div class="form-group">
                                                <label>Jabatan diinginkan</label>
                                                <input type="text" name="position"
                                                    class="@if ($errors->has('position')) is-invalid @endif form-control p_input"
                                                    value="{{ old('position') }}">
                                            </div>
                                            <div class="form-group">
                                                <label>Skill</label>
                                                <input type="text" name="skill"
                                                    class="@if ($errors->has('skill')) is-invalid @endif form-control p_input"
                                                    placeholder="Pisahkan setiap skill dengan koma. contoh : php,excel,word"
                                                    value="{{ old('skill') }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Alamat Lengkap *</label>
                                    <textarea cols="30" rows="10" name="address"
                                        class="@if ($errors->has('address')) is-invalid @endif form-control p_input" required>{{ old('address') }}</textarea>
                                </div>
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-6">
                                            <div class="form-group">
                                                <label>Password *</label>
                                                <input type="password" id="password" name="password"
                                                    class="@if ($errors->has('password')) is-invalid @endif form-control p_input"
                                                    required>
                                                <div class="text-muted small" id="password_error"></div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <div class="form-group">
                                                <label>Ulangi Password *</label>
                                                <input type="password" id="password_confirmation"
                                                    name="password_confirmation"
                                                    class="@if ($errors->has('password_confirmation')) is-invalid @endif form-control p_input"
                                                    required>
                                                <div class="text-muted small" id="password_confirmation_error">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="text-center mt-3">
                                    <button type="submit" class="btn btn-primary btn-block enter-btn w-100">Daftar</button>
                                </div>
                                <p class="sign-up text-center">Sudah memiliki Akun? <a
                                        href="{{ route('Auth_login') }}">Masuk</a></p>
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
