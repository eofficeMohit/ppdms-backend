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
        Schema::table('booths', function (Blueprint $table) {
            $table->unsignedBigInteger('assigned_to')->default(1)->nullable();
			$table->unsignedBigInteger('assigned_by')->default(1)->nullable();
			$table->tinyInteger('assigned_status')->default(0)->nullable();
			$table->foreign('assigned_to')->references('id')->on('users')->onDelete('cascade');
			$table->foreign('assigned_by')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('booths', function (Blueprint $table) {
            //
        });
    }
};
