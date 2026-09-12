<?php

namespace Database\Seeders;

use App\Models\Mosque;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Database\Seeder;

class MosqueSeeder extends Seeder
{
    public function run(): void
    {
        $dkmId = User::where('email', 'budi.santoso@simanjada.test')->firstOrFail()->id;

        $lorem = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum vestibulum enim id sem vulputate, non mattis leo molestie. Suspendisse luctus, enim sed maximus blandit, orci lacus accumsan diam, blandit dignissim risus purus at elit. Aenean a posuere eros.';
        $sedUt = 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.';

        $mosque = Mosque::create([
            'user_id' => $dkmId,
            'name' => 'Masjid Al-Ikhlas',
            'founding_year' => '1994',
            'address' => 'Jl.Raya Kenari III',
            'type' => 'Masjid JAMI',
            'land_status' => 'Wakaf',
            'description' => $lorem,
            'phone_number' => '098997886',
        ]);

        $schedules = [
            ['mosque_id' => $mosque->id, 'name' => 'Kajian Subuh & Tafsir Al-Qur\'an', 'description' => $lorem, 'place' => 'Ruang Utama Masjid', 'date' => '2026-09-13', 'time' => '05:15'],
            ['mosque_id' => $mosque->id, 'name' => 'Sholat Jumat Berjamaah', 'description' => $sedUt, 'place' => 'Pelataran Masjid', 'date' => '2026-09-18', 'time' => '12:00'],
            ['mosque_id' => $mosque->id, 'name' => 'Tadarus Al-Qur\'an', 'description' => $lorem, 'place' => 'Ruang Utama Masjid', 'date' => '2026-09-20', 'time' => '19:30'],
            ['mosque_id' => $mosque->id, 'name' => 'Kajian Fiqih Muslimah', 'description' => $sedUt, 'place' => 'Aula Masjid', 'date' => '2026-09-24', 'time' => '09:00'],
            ['mosque_id' => $mosque->id, 'name' => 'Santunan Anak Yatim', 'description' => $lorem, 'place' => 'Aula Masjid', 'date' => '2026-10-01', 'time' => '09:00'],
            ['mosque_id' => $mosque->id, 'name' => 'Peringatan Maulid Nabi', 'description' => $sedUt, 'place' => 'Pelataran Masjid', 'date' => '2026-10-15', 'time' => '19:00'],
        ];

        foreach ($schedules as $schedule) {
            Schedule::create($schedule);
        }
    }
}
