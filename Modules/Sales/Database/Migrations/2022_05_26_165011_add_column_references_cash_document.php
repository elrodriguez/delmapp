<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnReferencesCashDocument extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sal_cash_documents', function (Blueprint $table) {
            $table->unsignedBigInteger('rest_sale_note_id')->nullable();
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
            $table->dropColumn('rest_sale_note_id');
        });
    }
}
