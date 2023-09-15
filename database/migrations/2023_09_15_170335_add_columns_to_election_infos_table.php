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
        Schema::table('election_infos', function (Blueprint $table) {
            $table->tinyInteger('mock_poll_status')->default(0)->nullable();
            $table->tinyInteger('evm_cleared_status')->default(0)->nullable();
            $table->tinyInteger('vvpat_cleared_status')->default(0)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('election_infos', function (Blueprint $table) {
            $table->dropColumn('mock_poll_status');
            $table->dropColumn('evm_cleared_status');
            $table->dropColumn('vvpat_cleared_status');
        });
    }
};
