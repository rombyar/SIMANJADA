<?php

namespace Database\Seeders;

use App\Models\Kegiatan;
use App\Models\Masjid;
use Illuminate\Database\Seeder;

class KegiatanSeeder extends Seeder
{
    public function run(): void
    {
        $alIkhlas = Masjid::where('nama', 'Masjid Al-Ikhlas')->firstOrFail()->id;

        $kegiatans = [
            ['masjid_id' => $alIkhlas, 'judul' => 'Renovasi Tempat Wudhu', 'deskripsi' => 'Perbaikan fasilitas wudhu jamaah putra dan putri, termasuk penambahan keran baru.', 'tanggal' => '2026-08-10'],
            ['masjid_id' => $alIkhlas, 'judul' => 'Donor Darah Bulanan', 'deskripsi' => 'Kerja sama dengan PMI Kota Bandung, terbuka untuk jamaah dan warga sekitar.', 'tanggal' => '2026-08-17'],
            ['masjid_id' => $alIkhlas, 'judul' => 'Pembagian Sembako', 'deskripsi' => '200 paket sembako dibagikan untuk warga kurang mampu di sekitar masjid.', 'tanggal' => '2026-08-24'],
            ['masjid_id' => $alIkhlas, 'judul' => 'Pengajian Rutin Malam Jumat', 'deskripsi' => 'Kajian mingguan bersama ustadz tamu, terbuka untuk umum.', 'tanggal' => '2026-08-28'],
            ['masjid_id' => $alIkhlas, 'judul' => 'Bakti Sosial Kebersihan Lingkungan', 'deskripsi' => 'Gotong royong membersihkan lingkungan sekitar masjid bersama warga.', 'tanggal' => '2026-09-01'],
            ['masjid_id' => $alIkhlas, 'judul' => 'Khitanan Massal', 'deskripsi' => 'Khitanan gratis untuk 30 anak dari keluarga kurang mampu.', 'tanggal' => '2026-09-05'],
            ['masjid_id' => $alIkhlas, 'judul' => 'Tabligh Akbar', 'deskripsi' => 'Ceramah akbar menyambut tahun baru Hijriyah, dihadiri ratusan jamaah.', 'tanggal' => '2026-09-08'],
        ];

        foreach ($kegiatans as $kegiatan) {
            Kegiatan::create($kegiatan);
        }
    }
}
