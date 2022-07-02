<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvItemPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inv_item_prices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('item_id');
            $table->string('measure_id');
            $table->string('description', 300);
            $table->decimal('units', 8, 2)->default(0);
            $table->decimal('price', 8, 2)->default(0);
            $table->boolean('main')->default(false);
            $table->timestamps();

            $table->foreign('item_id')->references('id')->on('inv_items');
            $table->foreign('measure_id')->references('id')->on('inv_unit_measures');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inv_item_prices');
    }
}
