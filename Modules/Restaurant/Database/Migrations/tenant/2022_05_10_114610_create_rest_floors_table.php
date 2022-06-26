<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateRestFloorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rest_floors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('establishment_id');
            $table->string('name');
            $table->boolean('state')->default(true);
            $table->timestamps();
            $table->foreign('establishment_id')->references('id')->on('set_establishments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rest_floors');
    }
}
