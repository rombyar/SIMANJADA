<?php

namespace Database\Seeders;

use App\Models\Finance;
use App\Models\Mosque;
use Illuminate\Database\Seeder;

class FinanceSeeder extends Seeder
{
    public function run(): void
    {
        $alIkhlas = Mosque::where('name', 'Masjid Al-Ikhlas')->firstOrFail()->id;

        $finances = [
            ['mosque_id' => $alIkhlas, 'date' => '2026-09-01', 'type' => 'masuk', 'amount' => 5250000, 'notes' => 'Infaq Jumat pekan pertama September'],
            ['mosque_id' => $alIkhlas, 'date' => '2026-09-05', 'type' => 'keluar', 'amount' => 1200000, 'notes' => 'Pembayaran listrik dan air'],
            ['mosque_id' => $alIkhlas, 'date' => '2026-09-08', 'type' => 'masuk', 'amount' => 3800000, 'notes' => 'Infaq Jumat pekan kedua September'],
            ['mosque_id' => $alIkhlas, 'date' => '2026-09-10', 'type' => 'keluar', 'amount' => 750000, 'notes' => 'Pembelian peralatan kebersihan masjid'],
            ['mosque_id' => $alIkhlas, 'date' => '2026-09-12', 'type' => 'keluar', 'amount' => 2000000, 'notes' => 'Honor ustadz pengisi kajian rutin'],
        ];

        foreach ($finances as $finance) {
            Finance::create($finance);
        }
    }
}
