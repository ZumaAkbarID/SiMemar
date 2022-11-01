<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="shortcut icon" href="{{ $SiMemarConfig->favicon }}" type="image/x-icon">

    <title>{{ $title }}</title>

    @yield('SiMemar_css')
</head>

<body>
    @yield('SiMemar_content')

    @yield('SiMemar_js')
</body>

</html>
