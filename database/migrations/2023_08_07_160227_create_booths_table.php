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
        Schema::create('booths', function (Blueprint $table) {
            $table->id();
            $table->string('booth_no');
            $table->integer('tot_voters')->nullable();
            $table->unsignedBigInteger('district_id');
            $table->unsignedBigInteger('state_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('assemble_id')->nullable();
            $table->string('booth_name')->nullable();
            $table->string('booth_name_uni')->nullable();
            $table->boolean('has_auxy_ps')->default(false)->nullable();
            $table->string('booth_no_auxy')->nullable();
            $table->double('latitude')->nullable();
            $table->double('longitude')->nullable();
            $table->foreign('assemble_id')->references('id')->on('assemblies')->onDelete('cascade');
            $table->foreign('state_id')->references('id')->on('states')->onDelete('cascade');
            $table->foreign('district_id')->references('id')->on('districts')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->tinyInteger('status')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booths');
    }
};
