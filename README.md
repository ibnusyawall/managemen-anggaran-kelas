<div align="center">
 
# Managemen Anggaran Kelas
![Author](https://img.shields.io/badge/Author-ibnusyawall-blue.svg?style=for-the-badge&logo=github)
<p>Aplikasi Managemen Anggaran Kelas dibuat menggunakan Laravel dan VueJS</p>
</div>

## About Aplication
Aplikasi Managemen Anggaran Kelas, bertujuan guna untuk memudahkan pengelolaan pemasukan kas dan pencatatan pengeluaran kas.

## Installation

Use the package manager (composer) for installing

```bash
> git clone https://github.com/ibnusyawall/managemen-anggaran-kelas.git
> cd managemen-anggaran-kelas
> composer update
> npm install
> copy .env.example .env
> php artisan key:generate
```

Buat database dengan nama <b>anggaran_kelas</b>, setelah database berhasil dibuat, setting informasi database pada file .env

* Jika file .env tidak ada, ubah file .env.example menjadi .env dan jalankan command <b>php artisan key:generate</b>. Dan setting informasi database pada file .env
  
## Setup

Lakukan perintah dibawah ini jika sudah setting database di .env

```bash
> php artisan install
```

## Run

```bash
> npm run dev
> php artisan serve
```

pergi ke halaman login dengan akses url: http://localhost:8000/login

## Demo Account
Username: admin<br/>
Password: Admin12345

## Screenshot

<p align="center">
  <img alt="halaman-login" src="https://raw.githubusercontent.com/ibnusyawall/managemen-anggaran-kelas/main/screenshots/mk-login.png"/><br/><br/>
  <img alt="halaman-dashboard" src="https://raw.githubusercontent.com/ibnusyawall/managemen-anggaran-kelas/main/screenshots/mk-dashboard.png"/><br/><br/>
  <img alt="halaman-buku" src="https://raw.githubusercontent.com/ibnusyawall/managemen-anggaran-kelas/main/screenshots/mk-uang-masuk.png"/><br/><br/>
  <img alt="halaman-jenis-buku" src="https://raw.githubusercontent.com/ibnusyawall/managemen-anggaran-kelas/main/screenshots/mk-uang-keluar.png"/><br/><br/>
</p>

## Contact Me
 
Informasi lebih lanjut bisa hubungi saya melalui:<br/>
<a href="https://wa.me/6282299265151"><img alt="WhatsApp" src="https://img.shields.io/badge/WhatsApp%20-25D366?style=for-the-badge&logo=whatsapp&logoColor=white"/></a>
