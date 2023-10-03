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
        Schema::create('poll_interrupteds', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('assemble_id')->nullable();
            $table->unsignedBigInteger('district_id')->nullable();
            $table->unsignedBigInteger('state_id')->nullable();
            $table->unsignedBigInteger('booth_id')->nullable();
            $table->string('stop_time')->nullable();
            $table->string('resume_time')->nullable();
            $table->datetime('last_updated_stop_time')->nullable();
            $table->datetime('last_updated_resume_time')->nullable();
            $table->unsignedBigInteger('added_by')->nullable();
            $table->unsignedBigInteger('role_id')->nullable();
            $table->string('reason')->nullable();
            $table->datetime('added_on')->nullable();
            $table->datetime('last_updated_on')->nullable();
            $table->string('resume_show')->nullable();
            $table->foreign('assemble_id')->references('id')->on('assemblies')->onDelete('cascade');
            $table->foreign('district_id')->references('id')->on('districts')->onDelete('cascade');
            $table->foreign('state_id')->references('id')->on('states')->onDelete('cascade');
            $table->foreign('booth_id')->references('id')->on('booths')->onDelete('cascade');
            $table->foreign('added_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('poll_interrupteds');
    }
};
