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
        Schema::create('e_v_m_replacements', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('district_id')->nullable();
            $table->unsignedBigInteger('state_id')->nullable();
            $table->unsignedBigInteger('booth_id')->nullable();
            $table->unsignedBigInteger('assemble_id')->nullable();
            $table->string('old_CU_no')->nullable();
            $table->string('old_BU_no')->nullable();
            $table->string('old_VVPAT_no')->nullable();
            $table->string('new_CU_no')->nullable();
            $table->string('new_BU_no')->nullable();
            $table->string('new_VVPAT_no')->nullable();
            $table->tinyInteger('status')->default(0)->nullable();
            $table->dateTime('added_on')->nullable();
            $table->dateTime('last_up_dated_on')->nullable();
            $table->unsignedBigInteger('role_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('activity')->nullable();
            $table->string('item_cu')->nullable();
            $table->string('item_bu')->nullable();
            $table->string('item_vvpat')->nullable();
            $table->foreign('assemble_id')->references('id')->on('assemblies')->onDelete('cascade');
            $table->foreign('district_id')->references('id')->on('districts')->onDelete('cascade');
            $table->foreign('state_id')->references('id')->on('states')->onDelete('cascade');
            $table->foreign('booth_id')->references('id')->on('booths')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
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
        Schema::dropIfExists('e_v_m_replacements');
    }
};
