<?php

namespace Tests\Feature;

use App\Models\Tag;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
use Tests\TestCase;

class TipTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function users_can_store_tips()
    {
        $user = User::factory()->createOne();
        $vehicle = Vehicle::factory()->createOne();
        $tag = Tag::factory()->createOne();

        $data = [
            'content' => 'Testando inserção de dicas',
            'vehicle_id' => $vehicle->id,
            'tag_id' => $tag->id
        ];

        $this->actingAs($user)
            ->post(route('tips.store'), $data)
            ->assertStatus(Response::HTTP_CREATED)
            ->assertJson($data);

        $this->assertDatabaseHas('tips', $data);
    }
}
