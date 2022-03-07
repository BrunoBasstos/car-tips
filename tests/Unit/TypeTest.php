<?php

namespace Tests\Unit;

use App\Models\Type;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TypeTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function it_can_create_types()
    {
        $type = [
            'name' => 'Type-Test',
            'css_color' => 'green-300'
        ];

        Type::create($type);

        $this->assertDatabaseHas('types', $type);
    }

    /**
     * @test
     */
    public function css_color_can_be_null()
    {
        $type = [
            'name' => 'Type-Test',
            'css_color' => null
        ];

        Type::create($type);

        $this->assertDatabaseHas('types', $type);
    }
}
