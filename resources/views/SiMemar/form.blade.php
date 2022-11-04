@extends('Layouts.SiMemar')

@section('SiMemar_css')
@endsection

@section('SiMemar_content')
    <div class="content-wrapper">
        <div class="row">
            @include('Partials.alert')
            <div class="col-12 col-lg-6 mt-4">
                <div class="card">
                    <div class="card-title pt-4 px-4">{{ $title }}</div>
                    <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="type" value="text">
                            <div class="form-group row">
                                <label for="app_name" class="col-sm-2 col-form-label">Nama Website *</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control p_input" id="app_name" name="app_name"
                                        required value="{{ $SiMemarConfig->app_name }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="meta_desc" class="col-sm-2 col-form-label">Deskripsi Meta</label>
                                <div class="col-sm-10">
                                    <textarea type="text" class="form-control p_input" cols="50" rows="30" id="meta_desc" name="meta_desc">{{ $SiMemarConfig->meta_desc }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="updated_at" class="col-sm-2 col-form-label">Terakhir diperbarui</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control p_input_disabled" id="updated_at"
                                        name="updated_at" disabled
                                        value="{{ date('H:i:s d M, Y', strtotime($SiMemarConfig->updated_at)) }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-info">Perbarui</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6 mt-4">
                <div class="card">
                    <div class="card-title pt-4 px-4">Pengaturan Gambar</div>
                    <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="type" value="image">
                            @if (is_null($SiMemarConfig->favicon))
                                <img src="https://via.placeholder.com/200x200.png"
                                    alt="{{ $SiMemarConfig->app_name }} - No Image Favicon" class="img-fluid"
                                    id="favicon-preview">
                            @else
                                <img src="{{ asset('/storage') }}/{{ $SiMemarConfig->favicon }}"
                                    alt="{{ $SiMemarConfig->app_name }}" class="img-fluid" id="favicon-preview">
                            @endif
                            <div class="form-group row mt-3">
                                <label for="favicon" class="col-sm-2 col-form-label">Favicon</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control p_input" id="favicon" name="favicon"
                                        accept=".png,.jpg,.ico">
                                    <div class="small">tekan ctrl+f5 apabila tidak berubah, rasio wajib 1:1</div>
                                </div>
                            </div>
                            @if (is_null($SiMemarConfig->meta_img))
                                <img src="https://via.placeholder.com/1200x628.png"
                                    alt="{{ $SiMemarConfig->app_name }} - No Image Meta" class="img-fluid"
                                    id="meta-img-preview">
                            @else
                                <img src="{{ asset('/storage') }}/{{ $SiMemarConfig->meta_img }}"
                                    alt="{{ $SiMemarConfig->app_name }}" class="img-fluid" id="meta-img-preview">
                            @endif
                            <div class="form-group row mt-3">
                                <label for="meta_img" class="col-sm-2 col-form-label">Gambar Meta</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control p_input" id="meta_img" name="meta_img"
                                        accept=".png,.jpg,.svg">
                                    <div class="small">lebar max : 1200, tinggi max : 628, max file : 2MB</div>
                                </div>
                            </div>
                            @if (is_null($SiMemarConfig->card_front_img))
                                <img src="https://via.placeholder.com/250x100.png" alt="{{ $SiMemarConfig->app_name }}"
                                    class="img-fluid" id="card-front-preview">
                            @else
                                <img src="{{ asset('/storage') }}/{{ $SiMemarConfig->card_front_img }}"
                                    alt="{{ $SiMemarConfig->app_name }}" class="img-fluid" id="card-front-preview">
                            @endif
                            <div class="form-group row mt-3">
                                <label for="card_front_img" class="col-sm-2 col-form-label">Kartu depan</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control p_input" id="card_front_img"
                                        name="card_front_img" accept=".png,.jpg,.svg">
                                    <div class="small">lebar max : 250, tinggi max : 140, max file : 2MB</div>
                                </div>
                            </div>
                            @if (is_null($SiMemarConfig->card_back_img))
                                <img src="https://via.placeholder.com/250x350.png" alt="{{ $SiMemarConfig->app_name }}"
                                    class="img-fluid" id="card-back-preview">
                            @else
                                <img src="{{ asset('/storage') }}/{{ $SiMemarConfig->card_back_img }}"
                                    alt="{{ $SiMemarConfig->app_name }}" class="img-fluid" id="card-back-preview">
                            @endif
                            <div class="form-group row mt-3">
                                <label for="card_back_img" class="col-sm-2 col-form-label">Kartu belakang</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control p_input" id="card_back_img"
                                        name="card_back_img" accept=".png,.jpg,.svg">
                                    <div class="small">lebar max : 250, tinggi max : 380, max file : 2MB</div>
                                </div>
                            </div>
                            <div class="form-group">
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
            // Favicon
            $("#favicon").change(function() {
                const file = this.files[0];
                if (file) {
                    let reader = new FileReader();
                    reader.onload = function(event) {
                        $("#favicon-preview")
                            .attr("src", event.target.result);
                    };
                    reader.readAsDataURL(file);
                }
            });
            // Meta Img
            $("#meta_img").change(function() {
                const file = this.files[0];
                if (file) {
                    let reader = new FileReader();
                    reader.onload = function(event) {
                        $("#meta-img-preview")
                            .attr("src", event.target.result);
                    };
                    reader.readAsDataURL(file);
                }
            });
            // Front Card
            $("#card_front_img").change(function() {
                const file = this.files[0];
                if (file) {
                    let reader = new FileReader();
                    reader.onload = function(event) {
                        $("#card-front-preview")
                            .attr("src", event.target.result);
                    };
                    reader.readAsDataURL(file);
                }
            });
            // Back Card
            $("#card_back_img").change(function() {
                const file = this.files[0];
                if (file) {
                    let reader = new FileReader();
                    reader.onload = function(event) {
                        $("#card-back-preview")
                            .attr("src", event.target.result);
                    };
                    reader.readAsDataURL(file);
                }
            });
        });
    </script>
@endsection
