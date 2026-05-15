<?php

namespace Tests\Feature;

use App\Models\Banner;
use App\Models\Page;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PageBannerTest extends TestCase
{
    use RefreshDatabase;

    public function test_page_can_have_linked_banners(): void
    {
        $page = Page::create(['title' => 'Test Page', 'published' => true]);
        $banner = Banner::create(['title' => 'Test Banner', 'published' => true]);

        $page->banners()->attach($banner->id, ['position' => 1]);

        $this->assertCount(1, $page->banners);
        $this->assertEquals('Test Banner', $page->banners->first()->title);
    }

    public function test_banner_text_box_can_be_hidden(): void
    {
        $banner = Banner::create([
            'title' => 'Hidden Text Banner',
            'published' => true,
            'show_text_box' => false,
        ]);

        $view = $this->view('components.sections.hero', [
            'banners' => [$banner],
        ]);

        $view->assertDontSee('Hidden Text Banner');
        $view->assertDontSee('bg-white p-8');
    }
}
