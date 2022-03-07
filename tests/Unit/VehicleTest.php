<?php

namespace Tests\Unit;

use App\Models\Model;
use App\Models\Trim;
use App\Models\Type;
use App\Models\Vehicle;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class VehicleTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function it_can_create_vehicles()
    {
        $vehicle = [
            'type_id'  => Type::factory()->createOne()->id,
            'model_id' => Model::factory()->createOne()->id,
            'trim_id'  => Trim::factory()->createOne()->id
        ];

        Vehicle::create($vehicle);

        $this->assertDatabaseHas('vehicles', $vehicle);
    }

    /**
     * @test
     */
    public function model_id_must_be_a_valid_one()
    {
        $vehicle = [
            'type_id'  => Type::factory()->createOne()->id,
            'model_id' => 99,
            'trim_id'  => Trim::factory()->createOne()->id,
        ];

        $this->expectException(QueryException::class);

        Vehicle::create($vehicle);

        $this->assertDatabaseMissing('vehicles', $vehicle);
    }

    /**
     * @test
     */
    public function trim_id_can_be_null()
    {
        $vehicle = [
            'type_id'  => Type::factory()->createOne()->id,
            'model_id' => Model::factory()->createOne()->id,
            'trim_id'  => null,
        ];

        Vehicle::create($vehicle);

        $this->assertDatabaseHas('vehicles', $vehicle);
    }

    /**
     * @test
     */
    public function when_not_null_trim_id_should_be_a_valid_one()
    {
        $vehicle = [
            'type_id'  => Type::factory()->createOne()->id,
            'model_id' => Model::factory()->createOne()->id,
            'trim_id'  => 999,
        ];

        $this->expectException(QueryException::class);

        Vehicle::create($vehicle);

        $this->assertDatabaseMissing('vehicles', $vehicle);
    }


    /**
     * @test
     */
    public function it_should_not_be_able_to_create_a_repeated_vehicle()
    {

        $type_id = Type::factory()->createOne()->id;
        $model_id = Model::factory()->createOne()->id;
        $trim_id = Trim::factory()->createOne()->id;

        $vehicle = [
            'type_id'  => $type_id,
            'model_id' => $model_id,
            'trim_id'  => $trim_id,
        ];

        Vehicle::create($vehicle);
        $this->assertDatabaseHas('vehicles', $vehicle);

        $this->expectException(QueryException::class);

        Vehicle::create($vehicle);
        $this->assertDatabaseCount('vehicles', 1);
    }


}
