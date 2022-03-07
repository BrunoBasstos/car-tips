<?php

use App\Models\Model;
use App\Models\Trim;
use App\Models\Type;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->boolean('active')->default(true);
            $table->foreignIdFor(Type::class)->constrained();
            $table->foreignIdFor(Model::class)->constrained();
            $table->foreignIdFor(Trim::class)->nullable()->default(null)->constrained();
            $table->timestamps();

            $table->unique(['type_id', 'model_id', 'trim_id'], 'unique_type_model_trim');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicles');
    }
};
