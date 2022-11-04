# SiMemar

SiMemar adalah web aplikasi yang memiliki fungsi sebagai sistem pengelolaan member dengan fitur minimal.
Request by Dandy Bagus Prasetyo di forum Facebook.

## Fitur Utama

-   Register (approval oleh pengurus)
-   Login
-   Role pengurus & member
-   Profil pengurus & member
-   Cetak kartu anggota member berdasarkan data member dan ada QR code yang ketika discan akan mengarah ke profil summary member atau pengurus tersebut.

## Teknologi

SiMember menggunakan beberapa teknologi :

-   [Laravel 9](https://laravel.com/) - PHP Framework
-   [Bootstrap 4](https://getbootstrap.com/) - CSS Framework
-   [Material Icons](https://materialdesignicons.com/) - Icons
-   [jQuery](https://jquery.com/) - JS Framework
-   [MySQL](https://www.mysql.com/) - Database

dan tentu saja SiMemar akan menjadi project open source pada [repository publik](https://github.com/ZumaAkbarID/SiMemar)
di GitHub.

## Instalasi

SiMemar membutuhkan [PHP](https://www.php.net/) v8+ untuk menjalankan.

Clone atau download project SiMemar dari github.

```git
git clone https://github.com/ZumaAkbarID/SiMemar.git
```

Copy environment file.

```bash
cp .env.example .env
```

Sesuaikan pengaturan & koneksi database Anda.
Migrate database.

```bash
php artisan migrate --seed
```

Aplikasi SiMemar siap dijalankan

```bash
php artisan serve
```

Buka alamat local di browser.

```bash
http://127.0.0.1:8000
```

## Account

CEO Role

```bash
- Default -
Email : admin@rahmatwahyumaakbar.com
Nomor HP : 081234567890
Password : password
```

Pengurus Role

```bash
- Default -
Tidak ada, akun pengurus role hanya bisa dibuat oleh CEO role, atau Member yang rolenya dirubah oleh CEO
```

Member Role

```bash
- Default -
Tidak ada, akun member role hanya bisa melakukan pendaftaran melalui form Daftar
```

## Lisensi

MIT
