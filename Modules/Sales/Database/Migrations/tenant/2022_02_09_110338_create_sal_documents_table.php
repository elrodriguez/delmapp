<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sal_documents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->uuid('external_id');
            $table->unsignedBigInteger('establishment_id');
            $table->json('establishment');
            $table->char('soap_type_id', 2);
            $table->char('state_type_id', 2);
            $table->string('ubl_version');
            $table->char('group_id', 2);
            $table->string('document_type_id');
            $table->string('series', 4);
            $table->integer('number')->index();
            $table->date('date_of_issue')->index();
            $table->time('time_of_issue');
            $table->unsignedBigInteger('customer_id');
            $table->json('customer');
            $table->string('currency_type_id');
            $table->string('purchase_order')->nullable();

            $table->decimal('exchange_rate_sale', 12, 2);
            $table->decimal('total_prepayment', 12, 2)->default(0);
            $table->decimal('total_charge', 12, 2)->default(0);
            $table->decimal('total_discount', 12, 2)->default(0);
            $table->decimal('total_exportation', 12, 2)->default(0);
            $table->decimal('total_free', 12, 2)->default(0);
            $table->decimal('total_taxed', 12, 2)->default(0);
            $table->decimal('total_unaffected', 12, 2)->default(0);
            $table->decimal('total_exonerated', 12, 2)->default(0);
            $table->decimal('total_igv', 12, 2)->default(0);
            $table->decimal('total_base_isc', 12, 2)->default(0);
            $table->decimal('total_isc', 12, 2)->default(0);
            $table->decimal('total_base_other_taxes', 12, 2)->default(0);
            $table->decimal('total_other_taxes', 12, 2)->default(0);
            $table->decimal('total_plastic_bag_taxes', 6, 2)->default(0);
            $table->decimal('total_taxes', 12, 2)->default(0);
            $table->decimal('total_value', 12, 2)->default(0);
            $table->decimal('total', 12, 2);

            $table->json('charges')->nullable();
            $table->json('discounts')->nullable();
            $table->json('prepayments')->nullable();
            $table->json('guides')->nullable();
            $table->json('related')->nullable();
            $table->json('perception')->nullable();
            $table->json('detraction')->nullable();
            $table->json('legends')->nullable();
            $table->text('additional_information')->nullable();
            $table->string('filename')->nullable();
            $table->string('hash')->nullable();
            $table->longText('qr')->nullable();
            $table->boolean('has_xml')->default(false);
            $table->boolean('has_pdf')->default(false);
            $table->boolean('has_cdr')->default(false);
            $table->boolean('send_server')->default(true);
            $table->json('shipping_status')->nullable();
            $table->json('sunat_shipping_status')->nullable();
            $table->json('query_status')->nullable();
            $table->json('data_json')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('establishment_id')->references('id')->on('set_establishments');
            $table->foreign('customer_id')->references('id')->on('people');
            $table->foreign('soap_type_id')->references('id')->on('soap_types');
            $table->foreign('state_type_id')->references('id')->on('state_types');
            $table->foreign('group_id')->references('id')->on('groups');
            $table->foreign('document_type_id')->references('id')->on('document_types');
            $table->foreign('currency_type_id')->references('id')->on('currency_types');
            $table->foreign('series')->references('id')->on('sal_series');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sal_documents');
    }
}
