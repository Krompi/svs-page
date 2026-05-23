<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use A17\Twill\Models\Block;
use App\Models\Event;
use App\Models\Article;
use App\Models\Topic;
use Illuminate\Support\Facades\Schema;

class InhaltsFeedBlockTest extends TestCase
{
    use RefreshDatabase;

    public function test_inhalts_feed_renders_events(): void
    {
        // Setup some data
        $event = Event::create([
            'title' => 'Test Event',
            'published' => true,
            'start_date' => now()->addDays(1),
            'teaser' => 'Event Teaser',
        ]);

        $block = new Block();
        $block->type = 'inhalts_feed';
        $block->content = [
            'feed_type' => 'events',
            'count' => 3
        ];

        $view = view('site.blocks.inhalts_feed', ['block' => $block])->render();

        $this->assertStringContainsString('Veranstaltungen', $view);
        $this->assertStringContainsString('Test Event', $view);
        $this->assertStringContainsString('Alle Veranstaltungen ansehen', $view);
    }

    public function test_inhalts_feed_renders_articles(): void
    {
        // Setup some data
        $article = Article::create([
            'title' => 'Test Article',
            'published' => true,
            'publish_start_date' => now(),
            'teaser' => 'Article Teaser',
        ]);

        $block = new Block();
        $block->type = 'inhalts_feed';
        $block->content = [
            'feed_type' => 'articles',
            'count' => 3
        ];

        $view = view('site.blocks.inhalts_feed', ['block' => $block])->render();

        $this->assertStringContainsString('Meldungen', $view);
        $this->assertStringContainsString('Test Article', $view);
        $this->assertStringContainsString('Alle Meldungen ansehen', $view);
    }

    public function test_inhalts_feed_filters_by_topic(): void
    {
        $topic = Topic::create(['title' => 'Special Topic', 'published' => true]);
        $otherTopic = Topic::create(['title' => 'Other Topic', 'published' => true]);

        $article1 = Article::create([
            'title' => 'Article with main topic',
            'published' => true,
            'publish_start_date' => now(),
            'main_topic_id' => $topic->id,
        ]);

        $article2 = Article::create([
            'title' => 'Article with sub topic',
            'published' => true,
            'publish_start_date' => now(),
        ]);
        $article2->topics()->attach($topic->id);

        $article3 = Article::create([
            'title' => 'Article with different topic',
            'published' => true,
            'publish_start_date' => now(),
            'main_topic_id' => $otherTopic->id,
        ]);

        $block = new Block();
        $block->type = 'inhalts_feed';
        $block->content = [
            'feed_type' => 'articles',
            'count' => 10
        ];
        // Mock browserIds
        $block = \Mockery::mock($block)->makePartial();
        $block->shouldReceive('browserIds')->with('topics')->andReturn([$topic->id]);

        $view = view('site.blocks.inhalts_feed', ['block' => $block])->render();

        $this->assertStringContainsString('Article with main topic', $view);
        $this->assertStringContainsString('Article with sub topic', $view);
        $this->assertStringNotContainsString('Article with different topic', $view);
    }
}
