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
        Schema::create('assemblies', function (Blueprint $table) {
            $table->id();
            $table->string('st_code');
            $table->integer('asmb_code');
            $table->string('ac_type');
            $table->string('pc_type')->nullable();
            $table->integer('pc_no');
            $table->unsignedBigInteger('district_id');
            $table->unsignedBigInteger('state_id');
            $table->string('asmb_name');
            $table->integer('ac_name_uni')->nullable();
            $table->foreign('district_id')->references('id')->on('districts')->onDelete('cascade');
            $table->foreign('state_id')->references('id')->on('states')->onDelete('cascade');
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
        Schema::dropIfExists('assemblies');
    }
};
