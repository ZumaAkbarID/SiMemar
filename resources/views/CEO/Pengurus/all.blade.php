@extends('Layouts.SiMemar')

@section('SiMemar_css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dynatable/0.3.1/jquery.dynatable.min.css" />
@endsection

@section('SiMemar_content')
    <div class="content-wrapper">
        <div class="col-12">
            <div class="row">
                <div class="col-12">
                    @include('Partials.alert')
                </div>
                <div class="col-6">
                    <button type="button" class="btn btn-info mb-3 p-2" data-bs-toggle="modal"
                        data-bs-target="#addPengurusModal">
                        Buat Akun Pengurus
                    </button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6 col-sm-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9">
                                <div class="d-flex align-items-center align-self-start">
                                    <h3 class="mb-0 text-success" id="counter-pengurus-active"></h3>
                                </div>
                            </div>
                        </div>
                        <h6 class="text-muted font-weight-normal mt-2">Pengurus Aktif</h6>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-sm-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9">
                                <div class="d-flex align-items-center align-self-start">
                                    <h3 class="mb-0 text-danger" id="counter-pengurus-non-active"></h3>
                                </div>
                            </div>
                        </div>
                        <h6 class="text-muted font-weight-normal mt-2">Pengurus Non Aktif</h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="row">
                <div class="col-6">
                    <div class="card p-4">
                        <div class="card-title">Pengurus Aktif</div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="tb-pengurus-active" class="table table-hover">
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card p-4">
                        <div class="card-title">Pengurus Non Aktif</div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="tb-pengurus-non-active" class="table table-hover">
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Modal pengurus --}}
    <div class="modal fade" id="addPengurusModal" tabindex="-1" aria-labelledby="addPengurusModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addPengurusModalLabel">Buat Akun Pengurus</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="forms-sample" action="{{ route('CEO_pengurus_add') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label">Name *</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control p_input" name="name" id="name" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-3 col-form-label">Email *</label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control p_input" id="email" name="email" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phone_number" class="col-sm-3 col-form-label">Nomor HP *</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control p_input" id="phone_number" name="phone_number"
                                    required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="position" class="col-sm-3 col-form-label">Position</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control p_input" id="position" name="position">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="skill" class="col-sm-3 col-form-label">Skill</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control p_input" id="skill" name="skill"
                                    placeholder="Pisahkan setiap skill dengan koma">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="contract_start" class="col-sm-3 col-form-label">Kontrak Mulai</label>
                            <div class="col-sm-9">
                                <input type="datetime-local" class="form-control p_input" id="contract_start"
                                    name="contract_start">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="contract_end" class="col-sm-3 col-form-label">Kontrak Selesai</label>
                            <div class="col-sm-9">
                                <input type="datetime-local" class="form-control p_input" id="contract_end"
                                    name="contract_end">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="profile_img" class="col-sm-3 col-form-label">Foto Profil *</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control p_input" accept=".png" id="profile_img"
                                    name="profile_img">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="status" class="col-sm-3 col-form-label">Status *</label>
                            <div class="col-sm-9">
                                <select name="status" id="status" class="form-control p_input text-white" required>
                                    <option value="Aktif" selected>Aktif</option>
                                    <option value="Non Aktif">Non Aktif</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="address" class="col-sm-3 col-form-label">Alamat *</label>
                            <div class="col-sm-9">
                                <textarea name="address" id="address" cols="30" rows="10" class="form-control p_input"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-sm-3 col-form-label">Password *</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control p_input" id="password" name="password"
                                    required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary me-2">Daftarkan</button>
                        <button class="btn btn-dark" type="button" data-bs-dismiss="modal">Batal</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="pengurusModal" tabindex="-1" aria-labelledby="pengurusModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="pengurusModalLabel">Kelola Pengurus</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="modal-body">
                </div>
            </div>
        </div>
    </div>
    {{-- Modal Delete --}}
    <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="deletePengurusModalLabel" aria-hidden="true"
        id="deletePengurusModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" id="modal-confirmation">
            </div>
        </div>
    </div>
@endsection

