<?php

namespace Tests\Unit;

use App\Models\Trim;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TrimTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function it_can_create_trims()
    {
        $trim = [
            'name' => 'Trim-Test'
        ];

        Trim::create($trim);

        $this->assertDatabaseHas('trims', $trim);
    }
}
