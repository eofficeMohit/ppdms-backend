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
            $table->unsignedBigInteger('event_id')->nullable();
            $table->unsignedBigInteger('interrupted_type')->nullable();
            $table->string('remarks')->nullable();
            $table->string('old_cu')->nullable();
            $table->string('old_bu')->nullable();
            $table->string('new_cu')->nullable();
            $table->string('new_bu')->nullable();
            $table->time('stop_time')->nullable();
            $table->time('resume_time')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('assemble_id')->references('id')->on('assemblies')->onDelete('cascade');
            $table->foreign('district_id')->references('id')->on('districts')->onDelete('cascade');
            $table->foreign('state_id')->references('id')->on('states')->onDelete('cascade');
            $table->foreign('booth_id')->references('id')->on('booths')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
            $table->foreign('interrupted_type')->references('id')->on('poll_interrupted_types')->onDelete('cascade');
			$table->tinyInteger('status')->default(1);
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
