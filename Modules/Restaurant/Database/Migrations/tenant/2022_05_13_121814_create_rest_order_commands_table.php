<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRestOrderCommandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rest_order_commands', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->unsignedInteger('command_id');
            $table->string('command_type', 500);
            $table->string('description', 500)->nullable();
            $table->decimal('quantity', 8, 2)->default(1);
            $table->decimal('price', 8, 2);
            $table->decimal('discount', 8, 2)->nullable();
            $table->decimal('total', 8, 2);
            $table->string('details', 500)->nullable();
            $table->boolean('command_local')->default(true);
            $table->string('state', 1)->default('P')->comment('P=pendiente,C=cocinando,S=serivo');
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
        Schema::dropIfExists('rest_order_commands');
    }
}
