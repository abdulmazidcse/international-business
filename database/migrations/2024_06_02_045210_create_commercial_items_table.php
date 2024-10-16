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
        Schema::create('commercial_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('commercial_id');  
            $table->unsignedBigInteger('order_item_id');  
            $table->unsignedTinyInteger('pw_status')->default(0)->comment('0=No|1=Yes');
            $table->unsignedTinyInteger('tr_status')->default(0)->comment('0=No|1=Yes');
            $table->unsignedTinyInteger('angikarnama_status')->default(0)->comment('0=No|1=Yes');
            $table->string('product_code');
            $table->string('description');
            $table->string('hs_code');
            $table->unsignedInteger('pcs_per_bunch');
            $table->unsignedInteger('quantity');
            $table->unsignedInteger('total_bunch');
            $table->decimal('weight_per_unit', 10, 2);
            $table->decimal('net_weight', 10, 2);
            $table->decimal('unit_rate', 10, 2);
            $table->decimal('total_value', 10, 2);
            $table->decimal('gross_weight', 10, 2);
            $table->decimal('cbm_length', 10, 2);
            $table->decimal('cbm_width', 10, 2);
            $table->decimal('cbm_height', 10, 2);
            $table->decimal('carton_cbm', 10, 2);
            $table->decimal('total_cbm', 10, 2);
            $table->decimal('total_gross_weight', 10, 2);
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('commercial_id')->references('id')->on('commercial_invoices')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commercial_items');
    }
};
