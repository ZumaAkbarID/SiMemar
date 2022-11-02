<form class="forms-sample" action="javascript:void(0)">
    <div class="form-group row">
        <label for="name" class="col-sm-3 col-form-label">Name</label>
        <div class="col-sm-9">
            <input type="text" class="form-control p_input_disabled" name="name" id="name" disabled
                value="{{ $data->name }}">
        </div>
    </div>
    <div class="form-group row">
        <label for="email" class="col-sm-3 col-form-label">Email</label>
        <div class="col-sm-9">
            <input type="email" class="form-control p_input_disabled" id="email" name="email" disabled
                value="{{ $data->email }}">
        </div>
    </div>
    <div class="form-group row">
        <label for="phone_number" class="col-sm-3 col-form-label">Nomor HP</label>
        <div class="col-sm-9">
            <input type="text" class="form-control p_input_disabled" id="phone_number" name="phone_number" disabled
                value="{{ $data->phone_number }}">
        </div>
    </div>
    <div class="form-group row">
        <label for="position" class="col-sm-3 col-form-label">Jabatan</label>
        <div class="col-sm-9">
            <input type="text" class="form-control p_input_disabled" id="position" name="position"
                value="{{ $data->position }}" disabled>
        </div>
    </div>
    <div class="form-group row">
        <label for="skill" class="col-sm-3 col-form-label">Skill</label>
        <div class="col-sm-9">
            <input type="text" class="form-control p_input_disabled" id="skill" name="skill"
                placeholder="Pisahkan setiap skill dengan koma" value="{{ $data->skill }}" disabled>
        </div>
    </div>
    <div class="form-group row">
        <label for="contract_start" class="col-sm-3 col-form-label">Kontrak Mulai</label>
        <div class="col-sm-9">
            <input type="datetime-local" class="form-control p_input_disabled" id="contract_start" name="contract_start"
                value="{{ $data->contract_start }}" disabled>
        </div>
    </div>
    <div class="form-group row">
        <label for="contract_end" class="col-sm-3 col-form-label">Kontrak Selesai</label>
        <div class="col-sm-9">
            <input type="datetime-local" class="form-control p_input_disabled" id="contract_end" name="contract_end"
                value="{{ $data->contract_end }}" disabled>
        </div>
    </div>
    <div class="form-group row">
        <label for="contract_end" class="col-sm-3 col-form-label">CV</label>
        <div class="col-sm-9">
            @if (is_null($cv))
                <input type="text" name="" class="form-control p_input_disabled" disabled
                    value="Pengurus belum mengupload">
            @else
                <a href="{{ asset('/storage') }}/{{ $cv->cv_url }}" target="_BLANK" class="btn btn-primary">Raw CV</a>
                <textarea cols="30" rows="20" class="form-control p_input_disabled" disabled>
                Diupload pada : {{ date('H:i:s d M, Y', strtotime($cv->created_at)) }}
                Diperbarui pada : {{ date('H:i:s d M, Y', strtotime($cv->updated_at)) }}
            </textarea>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="profile_img" class="col-sm-3 col-form-label">Foto Profil</label>
        <div class="col-sm-9">
            <img src="{{ asset('/storage') }}/{{ $data->profile_img }}" width="150" height="150">
        </div>
    </div>
    <div class="form-group row">
        <label for="qrcode" class="col-sm-3 col-form-label">QR Code</label>
        <div class="col-sm-9">
            {{ QrCode::size(150)->backgroundColor(255, 255, 255)->style('round')->eyeColor(0, 143, 95, 232, 0, 0, 0)->margin(2)->generate(route('Qr_Scan', $data->acc_code)) }}
        </div>
    </div>
    <div class="form-group row">
        <label for="status" class="col-sm-3 col-form-label">Status</label>
        <div class="col-sm-9">
            <input type="text" class="form-control p_input_disabled" disabled value="{{ $data->status }}">
        </div>
    </div>
    <div class="form-group row">
        <label for="address" class="col-sm-3 col-form-label">Alamat</label>
        <div class="col-sm-9">
            <textarea name="address" id="address" cols="30" rows="10" class="form-control p_input_disabled"
                disabled>{{ $data->address }}</textarea>
        </div>
    </div>
    <div class="form-group row">
        <label for="address" class="col-sm-3 col-form-label">Tentang Akun</label>
        <div class="col-sm-9">
            <textarea cols="30" rows="20" class="form-control p_input_disabled" disabled>
                Diupload pada : {{ date('H:i:s d M, Y', strtotime($data->created_at)) }}
                Diperbarui pada : {{ date('H:i:s d M, Y', strtotime($data->updated_at)) }}
            </textarea>
        </div>
    </div>
    <button class="btn btn-info" type="button" data-bs-dismiss="modal">Tutup</button>
</form>
