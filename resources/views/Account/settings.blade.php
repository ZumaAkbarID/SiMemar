@extends('Layouts.SiMemar')

@section('SiMemar_css')
@endsection

@section('SiMemar_content')
    <div class="content-wrapper">
        <div class="row">
            @include('Partials.alert')
            <div class="col-sm-12 col-md-12 col-lg-6 mt-4">
                <div class="card">
                    <div class="card-title pt-4 px-4">{{ $title }}</div>
                    <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="type" value="text">
                            <div class="form-group row">
                                <label for="name" class="col-sm-2 col-form-label">Nama *</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control p_input" id="name" name="name"
                                        required value="{{ Auth::user()->name }}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-sm-2 col-form-label">Email *</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control p_input" id="email" name="email"
                                        required value="{{ Auth::user()->email }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="phone_number" class="col-sm-2 col-form-label">Nomor HP *</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control p_input" id="phone_number" name="phone_number"
                                        required value="{{ Auth::user()->phone_number }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="position" class="col-sm-2 col-form-label">Jabatan</label>
                                <div class="col-sm-10">
                                    @if (Auth::user()->role == 'CEO')
                                        <input type="text" class="form-control p_input" id="position" name="position"
                                            value="{{ Auth::user()->position }}">
                                        <div class="small text-muted">CEO dapat merubah sesuka hati</div>
                                    @else
                                        <input type="text" class="form-control p_input_disabled" disabled id="position"
                                            name="" value="{{ Auth::user()->position }} ({{ Auth::user()->role }})">
                                        <div class="small text-muted">tidak dapat dirubah</div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="skill" class="col-sm-2 col-form-label">Skill</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control p_input" id="skill" name="skill"
                                        value="{{ Auth::user()->skill }}">
                                    <div class="small text-muted">pisahkan setiap skill dengan koma</div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="address" class="col-sm-2 col-form-label">Alamat</label>
                                <div class="col-sm-10">
                                    <textarea cols="50" rows="30" class="form-control p_input" id="address" name="address" required>{{ Auth::user()->address }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Kontrak Dimulai</label>
                                <div class="col-sm-10">
                                    @if (!is_null(Auth::user()->contract_start))
                                        <input type="text" class="form-control p_input_disabled" id=""
                                            name="" disabled
                                            value="{{ date('H:i:s d M, Y', strtotime(Auth::user()->contract_start)) }}">
                                    @else
                                        <input type="text" name="" disabled id=""
                                            class="form-control p_input_disabled" value="Tidak ada data">
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Kontrak Selesai</label>
                                <div class="col-sm-10">
                                    @if (!is_null(Auth::user()->contract_end))
                                        <input type="text" class="form-control p_input_disabled" id=""
                                            name="" disabled
                                            value="{{ date('H:i:s d M, Y', strtotime(Auth::user()->contract_end)) }}">
                                    @else
                                        <input type="text" name="" disabled id=""
                                            class="form-control p_input_disabled" value="Tidak ada data">
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Terverifikasi pada</label>
                                <div class="col-sm-10">
                                    @if (!is_null(Auth::user()->account_verified_at))
                                        <input type="text" class="form-control p_input_disabled" id=""
                                            name="" disabled
                                            value="{{ date('H:i:s d M, Y', strtotime(Auth::user()->account_verified_at)) }}">
                                    @else
                                        <input type="text" name="" disabled id=""
                                            class="form-control p_input_disabled" value="Tidak ada data">
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Email Terverifikasi pada</label>
                                <div class="col-sm-10">
                                    @if (!is_null(Auth::user()->email_verified_at))
                                        <input type="text" class="form-control p_input_disabled" id=""
                                            name="" disabled
                                            value="{{ date('H:i:s d M, Y', strtotime(Auth::user()->email_verified_at)) }}">
                                    @else
                                        <input type="text" name="" disabled id=""
                                            class="form-control p_input_disabled" value="Tidak ada data">
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Diterima Oleh</label>
                                <div class="col-sm-10">
                                    @if (is_array($pengurusUser))
                                        <input type="text" class="form-control p_input_disabled" id=""
                                            name="" disabled
                                            value="{{ $pengurusUser['name'] }} ({{ $pengurusUser['role'] }})">
                                    @else
                                        <input type="text" class="form-control p_input_disabled" id=""
                                            name="" disabled
                                            value="{{ $pengurusUser->name }} ({{ $pengurusUser->role }})">
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="updated_at" class="col-sm-2 col-form-label">Terakhir diperbarui</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control p_input_disabled" id="updated_at"
                                        name="updated_at" disabled
                                        value="{{ date('H:i:s d M, Y', strtotime(Auth::user()->updated_at)) }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-info">Perbarui</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-6 mt-4">
                <div class="card">
                    <div class="card-title pt-4 px-4">Pengaturan Gambar</div>
                    <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="type" value="image">
                            <img src="{{ asset('/storage') }}/{{ Auth::user()->profile_img }}"
                                alt="{{ Auth::user()->name }} - Foto Profil" class="img-fluid" id="profile-img-preview">
                            <div class="form-group row">
                                <label for="profile_img" class="col-sm-2 col-form-label">Foto Profil</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control p_input mt-2" id="profile_img"
                                        name="profile_img" accept=".png">
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-info">Perbarui</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-6 mt-4">
                <div class="card">
                    <div class="card-title pt-4 px-4">Pengaturan Password</div>
                    <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="type" value="password">
                            <div class="form-group row">
                                <label for="current_password" class="col-sm-2 col-form-label">Password Saat Ini</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control p_input" id="current_password"
                                        name="current_password">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-sm-2 col-form-label">Password Baru</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control p_input" id="password" name="password">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password_confirmation" class="col-sm-2 col-form-label">Ulangi Password</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control p_input" id="password_confirmation"
                                        name="password_confirmation">
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-info">Perbarui</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('SiMemar_js')
    <script>
        $(document).ready(() => {
            // Profile Img
            $("#profile_img").change(function() {
                const file = this.files[0];
                if (file) {
                    let reader = new FileReader();
                    reader.onload = function(event) {
                        $("#profile-img-preview")
                            .attr("src", event.target.result);
                    };
                    reader.readAsDataURL(file);
                }
            });
        });
    </script>
@endsection
