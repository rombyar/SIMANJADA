<?php

namespace Tests\Feature;

use App\Models\Announcement;
use App\Models\Finance;
use App\Models\Mosque;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PublicSectionPagesTest extends TestCase
{
    use RefreshDatabase;

    public function test_schedule_index_page_returns_a_successful_response(): void
    {
        $response = $this->get(route('schedule.index'));

        $response->assertStatus(200);
    }

    public function test_activity_index_page_returns_a_successful_response(): void
    {
        $response = $this->get(route('activity.index'));

        $response->assertStatus(200);
    }

    public function test_announcement_index_page_returns_a_successful_response(): void
    {
        $response = $this->get(route('announcement.index'));

        $response->assertStatus(200);
    }

    public function test_finance_index_page_returns_a_successful_response(): void
    {
        $response = $this->get(route('finance.index'));

        $response->assertStatus(200);
    }

    public function test_navigation_links_to_all_public_section_pages(): void
    {
        $response = $this->get(route('home'));

        $response->assertOk();
        $response->assertSee(route('home'), false);
        $response->assertSee(route('schedule.index'), false);
        $response->assertSee(route('activity.index'), false);
        $response->assertSee(route('announcement.index'), false);
        $response->assertSee(route('finance.index'), false);
        $response->assertSee(route('blog.index'), false);
    }

    public function test_home_page_shows_only_the_latest_announcement(): void
    {
        $mosque = Mosque::create([
            'user_id' => User::factory()->create()->id,
            'name' => 'Masjid Test',
            'founding_year' => '2000',
            'address' => 'Jl. Test',
            'type' => 'Jami',
            'land_status' => 'Wakaf',
            'description' => 'Deskripsi masjid test.',
        ]);

        Announcement::create(['mosque_id' => $mosque->id, 'title' => 'Pengumuman Terbaru', 'content' => 'Isi.', 'date' => now(), 'is_pinned' => false]);
        Announcement::create(['mosque_id' => $mosque->id, 'title' => 'Pengumuman Lama', 'content' => 'Isi.', 'date' => now()->subDay(), 'is_pinned' => false]);

        $response = $this->get(route('home'));

        $response->assertOk();
        $response->assertSee('Pengumuman Terbaru');
        $response->assertDontSee('Pengumuman Lama');
    }

    public function test_schedule_index_shows_a_past_badge_only_for_past_schedules(): void
    {
        $mosque = $this->makeMosque();

        Schedule::create(['mosque_id' => $mosque->id, 'name' => 'Jadwal Lampau', 'description' => 'Isi.', 'place' => 'Aula', 'date' => now()->subDay(), 'time' => '08:00']);
        Schedule::create(['mosque_id' => $mosque->id, 'name' => 'Jadwal Mendatang', 'description' => 'Isi.', 'place' => 'Aula', 'date' => now()->addDay(), 'time' => '08:00']);

        $response = $this->get(route('schedule.index'));

        $response->assertOk();
        $response->assertSeeInOrder(['Jadwal Lampau', 'Sudah Lewat', 'Jadwal Mendatang']);
        $this->assertSame(1, substr_count($response->getContent(), 'Sudah Lewat'));
    }

    public function test_finance_index_can_be_filtered_by_type(): void
    {
        $mosque = $this->makeMosque();

        Finance::create(['mosque_id' => $mosque->id, 'date' => now(), 'type' => 'masuk', 'amount' => 100000, 'notes' => 'Infaq Jumat']);
        Finance::create(['mosque_id' => $mosque->id, 'date' => now(), 'type' => 'keluar', 'amount' => 40000, 'notes' => 'Beli Listrik']);

        $response = $this->get(route('finance.index', ['type' => 'keluar']));

        $response->assertOk();
        $response->assertSee('Beli Listrik');
        $response->assertDontSee('Infaq Jumat');
        $response->assertSee('Rp0');
    }

    public function test_finance_index_can_be_filtered_by_date_range(): void
    {
        $mosque = $this->makeMosque();

        Finance::create(['mosque_id' => $mosque->id, 'date' => '2026-01-05', 'type' => 'masuk', 'amount' => 50000, 'notes' => 'Dalam Rentang']);
        Finance::create(['mosque_id' => $mosque->id, 'date' => '2026-02-05', 'type' => 'masuk', 'amount' => 50000, 'notes' => 'Luar Rentang']);

        $response = $this->get(route('finance.index', ['from' => '2026-01-01', 'to' => '2026-01-31']));

        $response->assertOk();
        $response->assertSee('Dalam Rentang');
        $response->assertDontSee('Luar Rentang');
    }

    private function makeMosque(): Mosque
    {
        return Mosque::create([
            'user_id' => User::factory()->create()->id,
            'name' => 'Masjid Test',
            'founding_year' => '2000',
            'address' => 'Jl. Test',
            'type' => 'Jami',
            'land_status' => 'Wakaf',
            'description' => 'Deskripsi masjid test.',
        ]);
    }
}
