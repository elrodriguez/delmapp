<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnReferencesRestCashDocument extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sal_cash_documents', function (Blueprint $table) {
            $table->foreign('rest_sale_note_id', 'cash_documents_rest_sale_note_FK')->references('id')->on('rest_sale_notes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sal_cash_documents', function (Blueprint $table) {
            $table->dropForeign('cash_documents_rest_sale_note_FK');
        });
    }
}
