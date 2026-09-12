# Majada

[![PHP](https://img.shields.io/badge/PHP-8.3%2B-777BB4?logo=php&logoColor=white)](https://php.net)
[![Laravel](https://img.shields.io/badge/Laravel-12-FF2D20?logo=laravel&logoColor=white)](https://laravel.com)
[![Filament](https://img.shields.io/badge/Filament-3.x-FDAE4B)](https://filamentphp.com)
[![License](https://img.shields.io/badge/license-custom-blue)](#hak-cipta-dan-lisensi)

**Sistem Informasi Jadwal dan Daftar Masjid (SIMANJADA)**

Majada adalah nama produk untuk generasi kedua aplikasi ini, dibangun ulang
di atas Laravel 12 setelah sebelumnya berbasis CodeIgniter 2.2.6. Saat ini
Majada berfokus pada profil, jadwal, dan kegiatan satu masjid.

## Daftar Isi

- [Tentang](#tentang)
- [Requirement](#requirement)
- [Instalasi](#instalasi)
- [Teknologi](#teknologi)
- [Donasi](#donasi)
- [Hak Cipta dan Lisensi](#hak-cipta-dan-lisensi)

## Tentang

Majada adalah sistem manajemen profil, jadwal, dan kegiatan masjid dengan
tiga peran pengguna:

| Peran | Akses |
|---|---|
| **Super Admin** | Mengelola profil masjid (nama, alamat, tahun berdiri, dll.) dan mengelola artikel/blog. |
| **DKM** | Pengurus masjid, mengelola profil masjidnya, jadwal salat, kegiatan, keuangan, dan pengumuman. |
| **Publik** | Melihat profil masjid, jadwal salat, kegiatan, pengumuman, ringkasan keuangan, dan artikel secara terbuka (read-only), tanpa perlu login. |

## Requirement

| Kebutuhan | Versi |
|---|---|
| PHP | ^8.3 |
| Composer | Terbaru |
| Node.js dan npm | Terbaru (LTS) |
| MySQL | 5.7+ / 8.0+ |

## Instalasi

1. Clone repo ini, lalu install dependency:

   ```bash
   composer install
   npm install
   ```

2. Salin `.env.example` menjadi `.env`, lalu atur variabel `DB_*` mengarah ke
   database MySQL yang sudah dibuat.

3. Migrasikan dan seed database:

   ```bash
   php artisan migrate:fresh --seed
   ```

4. Jalankan aplikasi:

   ```bash
   php artisan serve
   ```

5. Aplikasi memiliki dua panel login berbasis Filament:

   | Panel | URL | Untuk |
   |---|---|---|
   | Super Admin | `/admin` | Pengelola pusat |
   | DKM | `/dkm` | Pengurus masjid |

## Teknologi

- Laravel 12
- Blade untuk halaman publik
- Filament untuk panel Super Admin dan DKM
- Laravel Breeze untuk autentikasi
- Alpine.js di luar Filament (Filament sudah membawa Alpine.js sendiri)
- Lucide Icons untuk ikon halaman publik

## Donasi

Dukung pengembangan Majada melalui [Trakteer](https://trakteer.id/rombyar/tip).

## Hak Cipta dan Lisensi

Majada bebas digunakan dan di-hosting sendiri (self-host), termasuk untuk
keperluan komersial pihak sendiri. Namun, menjual ulang kode dari repo ini
secara mentah tanpa perubahan tidak diperbolehkan.

Jika ingin dijual ulang, harus ada nilai tambah yang nyata di atas aplikasi
dasar ini, misalnya fitur baru, kustomisasi, integrasi, atau layanan
dukungan, bukan sekadar mengganti nama dan branding.
