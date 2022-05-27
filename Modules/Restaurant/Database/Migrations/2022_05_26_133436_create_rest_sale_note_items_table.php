<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRestSaleNoteItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rest_sale_note_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sale_note_id');
            $table->unsignedBigInteger('item_id');
            $table->json('item');
            $table->string('item_type', 300);
            $table->decimal('unit_value', 16, 6);
            $table->string('affectation_igv_type_id')->nullable();
            $table->decimal('total_base_igv', 12, 2);
            $table->decimal('percentage_igv', 12, 2);
            $table->decimal('total_igv', 12, 2);
            $table->decimal('quantity', 12, 2);
            $table->string('system_isc_type_id')->nullable();
            $table->decimal('total_base_isc', 12, 2);
            $table->decimal('percentage_isc', 12, 2);
            $table->decimal('total_isc', 12, 2);
            $table->decimal('total_base_other_taxes', 12, 2);
            $table->decimal('total_other_taxes', 12, 2);
            $table->decimal('total_taxes', 12, 2);
            $table->string('price_type_id')->nullable();
            $table->decimal('unit_price', 12, 2);
            $table->decimal('total_value', 12, 2);
            $table->decimal('total_charge', 12, 2);
            $table->decimal('total_discount', 12, 2);
            $table->decimal('total', 12, 2);
            $table->json('attributes')->nullable();
            $table->json('discounts')->nullable();
            $table->json('charges')->nullable();
            $table->unsignedBigInteger('kardex_id')->nullable();
            $table->string('kardex_type', 300)->nullable();
            $table->unsignedBigInteger('warehouse_id')->nullable();
            $table->timestamps();
            $table->foreign('sale_note_id')->references('id')->on('rest_sale_notes')->onDelete('cascade');
            $table->foreign('affectation_igv_type_id')->references('id')->on('affectation_igv_types');
            $table->foreign('system_isc_type_id')->references('id')->on('system_isc_types');
            $table->foreign('price_type_id')->references('id')->on('price_types');
            $table->foreign('warehouse_id')->references('id')->on('inv_locations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rest_sale_note_items');
    }
}
