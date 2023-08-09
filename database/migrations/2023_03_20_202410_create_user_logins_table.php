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
        Schema::create('user_logins', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->dateTime('last_login');
            $table->dateTime('last_logout');
            $table->string('ip_address');
            $table->macAddress('device');
            $table->string('login_type');
            $table->string('device_type');
            $table->string('device_id');
            $table->string('device_token');
            $table->integer('no_of_login_attempts');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->tinyInteger('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_logins');
    }
};
