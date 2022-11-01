<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    {{-- https://codepen.io/ladyroxx/pen/dLpeGL?editors=1100 --}}

    {{-- Style --}}
    <link rel="stylesheet" href="{{ asset('/storage') }}/Profile/css/SiMemar.css">
</head>

<body>
    <div class="card-container">
        <span class="pro-active">Status</span>
        <img class="round" src="https://randomuser.me/api/portraits/women/79.jpg" alt="user" />
        <h3>Lexi Armstrong</h3>
        <h6>New York</h6>
        <p>
            User interface designer and <br />
            front-end developer
        </p>
        {{-- <div class="buttons">
            <button class="primary">
                Message
            </button>
            <button class="primary ghost">
                Following
            </button>
        </div> --}}
        <div class="about">
            <h6>About</h6>
            <table>
                <tr>
                    <td class="tb-short">
                        Nama
                    </td>
                    <td class="tb-long">
                        : Rahmat Wahyuma Akbar
                    </td>
                </tr>
                <tr>
                    <td class="tb-short">
                        Jabatan
                    </td>
                    <td class="tb-long">
                        : Backend Web Developer
                    </td>
                </tr>
                <tr>
                    <td class="tb-short">
                        Email
                    </td>
                    <td class="tb-long">
                        : rahmatwahyumaakbar@gmail.com
                    </td>
                </tr>
                <tr>
                    <td class="tb-short">
                        Nomor HP
                    </td>
                    <td class="tb-long">
                        : 081225389903
                    </td>
                </tr>
                <tr>
                    <td class="tb-short">
                        Alamat
                    </td>
                    <td class="tb-long">
                        : Jl. PLTU Tanjung Jati B, Ds. Kaliaman Rt 01 Rw 02, Kec. Kembang, Kab. Jepara, Prov. Jawa
                        Tengah
                    </td>
                </tr>
                <tr>
                    <td class="tb-short">
                        Kontrak Dimulai
                    </td>
                    <td class="tb-long">
                        : 20 Des 2022
                    </td>
                </tr>
                <tr>
                    <td class="tb-short">
                        Kontrak Berakhir
                    </td>
                    <td class="tb-long">
                        : 20 Des 2026
                    </td>
                </tr>
            </table>
        </div>
        <div class="skills">
            <h6>Skills</h6>
            <ul>
                <li>UI / UX</li>
                <li>Frontend Development</li>
                <li>HTML</li>
                <li>CSS</li>
                <li>JavaScript</li>
                <li>React</li>
                <li>React</li>
                <li>Node</li>
            </ul>
        </div>
    </div>

</body>

</html>
