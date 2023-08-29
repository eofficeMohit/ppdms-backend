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
            $table->double('latitude')->nullable();
            $table->double('longitude')->nullable();
            $table->dateTime('last_login')->nullable();
            $table->dateTime('last_logout')->nullable();
            $table->string('ip_address')->nullable();
            $table->macAddress('device_mac_address')->nullable();
            $table->string('login_type')->nullable();
            $table->string('device_type')->nullable();
            $table->string('device_id')->nullable();
            $table->string('device_token')->nullable();
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
