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
        Schema::table('notifications', function (Blueprint $table) {
            $table->string('notification_for')->nullable()->after('notification_type');
            $table->unsignedBigInteger('notification_for_reference')->nullable()->after('notification_for');
            $table->unsignedBigInteger('notification_to')->nullable()->after('notification_for_reference');
			$table->foreign('notification_to')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('notification_for_reference')->references('id')->on('users')->onDelete('cascade');
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('notifications', function (Blueprint $table) {
            $table->dropColumn('notification_for');
            $table->dropColumn('notification_for_reference');
            $table->dropColumn('notification_to');
        });
    }
};
