<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <!-- Primary Meta Tags -->
    <meta name="title" content="{{ $title }}">
    @if ($user)
        <meta name="description" content="CV oleh {{ $user->name }} di {{ $SiMemarConfig->app_name }}">
    @else
        <meta name="description" content="CV tidak ditemukan | {{ $SiMemarConfig->app_name }}">
    @endif

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ Request::fullUrl() }}">
    <meta property="og:title" content="{{ $title }}">
    @if ($user)
        <meta property="og:description" content="CV oleh {{ $user->name }} di {{ $SiMemarConfig->app_name }}">
        <meta property="og:image" content="{{ asset('/storage') }}/{{ $user->profile_img }}">
    @else
        <meta property="og:image" content="{{ $SiMemarConfig->meta_img }}">
        <meta property="og:description" content="CV tidak ditemukan | {{ $SiMemarConfig->app_name }}">
    @endif

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ Request::fullUrl() }}">
    <meta property="twitter:title" content="{{ $title }}">
    @if ($user)
        <meta property="twitter:description" content="CV oleh {{ $user->name }} di {{ $SiMemarConfig->app_name }}">
        <meta property="twitter:image" content="{{ asset('/storage') }}/{{ $user->profile_img }}">
    @else
        <meta property="twitter:image" content="{{ $SiMemarConfig->meta_img }}">
        <meta property="twitter:description" content="CV tidak ditemukan | {{ $SiMemarConfig->app_name }}">
    @endif

    <link rel="shortcut icon" href="{{ asset('/storage') }}/{{ $SiMemarConfig->favicon }}" type="image/x-icon">
    <style>
        .iframe-pdf {
            position: relative;
            min-width: 100%;
            min-height: 98vh;
        }
    </style>
</head>

<body>
    @if ($cv)
        <iframe src="{{ asset('/storage') }}/{{ $cv->cv_url }}" class="iframe-pdf" frameborder="0">Browser Anda
            tidak support fitur ini</iframe>
    @else
        CV tidak ditemukan <br>
        <a href="{{ url('/') }}">Kembali ke halaman utama</a>
    @endif
</body>

</html>
