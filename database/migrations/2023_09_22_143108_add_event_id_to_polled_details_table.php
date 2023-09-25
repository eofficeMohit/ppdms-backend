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
        Schema::table('polled_details', function (Blueprint $table) {
            $table->dropColumn('ac_code');
            $table->unsignedBigInteger('state_id')->nullable()->after('district_id');
            $table->unsignedBigInteger('event_id')->nullable()->after('booth_id');
			$table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
            $table->foreign('state_id')->references('id')->on('states')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('polled_details', function (Blueprint $table) {
            $table->integer('ac_code');
            $table->dropColumn('event_id');
            $table->dropColumn('state_id');

        });
    }
};
