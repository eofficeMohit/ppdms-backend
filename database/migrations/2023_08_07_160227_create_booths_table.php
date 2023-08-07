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
            $table->string('St_Code');
            $table->integer('acCode');
            $table->string('booth_no');
            $table->integer('tot_voters');
            $table->index('district_id');
            $table->index('state_id');
            $table->index('user_id');
            $table->string('booth_name');
            $table->string('booth_name_uni');
            $table->string('has_auxy_ps');
            $table->string('booth_no_auxy');
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
