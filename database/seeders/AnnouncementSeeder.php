<?php

namespace Database\Seeders;

use App\Models\Announcement;
use App\Models\Mosque;
use Illuminate\Database\Seeder;

class AnnouncementSeeder extends Seeder
{
    public function run(): void
    {
        $alIkhlas = Mosque::where('name', 'Masjid Al-Ikhlas')->firstOrFail()->id;

        $announcements = [
            ['mosque_id' => $alIkhlas, 'title' => 'Jadwal Sholat Idul Adha 1447 H', 'content' => 'Sholat Idul Adha akan dilaksanakan di pelataran masjid pukul 06.30 WIB, dilanjutkan dengan penyembelihan hewan kurban.', 'date' => '2026-09-14', 'is_pinned' => true],
            ['mosque_id' => $alIkhlas, 'title' => 'Perbaikan Sound System Masjid', 'content' => 'Selama perbaikan sound system pada tanggal 16-17 September, sholat berjamaah tetap dilaksanakan seperti biasa.', 'date' => '2026-09-15', 'is_pinned' => false],
            ['mosque_id' => $alIkhlas, 'title' => 'Pembukaan Pendaftaran Kurban', 'content' => 'Pendaftaran hewan kurban dibuka mulai hari ini hingga H-3 Idul Adha. Silakan hubungi pengurus DKM.', 'date' => '2026-09-10', 'is_pinned' => false],
        ];

        foreach ($announcements as $announcement) {
            Announcement::create($announcement);
        }
    }
}
