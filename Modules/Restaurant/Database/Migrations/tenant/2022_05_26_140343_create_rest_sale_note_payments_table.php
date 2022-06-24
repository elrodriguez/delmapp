<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRestSaleNotePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rest_sale_note_payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sale_note_id');
            $table->date('date_of_payment');
            $table->char('payment_method_type_id', 2)->nullable();
            $table->string('payment_destination_id')->nullable();
            $table->boolean('has_card')->default(false);
            $table->char('card_brand_id', 2)->nullable();
            $table->string('reference')->nullable();
            $table->decimal('payment', 12, 2);
            $table->timestamps();
            $table->foreign('sale_note_id', 'note_payments_sale_note_id_rfk')->references('id')->on('rest_sale_notes')->onDelete('cascade');
            $table->foreign('card_brand_id', 'note_payments_card_brand_id_rfk')->references('id')->on('entity_cards');
            $table->foreign('payment_method_type_id', 'note_payments_pmti_rfk')->references('id')->on('cat_payment_method_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rest_sale_note_payments');
    }
}
