<?php

namespace Database\Seeders;

use App\Enums\UserRole;
use App\Models\DkmProfile;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Ahmad Fauzi',
            'email' => 'admin@simanjada.test',
            'password' => 'password',
            'role' => UserRole::SuperAdmin,
            'email_verified_at' => now(),
        ]);

        $dkmAccounts = [
            ['name' => 'Budi Santoso', 'email' => 'budi.santoso@simanjada.test', 'nama' => 'DKM Masjid Al-Ikhlas', 'telepon' => '081234567801', 'alamat' => 'Jl. Merdeka No. 12, Bandung'],
        ];

        foreach ($dkmAccounts as $dkm) {
            $user = User::create([
                'name' => $dkm['name'],
                'email' => $dkm['email'],
                'password' => 'password',
                'role' => UserRole::Dkm,
                'email_verified_at' => now(),
            ]);

            DkmProfile::create([
                'user_id' => $user->id,
                'nama' => $dkm['nama'],
                'nomor_telepon' => $dkm['telepon'],
                'alamat' => $dkm['alamat'],
            ]);
        }
    }
}
