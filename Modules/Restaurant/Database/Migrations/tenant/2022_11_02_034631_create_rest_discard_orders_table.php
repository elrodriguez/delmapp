<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRestDiscardOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rest_discard_orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('command_id');
            $table->unsignedBigInteger('responsable_id');
            $table->foreign('responsable_id', 'discard_responsable_user_id_fk')->references('id')->on('users');
            $table->foreign('command_id')->references('id')->on('rest_commands')->onDelete('cascade');
            $table->integer('quantity');
            $table->string('description', 300);
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
        Schema::dropIfExists('rest_discard_orders');
    }
}
