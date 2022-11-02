<form class="forms-sample" action="{{ route('CEO_pengurus_edit_submit') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="uid" value="{{ $data->id }}">
    <input type="hidden" name="acc_code" value="{{ $data->acc_code }}">
    <div class="form-group row">
        <label for="name" class="col-sm-3 col-form-label">Name</label>
        <div class="col-sm-9">
            <input type="text" class="form-control p_input" name="name" id="name" required
                value="{{ $data->name }}">
        </div>
    </div>
    <div class="form-group row">
        <label for="email" class="col-sm-3 col-form-label">Email</label>
        <div class="col-sm-9">
            <input type="email" class="form-control p_input" id="email" name="email" required
                value="{{ $data->email }}">
        </div>
    </div>
    <div class="form-group row">
        <label for="phone_number" class="col-sm-3 col-form-label">Nomor HP</label>
        <div class="col-sm-9">
            <input type="text" class="form-control p_input" id="phone_number" name="phone_number" required
                value="{{ $data->phone_number }}">
        </div>
    </div>
    <div class="form-group row">
        <label for="position" class="col-sm-3 col-form-label">Position</label>
        <div class="col-sm-9">
            <input type="text" class="form-control p_input" id="position" name="position"
                value="{{ $data->position }}">
        </div>
    </div>
    <div class="form-group row">
        <label for="skill" class="col-sm-3 col-form-label">Skill</label>
        <div class="col-sm-9">
            <input type="text" class="form-control p_input" id="skill" name="skill"
                placeholder="Pisahkan setiap skill dengan koma" value="{{ $data->skill }}">
        </div>
    </div>
    <div class="form-group row">
        <label for="contract_start" class="col-sm-3 col-form-label">Kontrak Mulai</label>
        <div class="col-sm-9">
            <input type="datetime-local" class="form-control p_input" id="contract_start" name="contract_start"
                value="{{ $data->contract_start }}">
        </div>
    </div>
    <div class="form-group row">
        <label for="contract_end" class="col-sm-3 col-form-label">Kontrak Selesai</label>
        <div class="col-sm-9">
            <input type="datetime-local" class="form-control p_input" id="contract_end" name="contract_end"
                value="{{ $data->contract_end }}">
        </div>
    </div>
    <div class="form-group row">
        <label for="profile_img" class="col-sm-3 col-form-label">Foto Profil</label>
        <div class="col-sm-9">
            <input type="file" name="profile_img" id="profile_img" class="form-control p_input">
        </div>
    </div>
    <div class="form-group row">
        <label for="status" class="col-sm-3 col-form-label">Status</label>
        <div class="col-sm-9">
            <select name="status" id="status" class="form-control p_input text-white" required>
                <option value="Aktif" @if ($data->status == 'Aktif') selected @endif>Aktif</option>
                <option value="Non Aktif" @if ($data->status == 'Non Aktif') selected @endif>Non Aktif</option>
                <option value="Pending" @if ($data->status == 'Pending') selected @endif>Pending</option>
                <option value="Ditolak" @if ($data->status == 'Ditolak') selected @endif>Ditolak</option>
            </select>
        </div>
    </div>
    <div class="form-group row">
        <label for="role" class="col-sm-3 col-form-label">Role</label>
        <div class="col-sm-9">
            <select name="role" id="role" class="form-control p_input text-white" required>
                <option value="Pengurus" @if ($data->role == 'Pengurus') selected @endif>Pengurus</option>
                <option value="Member" @if ($data->role == 'Member') selected @endif>Member</option>
            </select>
        </div>
    </div>
    <div class="form-group row">
        <label for="address" class="col-sm-3 col-form-label">Alamat</label>
        <div class="col-sm-9">
            <textarea name="address" id="address" cols="30" rows="10" class="form-control p_input">{{ $data->address }}</textarea>
        </div>
    </div>
    <div class="form-group row">
        <label for="password" class="col-sm-3 col-form-label">Password Baru</label>
        <div class="col-sm-9">
            <input name="password" type="password" id="password" class="form-control p_input"
                placeholder="jika ingin merubah password">
        </div>
    </div>
    <button class="btn btn-success" type="submit">Simpan</button>
    <button class="btn btn-info" type="button" data-bs-dismiss="modal">Batal</button>
</form>
