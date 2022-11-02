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
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6 col-sm-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9">
                                <div class="d-flex align-items-center align-self-start">
                                    <h3 class="mb-0 text-success" id="counter-member-active">0</h3>
                                </div>
                            </div>
                        </div>
                        <h6 class="text-muted font-weight-normal mt-2">Member Diterima & Aktif</h6>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-sm-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9">
                                <div class="d-flex align-items-center align-self-start">
                                    <h3 class="mb-0 text-warning" id="counter-member-non-active">0</h3>
                                </div>
                            </div>
                        </div>
                        <h6 class="text-muted font-weight-normal mt-2">Member Diterima & Non Aktif</h6>
                    </div>
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
                                    <h3 class="mb-0 text-primary" id="counter-member-pending">0</h3>
                                </div>
                            </div>
                        </div>
                        <h6 class="text-muted font-weight-normal mt-2">Member Pending</h6>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-sm-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9">
                                <div class="d-flex align-items-center align-self-start">
                                    <h3 class="mb-0 text-danger" id="counter-member-rejected">0</h3>
                                </div>
                            </div>
                        </div>
                        <h6 class="text-muted font-weight-normal mt-2">Member Ditolak</h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="row">
                <div class="col-sm-12 col-md-6 mt-4">
                    <div class="card p-4">
                        <div class="card-title">Member Diterima & Aktif</div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="tb-member-active" class="table table-hover">
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 mt-4">
                    <div class="card p-4">
                        <div class="card-title">Member Diterima & Non Aktif</div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="tb-member-non-active" class="table table-hover">
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="row">
                <div class="col-sm-12 col-md-6 mt-4">
                    <div class="card p-4">
                        <div class="card-title">Member Pending</div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="tb-member-pending" class="table table-hover">
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 mt-4">
                    <div class="card p-4">
                        <div class="card-title">Member Ditolak</div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="tb-member-rejected" class="table table-hover">
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Modal Member --}}
    <div class="modal fade" id="memberModal" tabindex="-1" aria-labelledby="memberModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="memberModalLabel">Kelola Member</h1>
                    <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="modal-body">
                </div>
            </div>
        </div>
    </div>
    {{-- Modal Delete --}}
    <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="deleteMemberModalLabel" aria-hidden="true"
        id="deleteMemberModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" id="modal-confirmation">
            </div>
        </div>
    </div>
@endsection

