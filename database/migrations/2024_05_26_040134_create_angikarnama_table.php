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
        Schema::create('angikarnamas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sale_id');  
            $table->unsignedBigInteger('commercial_id'); 
            $table->unsignedBigInteger('tr_id');  // TRANSPORT AGENCY
            $table->string('name',100);
            $table->text('designation');
            $table->date('submited_date'); 
            $table->text('note');
            $table->timestamps();

            $table->foreign('commercial_id')->references('id')->on('commercial_invoices')->onDelete('cascade'); 
            $table->foreign('sale_id')->references('id')->on('orders')->onDelete('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('angikarnamas');
    }
};