@section('SiMemar_js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dynatable/0.3.1/jquery.dynatable.min.js"></script>

    <script>
        function getTbPengurus(status) {
            if (status == 'Aktif') {
                $.ajax({
                    type: 'POST',
                    url: "{{ route('CEO_pengurus_get_table', 'Aktif') }}",
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'html',
                    success: function(result) {
                        $('#tb-pengurus-active').empty();
                        $('#tb-pengurus-active').html(result);
                    },
                    error: function() {
                        alert('GAGAL');
                    }
                });
            } else {
                $.ajax({
                    type: 'POST',
                    url: "{{ route('CEO_pengurus_get_table', 'Non Aktif') }}",
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'html',
                    success: function(result) {
                        $('#tb-pengurus-non-active').empty();
                        $('#tb-pengurus-non-active').html(result);
                    },
                    error: function() {
                        alert('GAGAL');
                    }
                });
            }
        }

        function getCounterPengurus(status) {
            if (status == 'Aktif') {
                $.ajax({
                    type: 'POST',
                    url: "{{ route('CEO_pengurus_get_counter', 'Aktif') }}",
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'html',
                    success: function(result) {
                        $('#counter-pengurus-active').empty();
                        $('#counter-pengurus-active').html(JSON.parse(result).msg);
                    },
                    error: function() {
                        alert('GAGAL');
                    }
                });
            } else {
                $.ajax({
                    type: 'POST',
                    url: "{{ route('CEO_pengurus_get_counter', 'Non Aktif') }}",
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'html',
                    success: function(result) {
                        $('#counter-pengurus-non-active').empty();
                        $('#counter-pengurus-non-active').html(JSON.parse(result).msg);
                    },
                    error: function() {
                        alert('GAGAL');
                    }
                });
            }
        }

        function detailPengurus(code) {
            $.ajax({
                type: 'POST',
                url: "{{ route('CEO_pengurus_detail') }}",
                data: {
                    acc_code: code,
                    _token: '{{ csrf_token() }}'
                },
                dataType: 'html',
                success: function(result) {
                    $('#modal-body').empty();
                    $('#modal-body').html(result);
                    $('#pengurusModal').modal('show');
                },
                error: function() {
                    alert('GAGAL');
                }
            });
        }

        function editPengurus(code) {
            $.ajax({
                type: 'POST',
                url: "{{ route('CEO_pengurus_edit_form') }}",
                data: {
                    acc_code: code,
                    _token: '{{ csrf_token() }}'
                },
                dataType: 'html',
                success: function(result) {
                    $('#modal-body').empty();
                    $('#modal-body').html(result);
                    $('#pengurusModal').modal('show');
                },
                error: function() {
                    alert('GAGAL');
                }
            });
        }

        function deletePengurus(code, uid) {
            $.ajax({
                type: 'POST',
                url: "{{ route('CEO_pengurus_delete_ask') }}",
                data: {
                    acc_code: code,
                    _token: '{{ csrf_token() }}'
                },
                dataType: 'html',
                success: function(result) {
                    $('#modal-confirmation').empty();
                    $('#modal-confirmation').html(result);
                    var modalConfirm = function(callback) {
                        $('#deletePengurusModal').modal('show');

                        $("#modal-btn-confirm").on("click", function() {
                            callback(true);
                            $("#deletePengurusModal").modal('hide');
                        });

                        $("#modal-btn-cancel").on("click", function() {
                            callback(false);
                            $("#deletePengurusModal").modal('hide');
                        });
                    };

                    modalConfirm(function(confirm) {
                        if (confirm) {
                            $.ajax({
                                type: 'POST',
                                url: "{{ route('CEO_pengurus_delete_confirm') }}",
                                data: {
                                    acc_code: code,
                                    uid: uid,
                                    _token: '{{ csrf_token() }}'
                                },
                                dataType: 'json',
                                success: function(result) {
                                    if (result.status == 200) {
                                        $('#alert-success').empty();
                                        $('#alert-success').html(result.msg);
                                        $('#alert-success').removeClass('d-none');
                                        setInterval(() => {
                                            $('#alert-success').addClass('d-none');
                                        }, 5000);
                                        getCounterPengurus('Aktif');
                                        getCounterPengurus('Non Aktif');
                                        getTbPengurus('Aktif');
                                        getTbPengurus('Non Aktif');
                                    } else {
                                        $('#alert-danger').empty();
                                        $('#alert-danger').html(result.msg);
                                        $('#alert-danger').removeClass('d-none');
                                        setInterval(() => {
                                            $('#alert-danger').addClass('d-none');
                                        }, 5000);
                                    }
                                },
                                error: function() {
                                    alert('GAGAL');
                                }
                            });
                        } else {
                            $('#alert-info').empty();
                            $('#alert-info').html('Aksi dibatalkan');
                            $('#alert-info').removeClass('d-none');
                            setInterval(() => {
                                $('#alert-info').addClass('d-none');
                            }, 5000);
                        }
                    });
                },
                error: function() {
                    alert('GAGAL');
                }
            });
        }

        $(document).ready(function() {
            getCounterPengurus('Aktif');
            getCounterPengurus('Non Aktif');
            getTbPengurus('Aktif');
            getTbPengurus('Non Aktif');
            $('#tb-pengurus-active').dynatable();
            $('#tb-pengurus-non-active').dynatable();
        });
    </script>
@endsection
