<?php

namespace Tests\Feature;

use App\Models\Article;
use App\Models\Event;
use App\Models\Topic;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TopicRelationshipTest extends TestCase
{
    use RefreshDatabase;

    public function test_article_can_have_main_and_secondary_topics()
    {
        $mainTopic = Topic::create(['title' => 'Main', 'published' => true]);
        $secondaryTopic1 = Topic::create(['title' => 'Secondary 1', 'published' => true]);
        $secondaryTopic2 = Topic::create(['title' => 'Secondary 2', 'published' => true]);

        $article = Article::create([
            'title' => 'Test Article',
            'main_topic_id' => $mainTopic->id,
            'published' => true
        ]);

        $article->topics()->attach([$secondaryTopic1->id, $secondaryTopic2->id]);

        $this->assertEquals('Main', $article->mainTopic->title);
        $this->assertCount(2, $article->topics);
        $this->assertEquals('Secondary 1', $article->topics[0]->title);
    }

    public function test_event_can_have_main_and_secondary_topics()
    {
        $mainTopic = Topic::create(['title' => 'Main Event Topic', 'published' => true]);
        $secondaryTopic = Topic::create(['title' => 'Secondary Event Topic', 'published' => true]);

        $event = Event::create([
            'title' => 'Test Event',
            'main_topic_id' => $mainTopic->id,
            'published' => true
        ]);

        $event->topics()->attach([$secondaryTopic->id]);

        $this->assertEquals('Main Event Topic', $event->mainTopic->title);
        $this->assertCount(1, $event->topics);
        $this->assertEquals('Secondary Event Topic', $event->topics->first()->title);
    }
}
