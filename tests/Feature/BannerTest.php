<?php

namespace Tests\Feature;

use App\Models\Banner;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BannerTest extends TestCase
{
    use RefreshDatabase;

    public function test_banners_can_be_created(): void
    {
        $banner = Banner::create([
            'title' => 'Test Banner',
            'published' => true,
        ]);

        $this->assertDatabaseHas('banners', [
            'id' => $banner->id,
            'published' => true,
        ]);

        $this->assertDatabaseHas('banner_translations', [
            'banner_id' => $banner->id,
            'title' => 'Test Banner',
        ]);
    }

    public function test_hero_section_renders_banners(): void
    {
        $banner = Banner::create([
            'title' => 'Hero Banner Title',
            'published' => true,
        ]);

        $view = $this->view('components.sections.hero', [
            'banners' => [$banner],
            'settings' => ['autoplay' => true]
        ]);

        $view->assertSee('Hero Banner Title');
        $view->assertSee('splide');
    }

    public function test_hero_section_does_not_render_without_banners(): void
    {
        $view = $this->view('components.sections.hero', [
            'banners' => [],
            'settings' => []
        ]);

        $view->assertDontSee('splide');
    }

    public function test_hero_section_disables_slider_for_single_banner(): void
    {
        $banner = Banner::create([
            'title' => 'Single Banner',
            'published' => true,
        ]);

        $view = $this->view('components.sections.hero', [
            'banners' => [$banner],
            'settings' => ['autoplay' => true, 'arrows' => true, 'pagination' => true]
        ]);

        $view->assertSee('"type":"slide"');
        $view->assertSee('"autoplay":false');
        $view->assertSee('"arrows":false');
        $view->assertSee('"pagination":false');
        $view->assertSee('"drag":false');
    }
}
