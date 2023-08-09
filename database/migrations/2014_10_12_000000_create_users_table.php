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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('mobile_number')->unique()->nullable();
            $table->string('alternate_mobile')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('designation')->nullable();
            $table->string('office_name')->nullable();
            $table->string('dept_name')->nullable();
            $table->string('ac_code')->nullable();
            $table->string('api_key')->nullable();
            $table->unsignedBigInteger('state_id')->nullable();
            $table->unsignedBigInteger('district_id')->nullable();
            $table->string('category')->nullable();
            $table->integer('start_from')->nullable();
            $table->string('dest')->nullable();
            $table->string('other_name')->nullable();
            $table->string('last_pass')->nullable();
            $table->string('sec_last_pass')->nullable();
            $table->string('third_last_pass')->nullable();
            $table->boolean('ac_active')->default(false)->nullable();
            $table->tinyInteger('status')->default(0);
            $table->foreign('state_id')->references('id')->on('states')->onDelete('cascade');
            $table->foreign('district_id')->references('id')->on('districts')->onDelete('cascade');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
