<?php

namespace Tests\Unit;

use App\Models\Tag;
use App\Models\Tip;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use Tests\TestCase;

class TipTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function it_can_create_tips()
    {
        $tip = [
            'content' => Str::random(15),
            'user_id' => User::factory()->createOne()->id,
            'vehicle_id' => Vehicle::factory()->createOne()->id,
            'tag_id' => Tag::factory()->createOne()->id
        ];

        Tip::create($tip);

        $this->assertDatabaseHas('tips', $tip);
    }

    /**
     * @test
     */
    public function tags_can_be_null()
    {
        $tip = [
            'content' => Str::random(15),
            'user_id' => User::factory()->createOne()->id,
            'vehicle_id' => Vehicle::factory()->createOne()->id,
            'tag_id' => null
        ];

        Tip::create($tip);

        $this->assertDatabaseHas('tips', $tip);
    }

    /**
     * @test
     */
    public function user_must_be_a_valid_one()
    {
        $tip = [
            'content' => Str::random(15),
            'user_id' => 999,
            'vehicle_id' => Vehicle::factory()->createOne()->id,
            'tag_id' => null
        ];

        $this->expectException(QueryException::class);

        Tip::create($tip);

        $this->assertDatabaseMissing('tips', $tip);
    }

    /**
     * @test
     */
    public function vehicle_must_be_a_valid_one()
    {
        $tip = [
            'content' => Str::random(15),
            'user_id' => User::factory()->createOne()->id,
            'vehicle_id' => 1,
            'tag_id' => null
        ];

        $this->expectException(QueryException::class);

        Tip::create($tip);

        $this->assertDatabaseMissing('tips', $tip);
    }
}
