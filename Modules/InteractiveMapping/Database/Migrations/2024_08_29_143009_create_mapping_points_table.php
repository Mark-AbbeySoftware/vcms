<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Modules\InteractiveMapping\Entities\Point;
use Modules\InteractiveMapping\Entities\Polygon;

class CreateMappingPointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() : void
    {
        Schema::create(Point::TABLE, function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('polygon_id')->nullable();
            $table->string('uuid')->nullable();
            $table->string('point')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists(Point::TABLE);
    }
}
