<?php

namespace Tests\Unit;

use App\Models\Make;
use App\Models\Model;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ModelTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function it_can_create_models()
    {
        $model = [
            'name'    => 'Teste de Modelo',
            'make_id' => Make::factory()->createOne()->id
        ];

        Model::create($model);

        $this->assertDatabaseHas('models', $model);
    }

    /**
     * @test
     */
    public function make_id_can_not_be_null()
    {
        $model = [
            'name'    => 'Teste de Modelo',
            'make_id' => null
        ];

        $this->expectException(QueryException::class);

        Model::create($model);

        $this->assertDatabaseMissing('models', $model);
    }

    /**
     * @test
     */
    public function make_id_must_be_a_valid_one()
    {
        $model = [
            'name'    => 'Teste de Modelo',
            'make_id' => 99
        ];

        $this->expectException(QueryException::class);

        Model::create($model);

        $this->assertDatabaseMissing('models', $model);
    }
}
