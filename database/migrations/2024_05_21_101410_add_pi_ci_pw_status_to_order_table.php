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
        Schema::table('orders', function (Blueprint $table) {
            $table->unsignedTinyInteger('pi_status')->default(0)->comment('0=No|1=Yes')->after('id');
            $table->unsignedTinyInteger('ci_status')->default(0)->comment('0=No|1=Yes')->after('pi_status');
            $table->unsignedTinyInteger('pw_status')->default(0)->comment('0=No|1=Yes')->after('ci_status');
            $table->unsignedTinyInteger('tr_status')->default(0)->comment('0=No|1=Yes')->after('pw_status'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            //
        });
    }
};
