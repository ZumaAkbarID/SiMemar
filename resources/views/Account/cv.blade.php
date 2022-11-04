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

                            <div class="form-group row">
                                <label for="cv_url" class="col-sm-2 col-form-label">Upload CV</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control p_input" id="cv_url" name="cv_url"
                                        accept=".pdf">
                                </div>
                            </div>

                            @if (!is_null($cv))
                                <div class="form-group row">
                                    <label for="updated_at" class="col-sm-2 col-form-label">Pertama diupload</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control p_input_disabled" id="updated_at"
                                            name="updated_at" disabled
                                            value="{{ date('H:i:s d M, Y', strtotime(Auth::user()->created_at)) }}">
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
                            @endif

                            @if (!is_null($cv))
                                <div class="form-group">
                                    <button type="submit" class="btn btn-info">Perbarui</button>
                                </div>
                            @else
                                <div class="form-group">
                                    <button type="submit" class="btn btn-info">Upload</button>
                                </div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-6 mt-4">
                <div class="card">
                    <div class="card-title pt-4 px-4">PDF Preview</div>
                    <div class="text-small px-4">
                        @if ($cv)
                            Url : {{ asset('/storage') }}/{{ $cv->cv_url }}
                        @endif
                    </div>
                    <div class="card-body">
                        @if ($cv)
                            <iframe src="{{ asset('/storage') }}/{{ $cv->cv_url }}" frameborder="0" class="col-12"
                                height="700">Browser
                                Anda tidak support fitur pdf viewer</iframe>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('SiMemar_js')
@endsection
