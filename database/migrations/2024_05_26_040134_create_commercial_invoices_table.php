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
        Schema::create('commercial_invoices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sale_id');  
            $table->unsignedTinyInteger('pw_status')->default(0)->comment('0=No|1=Yes');
            $table->unsignedTinyInteger('tr_status')->default(0)->comment('0=No|1=Yes'); 
            $table->unsignedTinyInteger('angikarnama_status')->default(0)->comment('0=No|1=Yes'); 
            $table->string('exp_no',100);
            $table->text('tone');
            $table->date('submited_date'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commercial_invoices');
    }
};
