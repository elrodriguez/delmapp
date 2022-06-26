<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateRestTablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rest_tables', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('floor_id');
            $table->string('name');
            $table->string('description')->nullable();
            $table->integer('chairs')->default(2);
            $table->boolean('occupied')->default(false);
            $table->boolean('active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rest_tables');
    }
}
