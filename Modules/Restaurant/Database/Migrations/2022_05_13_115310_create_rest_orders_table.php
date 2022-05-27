<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRestOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rest_orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('waiter_person_id');
            $table->string('customer_person_name', 300)->nullable();
            $table->decimal('discount', 8, 2)->nullable();
            $table->decimal('total', 8, 2);
            $table->string('state', 1)->default('P')->comment('P=pendiente,C=cocinando,T=terminado,X=cobrar,Z=pagado,en este estado se liberan las mesas');
            $table->string('order_type', 1)->default('L')->comment('L=se sirve en el local,D=es un pedido para llevar');
            $table->timestamps();
            $table->foreign('waiter_person_id')->references('id')->on('people');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rest_orders');
    }
}
