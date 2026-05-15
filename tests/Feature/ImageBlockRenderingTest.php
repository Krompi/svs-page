<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use A17\Twill\Models\Block;

class ImageBlockRenderingTest extends TestCase
{
    public function test_image_block_renders_with_correct_classes(): void
    {
        $block = new Block();
        $block->type = 'image';
        $block->content = [
            'width' => 'half',
            'alignment' => 'right'
        ];

        $view = view('site.blocks.image', ['block' => $block])->render();

        $this->assertStringContainsString('md:w-1/2', $view);
        $this->assertStringContainsString('md:float-right md:ml-8 my-4', $view);
        $this->assertStringContainsString('w-full', $view); // The img tag now has w-full
    }

    public function test_image_block_renders_full_width_by_default(): void
    {
        $block = new Block();
        $block->type = 'image';
        $block->content = [
            'width' => 'full'
        ];

        $view = view('site.blocks.image', ['block' => $block])->render();

        $this->assertStringContainsString('my-8', $view);
        $this->assertStringContainsString('w-full', $view);
        $this->assertStringContainsString('mx-auto max-w-2xl', $view);
        $this->assertStringNotContainsString('md:float-left', $view);
        $this->assertStringNotContainsString('md:float-right', $view);
    }

    public function test_image_block_renders_third_width_left_aligned(): void
    {
        $block = new Block();
        $block->type = 'image';
        $block->content = [
            'width' => 'third',
            'alignment' => 'left'
        ];

        $view = view('site.blocks.image', ['block' => $block])->render();

        $this->assertStringContainsString('md:w-1/3', $view);
        $this->assertStringContainsString('md:float-left md:mr-8 my-4', $view);
    }

    public function test_image_block_renders_lightbox_link_when_enabled(): void
    {
        $block = new Block();
        $block->type = 'image';
        $block->content = [
            'show_lightbox' => true,
            'width' => 'full'
        ];

        $view = view('site.blocks.image', ['block' => $block])->render();

        $this->assertStringContainsString('lightbox-item', $view);
        $this->assertStringContainsString('data-lightbox="image-', $view);
        $this->assertStringContainsString('href="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"', $view);
    }

    public function test_image_block_does_not_render_lightbox_link_when_disabled(): void
    {
        $block = new Block();
        $block->type = 'image';
        $block->content = [
            'show_lightbox' => false,
            'width' => 'full'
        ];

        $view = view('site.blocks.image', ['block' => $block])->render();

        $this->assertStringNotContainsString('lightbox-item', $view);
        $this->assertStringNotContainsString('data-lightbox', $view);
    }
}
