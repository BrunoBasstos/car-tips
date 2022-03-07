<?php

namespace Tests\Unit;

use App\Models\Tag;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TagTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function it_can_create_tags()
    {
        $tag = [
            'name' => 'Tag-Test'
        ];

        Tag::create($tag);

        $this->assertDatabaseHas('tags', $tag);
    }
}
