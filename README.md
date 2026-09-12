# Majada

Aplikasi Sistem Informasi Jadwal dan Daftar Masjid (SIMANJADA). Majada adalah
nama produk untuk generasi kedua aplikasi ini, dibangun ulang di atas Laravel
12 setelah sebelumnya berbasis CodeIgniter 2.2.6.

## Tentang

Majada adalah sistem manajemen jadwal dan direktori masjid dengan tiga peran
pengguna:

- **Super Admin** - menyetujui/membanned akun masjid dan DKM, mengelola
  masjid beserta jadwal salat/kegiatannya.
- **DKM** (pengurus masjid) - mendaftarkan dan mengelola masjid miliknya.
- **Publik** - melihat daftar masjid dan jadwal secara terbuka (read-only).

## Requirement

- PHP ^8.3
- Composer
- Node.js dan npm
- MySQL

## Instalasi

1. Clone repo ini, lalu jalankan:
   ```
   composer install
   npm install
   ```
2. Salin `.env.example` menjadi `.env`, lalu atur variabel `DB_*` mengarah ke
   database MySQL yang sudah dibuat.
3. Migrasikan dan seed database:
   ```
   php artisan migrate:fresh --seed
   ```
4. Jalankan aplikasi:
   ```
   php artisan serve
   ```
5. Aplikasi memiliki dua panel login Filament:
   - `/admin` untuk Super Admin
   - `/dkm` untuk DKM

## Teknologi

- Laravel 12
- Blade (halaman publik)
- Filament (panel Super Admin dan DKM)
- Laravel Breeze (autentikasi)
- Alpine.js (di luar Filament, yang sudah membawa Alpine.js sendiri)
- Lucide Icons (ikon halaman publik)

## Donasi

<a href="https://semawur.com/baOBHdypp">Donate here</a>

## Hak Cipta dan Lisensi

Majada bebas digunakan dan di-hosting sendiri (self-host), termasuk untuk
keperluan komersial pihak sendiri. Namun, menjual ulang kode dari repo ini
secara mentah tanpa perubahan tidak diperbolehkan. Jika ingin dijual ulang,
harus ada nilai tambah yang nyata di atas aplikasi dasar ini, misalnya fitur
baru, kustomisasi, integrasi, atau layanan dukungan, bukan sekadar
mengganti nama dan branding.
