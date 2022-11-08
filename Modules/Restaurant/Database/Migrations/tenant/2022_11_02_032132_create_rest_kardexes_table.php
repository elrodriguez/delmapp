<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRestKardexesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rest_kardexes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('command_id');
            $table->foreign('command_id', 'com_kardex_id_fk')->references('id')->on('rest_commands');
            $table->integer('quantity');
            $table->bigInteger('movement_type_id')->comment('id del documento de movimiento');
            $table->string('movement_type_entity')->comment('entidad del movimiento');
            $table->boolean('state')->default(true);
            $table->string('description');
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
        Schema::dropIfExists('rest_kardexes');
    }
}
