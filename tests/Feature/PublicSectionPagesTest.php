<?php

namespace Tests\Feature;

use App\Models\Announcement;
use App\Models\Mosque;
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
}
