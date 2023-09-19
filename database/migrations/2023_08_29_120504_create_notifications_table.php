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
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('sender_id')->nullable();
            $table->string('receiver_id')->nullable();
            $table->string('module_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('url')->nullable();
            $table->string('notification_type')->nullable();
            $table->string('message')->nullable();
            $table->string('sender_status')->nullable();
            $table->string('receiver_status')->nullable();
            $table->string('seen')->default(0)->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
