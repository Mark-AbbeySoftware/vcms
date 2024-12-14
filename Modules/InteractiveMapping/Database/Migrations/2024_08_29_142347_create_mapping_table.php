<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Modules\InteractiveMapping\Entities\MappingRegion;

class CreateMappingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() :void
    {
        Schema::create(MappingRegion::TABLE, function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->nullable();
            $table->string('url')->nullable();
            $table->string('target')->default('_self');
            $table->string('identifier')->nullable();
            $table->string('title')->nullable();
            $table->string('class')->nullable();
            $table->string('tooltip_title')->nullable();
            $table->string('tooltip_id')->nullable();
            $table->string('polygon_class')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() : void
    {
        Schema::dropIfExists(MappingRegion::TABLE);
    }
}
