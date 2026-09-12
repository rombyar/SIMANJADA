<?php

namespace Database\Seeders;

use App\Models\Activity;
use App\Models\Mosque;
use Illuminate\Database\Seeder;

class ActivitySeeder extends Seeder
{
    public function run(): void
    {
        $alIkhlas = Mosque::where('name', 'Masjid Al-Ikhlas')->firstOrFail()->id;

        $activities = [
            ['mosque_id' => $alIkhlas, 'title' => 'Renovasi Tempat Wudhu', 'description' => 'Perbaikan fasilitas wudhu jamaah putra dan putri, termasuk penambahan keran baru.', 'date' => '2026-08-10'],
            ['mosque_id' => $alIkhlas, 'title' => 'Donor Darah Bulanan', 'description' => 'Kerja sama dengan PMI Kota Bandung, terbuka untuk jamaah dan warga sekitar.', 'date' => '2026-08-17'],
            ['mosque_id' => $alIkhlas, 'title' => 'Pembagian Sembako', 'description' => '200 paket sembako dibagikan untuk warga kurang mampu di sekitar masjid.', 'date' => '2026-08-24'],
            ['mosque_id' => $alIkhlas, 'title' => 'Pengajian Rutin Malam Jumat', 'description' => 'Kajian mingguan bersama ustadz tamu, terbuka untuk umum.', 'date' => '2026-08-28'],
            ['mosque_id' => $alIkhlas, 'title' => 'Bakti Sosial Kebersihan Lingkungan', 'description' => 'Gotong royong membersihkan lingkungan sekitar masjid bersama warga.', 'date' => '2026-09-01'],
            ['mosque_id' => $alIkhlas, 'title' => 'Khitanan Massal', 'description' => 'Khitanan gratis untuk 30 anak dari keluarga kurang mampu.', 'date' => '2026-09-05'],
            ['mosque_id' => $alIkhlas, 'title' => 'Tabligh Akbar', 'description' => 'Ceramah akbar menyambut tahun baru Hijriyah, dihadiri ratusan jamaah.', 'date' => '2026-09-08'],
        ];

        foreach ($activities as $activity) {
            Activity::create($activity);
        }
    }
}
