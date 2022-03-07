<?php

namespace Tests\Unit;

use App\Models\Make;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MakeTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function it_can_create_makes()
    {
        $make = [
            'name' => 'Teste de Fabricante'
        ];

        Make::create($make);

        $this->assertDatabaseHas('makes', $make);
    }
}
