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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('address')->nullable();
            $table->string('phone_number',15)->nullable();
            $table->text('terms_and_conditions')->nullable();
            $table->text('payment_terms')->nullable();
            $table->unsignedBigInteger('country_id')->nullable();
            $table->unsignedBigInteger('mode_carrying_id')->nullable();
            $table->unsignedBigInteger('port_discharge_id')->nullable();
            $table->unsignedBigInteger('final_destination_id')->nullable();
            $table->unsignedBigInteger('loading_place_id')->nullable();
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('set null');
            $table->foreign('mode_carrying_id')->references('id')->on('modes_of_carrying')->onDelete('set null');
            $table->foreign('port_discharge_id')->references('id')->on('port_of_discharged')->onDelete('set null');
            $table->foreign('final_destination_id')->references('id')->on('final_destinations')->onDelete('set null');
            $table->foreign('loading_place_id')->references('id')->on('loading_places')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
