<?php

namespace Tests\Unit;

use App\Models\Activity;
use App\Models\Announcement;
use App\Models\Article;
use App\Models\DkmProfile;
use App\Models\Finance;
use App\Models\Mosque;
use App\Models\Schedule;
use Tests\TestCase;

class ModelTablePrefixTest extends TestCase
{
    public function test_app_models_use_the_mjd_table_prefix(): void
    {
        $this->assertSame('mjd_dkm_profiles', (new DkmProfile)->getTable());
        $this->assertSame('mjd_mosques', (new Mosque)->getTable());
        $this->assertSame('mjd_schedules', (new Schedule)->getTable());
        $this->assertSame('mjd_activities', (new Activity)->getTable());
        $this->assertSame('mjd_articles', (new Article)->getTable());
        $this->assertSame('mjd_announcements', (new Announcement)->getTable());
        $this->assertSame('mjd_finances', (new Finance)->getTable());
    }
}
