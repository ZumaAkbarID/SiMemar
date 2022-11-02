{{-- Error Validation --}}
@if ($errors->all())
    <div class="alert alert-danger" id="alert-session-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

{{-- Notif Success --}}
@if (session()->has('success'))
    <div class="alert alert-success" id="alert-session-success">
        {{ session('success') }}
    </div>
@endif

{{-- Notif Error --}}
@if (session()->has('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

{{-- Alert --}}
<div class="alert alert-success d-none" id="alert-success"></div>
<div class="alert alert-danger d-none" id="alert-error"></div>
<div class="alert alert-info d-none" id="alert-info"></div>
<div class="alert alert-warning d-none" id="alert-warning"></div>
