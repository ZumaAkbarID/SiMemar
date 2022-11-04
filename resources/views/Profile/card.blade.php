<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/storage') }}/default/idCard.css">
    <title>{{ $title }}</title>
    <link rel="shortcut icon" href="{{ asset('/storage') }}/{{ $SiMemarConfig->favicon }}" type="image/x-icon">

</head>

<body>
    <button class="btn" onclick="PrintElem('#card')">Print</button>
    <a class="btn-back" href="{{ url('/') }}">Kembali ke halaman utama</a>
    <div class="container" id="card">
        <div class="padding">
            <div class="font">
                <div class="top"
                    style="@if (!is_null($SiMemarConfig->card_front_img)) background-image: url({{ asset('/storage') }}/{{ $SiMemarConfig->card_front_img }}); @else background-color: #8338ec; @endif">
                    <img src="{{ asset('/storage') }}/{{ Auth::user()->profile_img }}">
                </div>
                <div class="bottom">
                    <p>{{ Auth::user()->name }}</p>
                    <p class="desi">{{ Auth::user()->role }}</p>
                    <div class="barcode">
                        {{ QrCode::size(65)->backgroundColor(255, 255, 255)->style('round')->eyeColor(0, 143, 95, 232, 0, 0, 0)->margin(2)->generate(route('Qr_Scan', Auth::user()->acc_code)) }}
                    </div>
                    <br>
                    <p class="no">{{ Auth::user()->phone_number }}</p>
                    <p class="no">{{ Auth::user()->address }}</p>
                </div>
            </div>
        </div>
        <div class="back"
            style="@if (!is_null($SiMemarConfig->card_back_img)) background-image: url({{ asset('/storage') }}/{{ $SiMemarConfig->card_back_img }}); @else background-color: #8338ec; @endif">
            <h1 class="Details">Informasi</h1>
            {{-- <hr class="hr"> --}}
            <div class="details-info"
                style="@if (!is_null($SiMemarConfig->card_back_img)) color: black; @else color: white; @endif">
                <p><b>Email : </b></p>
                <p>{{ Auth::user()->email }}</p>
                <p><b>Nomor HP: </b></p>
                <p>{{ Auth::user()->phone_number }}</p>
                <p><b>Alamat :</b></p>
                <p>{{ Auth::user()->address }}</p>
            </div>
            <div class="logo">
                {{ QrCode::size(60)->backgroundColor(255, 255, 255)->style('round')->eyeColor(0, 143, 95, 232, 0, 0, 0)->margin(2)->generate(route('Qr_Scan', Auth::user()->acc_code)) }}
                <span style="color:white;">{{ $SiMemarConfig->app_name }}</span>
            </div>
            {{-- <hr> --}}
        </div>
    </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script>
        function PrintElem(elem) {
            Popup($('<div/>').append($(elem).clone()).html());
        }

        function Popup(data) {
            var mywindow = window.open('', 'Print Kartu', 'height=800,width=1200');
            mywindow.document.write('<html><head><title>{{ $title }}</title>');
            mywindow.document.write(
                "<link rel='stylesheet' href='{{ asset('/storage') }}/default/idCard.css' type='text/css' media='all' />"
            );
            mywindow.document.write('</head><body>');
            mywindow.document.write(data);
            mywindow.document.write('</body></html>');

            $(mywindow).ready(function() {
                setTimeout(() => {
                    mywindow.print();
                }, 1000);
            })
            //  mywindow.close();

            return true;
        }
    </script>
</body>

</html>