@section('SiMemar_js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dynatable/0.3.1/jquery.dynatable.min.js"></script>

    <script>
        function getTbMember(status) {
            if (status == 'Aktif') {
                $.ajax({
                    type: 'POST',
                    url: "{{ route('CEO_member_get_table', 'Aktif') }}",
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'html',
                    success: function(result) {
                        $('#tb-member-active').empty();
                        $('#tb-member-active').html(result);
                    },
                    error: function() {
                        alert('GAGAL');
                    }
                });
            } else if (status == 'Non Aktif') {
                $.ajax({
                    type: 'POST',
                    url: "{{ route('CEO_member_get_table', 'Non Aktif') }}",
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'html',
                    success: function(result) {
                        $('#tb-member-non-active').empty();
                        $('#tb-member-non-active').html(result);
                    },
                    error: function() {
                        alert('GAGAL');
                    }
                });
            } else if (status == 'Pending') {
                $.ajax({
                    type: 'POST',
                    url: "{{ route('CEO_member_get_table', 'Pending') }}",
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'html',
                    success: function(result) {
                        $('#tb-member-pending').empty();
                        $('#tb-member-pending').html(result);
                    },
                    error: function() {
                        alert('GAGAL');
                    }
                });
            } else if (status == 'Ditolak') {
                $.ajax({
                    type: 'POST',
                    url: "{{ route('CEO_member_get_table', 'Ditolak') }}",
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'html',
                    success: function(result) {
                        $('#tb-member-rejected').empty();
                        $('#tb-member-rejected').html(result);
                    },
                    error: function() {
                        alert('GAGAL');
                    }
                });
            }
        }

        function getCounterMember(status) {
            if (status == 'Aktif') {
                $.ajax({
                    type: 'POST',
                    url: "{{ route('CEO_member_get_counter', 'Aktif') }}",
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'html',
                    success: function(result) {
                        $('#counter-member-active').empty();
                        $('#counter-member-active').html(JSON.parse(result).msg);
                    },
                    error: function() {
                        alert('GAGAL');
                    }
                });
            } else if (status == 'Non Aktif') {
                $.ajax({
                    type: 'POST',
                    url: "{{ route('CEO_member_get_counter', 'Non Aktif') }}",
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'html',
                    success: function(result) {
                        $('#counter-member-non-active').empty();
                        $('#counter-member-non-active').html(JSON.parse(result).msg);
                    },
                    error: function() {
                        alert('GAGAL');
                    }
                });
            } else if (status == 'Pending') {
                $.ajax({
                    type: 'POST',
                    url: "{{ route('CEO_member_get_counter', 'Pending') }}",
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'html',
                    success: function(result) {
                        $('#counter-member-pending').empty();
                        $('#counter-member-pending').html(JSON.parse(result).msg);
                    },
                    error: function() {
                        alert('GAGAL');
                    }
                });
            } else if (status == 'Ditolak') {
                $.ajax({
                    type: 'POST',
                    url: "{{ route('CEO_member_get_counter', 'Ditolak') }}",
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'html',
                    success: function(result) {
                        $('#counter-member-rejected').empty();
                        $('#counter-member-rejected').html(JSON.parse(result).msg);
                    },
                    error: function() {
                        alert('GAGAL');
                    }
                });
            }
        }

        function detailMember(code) {
            $.ajax({
                type: 'POST',
                url: "{{ route('CEO_member_detail') }}",
                data: {
                    acc_code: code,
                    _token: '{{ csrf_token() }}'
                },
                dataType: 'html',
                success: function(result) {
                    $('#modal-body').empty();
                    $('#modal-body').html(result);
                    $('#memberModal').modal('show');
                },
                error: function() {
                    alert('GAGAL');
                }
            });
        }

        function editMember(code) {
            $.ajax({
                type: 'POST',
                url: "{{ route('CEO_member_edit_form') }}",
                data: {
                    acc_code: code,
                    _token: '{{ csrf_token() }}'
                },
                dataType: 'html',
                success: function(result) {
                    $('#modal-body').empty();
                    $('#modal-body').html(result);
                    $('#memberModal').modal('show');
                },
                error: function() {
                    alert('GAGAL');
                }
            });
        }

        function deleteMember(code, uid) {
            $.ajax({
                type: 'POST',
                url: "{{ route('CEO_member_delete_ask') }}",
                data: {
                    acc_code: code,
                    _token: '{{ csrf_token() }}'
                },
                dataType: 'html',
                success: function(result) {
                    $('#modal-confirmation').empty();
                    $('#modal-confirmation').html(result);
                    var modalConfirm = function(callback) {
                        $('#deleteMemberModal').modal('show');

                        $("#modal-btn-confirm").on("click", function() {
                            callback(true);
                            $("#deleteMemberModal").modal('hide');
                        });

                        $("#modal-btn-cancel").on("click", function() {
                            callback(false);
                            $("#deleteMemberModal").modal('hide');
                        });
                    };

                    modalConfirm(function(confirm) {
                        if (confirm) {
                            $.ajax({
                                type: 'POST',
                                url: "{{ route('CEO_member_delete_confirm') }}",
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
                                        getCounterMember('Aktif');
                                        getCounterMember('Non Aktif');
                                        getCounterMember('Pending');
                                        getCounterMember('Ditolak');
                                        getTbMember('Aktif');
                                        getTbMember('Pending');
                                        getTbMember('Ditolak');
                                        getTbMember('Non Aktif');
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
            getCounterMember('Aktif');
            getCounterMember('Non Aktif');
            getCounterMember('Pending');
            getCounterMember('Ditolak');
            getTbMember('Aktif');
            getTbMember('Pending');
            getTbMember('Ditolak');
            getTbMember('Non Aktif');
            $('#tb-member-active').dynatable();
            $('#tb-member-non-active').dynatable();
            $('#tb-member-rejected').dynatable();
            $('#tb-member-pending').dynatable();
        });
    </script>
@endsection
