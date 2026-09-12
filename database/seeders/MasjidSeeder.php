<?php

namespace Database\Seeders;

use App\Models\Jadwal;
use App\Models\Masjid;
use App\Models\User;
use Illuminate\Database\Seeder;

class MasjidSeeder extends Seeder
{
    public function run(): void
    {
        $dkmId = User::where('email', 'budi.santoso@simanjada.test')->firstOrFail()->id;

        $lorem = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum vestibulum enim id sem vulputate, non mattis leo molestie. Suspendisse luctus, enim sed maximus blandit, orci lacus accumsan diam, blandit dignissim risus purus at elit. Aenean a posuere eros.';
        $sedUt = 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.';

        $masjid = Masjid::create([
            'user_id' => $dkmId,
            'nama' => 'Masjid Al-Ikhlas',
            'tahun_berdiri' => '1994',
            'alamat' => 'Jl.Raya Kenari III',
            'jenis' => 'Masjid JAMI',
            'status_tanah' => 'Wakaf',
            'deskripsi' => $lorem,
            'nomor_telepon' => '098997886',
        ]);

        $jadwals = [
            ['masjid_id' => $masjid->id, 'nama' => 'Kajian Subuh & Tafsir Al-Qur\'an', 'deskripsi' => $lorem, 'tempat' => 'Ruang Utama Masjid', 'tanggal' => '2026-09-13', 'waktu' => '05:15'],
            ['masjid_id' => $masjid->id, 'nama' => 'Sholat Jumat Berjamaah', 'deskripsi' => $sedUt, 'tempat' => 'Pelataran Masjid', 'tanggal' => '2026-09-18', 'waktu' => '12:00'],
            ['masjid_id' => $masjid->id, 'nama' => 'Tadarus Al-Qur\'an', 'deskripsi' => $lorem, 'tempat' => 'Ruang Utama Masjid', 'tanggal' => '2026-09-20', 'waktu' => '19:30'],
            ['masjid_id' => $masjid->id, 'nama' => 'Kajian Fiqih Muslimah', 'deskripsi' => $sedUt, 'tempat' => 'Aula Masjid', 'tanggal' => '2026-09-24', 'waktu' => '09:00'],
            ['masjid_id' => $masjid->id, 'nama' => 'Santunan Anak Yatim', 'deskripsi' => $lorem, 'tempat' => 'Aula Masjid', 'tanggal' => '2026-10-01', 'waktu' => '09:00'],
            ['masjid_id' => $masjid->id, 'nama' => 'Peringatan Maulid Nabi', 'deskripsi' => $sedUt, 'tempat' => 'Pelataran Masjid', 'tanggal' => '2026-10-15', 'waktu' => '19:00'],
        ];

        foreach ($jadwals as $jadwal) {
            Jadwal::create($jadwal);
        }
    }
}
