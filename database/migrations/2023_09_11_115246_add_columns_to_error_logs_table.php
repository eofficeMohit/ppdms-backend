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
        Schema::table('error_logs', function (Blueprint $table) {
            $table->tinyInteger('status')->default(0)->comment('0 for Pending, 1 for In-progress and 2 for Resolved.');
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('error_logs', function (Blueprint $table) {
            $table->dropColumn('status');
            $table->dropForeign('error_logs_updated_by_foreign');
            $table->dropColumn('updated_by');
        });
    }
};
