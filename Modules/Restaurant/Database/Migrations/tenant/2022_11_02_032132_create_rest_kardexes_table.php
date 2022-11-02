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
        Schema::create('rest_kardexs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('command_id');
            $table->foreign('command_id', 'com_kardex_id_fk')->references('id')->on('rest_commands');
            $table->integer('quantity');
            $table->string('movement_type_id', 1)->comment('Aún no sé que va aquí //corregir');
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
        Schema::dropIfExists('rest_kardexs');
    }
}
