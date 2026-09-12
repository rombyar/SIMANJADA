<?php

namespace Tests\Feature;

use App\Enums\LandStatus;
use App\Enums\MosqueType;
use App\Enums\UserRole;
use App\Filament\Dkm\Pages\MosqueSettings;
use App\Models\Mosque;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class DkmMosqueSettingsTabsTest extends TestCase
{
    use RefreshDatabase;

    public function test_saving_address_tab_does_not_change_general_info_tab(): void
    {
        $user = User::factory()->create(['role' => UserRole::Dkm]);

        $mosque = Mosque::create([
            'user_id' => $user->id,
            'name' => 'Masjid Al-Ikhlas',
            'founding_year' => 1994,
            'address' => 'Jl. Lama',
            'type' => MosqueType::Jami,
            'land_status' => LandStatus::Wakaf,
            'description' => 'Deskripsi awal',
            'phone_number' => '0800000000',
        ]);

        $this->actingAs($user);

        Livewire::test(MosqueSettings::class)
            ->set('dataAddress.address', 'Jl. Baru No. 99')
            ->call('saveAddress');

        $mosque->refresh();

        $this->assertSame('Jl. Baru No. 99', $mosque->address);
        $this->assertSame('Masjid Al-Ikhlas', $mosque->name);
        $this->assertSame('Deskripsi awal', $mosque->description);
    }
}
