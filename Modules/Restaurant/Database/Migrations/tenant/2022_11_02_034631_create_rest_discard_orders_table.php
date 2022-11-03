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
            $table->unsignedBigInteger('kardex_id');
            $table->unsignedBigInteger('responsable_id');
            $table->foreign('responsable_id', 'discard_responsable_user_id_fk')->references('id')->on('users');
            $table->foreign('kardex_id', 'discard_kardex_id_fk')->references('id')->on('rest_kardexs');
            $table->integer('quantity');
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
