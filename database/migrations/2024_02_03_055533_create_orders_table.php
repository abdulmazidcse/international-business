<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_number');
            $table->dateTime('order_date');
            $table->unsignedBigInteger('order_type_id');
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('exporter_id');
            $table->unsignedBigInteger('country_id');
            $table->string('importer_iec_no');
            $table->unsignedBigInteger('mode_carrying_id');
            $table->unsignedBigInteger('port_discharge_id');
            $table->unsignedBigInteger('final_destination_id');
            $table->unsignedBigInteger('loading_place_id');
            $table->unsignedBigInteger('bank_id');
            $table->decimal('total', 10, 2);
            $table->decimal('grand_total', 10, 2);
            $table->decimal('tax', 10, 2);
            $table->decimal('discount', 10, 2);
            $table->string('currency');
            $table->string('pan_number');
            $table->text('sales_term');
            $table->unsignedBigInteger('created_by');
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('order_type_id')->references('id')->on('order_types')->onDelete('cascade');
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
            $table->foreign('mode_carrying_id')->references('id')->on('modes_of_carrying')->onDelete('cascade');
            $table->foreign('port_discharge_id')->references('id')->on('port_of_discharged')->onDelete('cascade');
            $table->foreign('final_destination_id')->references('id')->on('final_destinations')->onDelete('cascade');
            $table->foreign('loading_place_id')->references('id')->on('loading_places')->onDelete('cascade');
            // Assuming 'users' table for created_by, update it accordingly
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
