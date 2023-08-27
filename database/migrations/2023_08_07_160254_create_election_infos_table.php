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
        Schema::create('election_infos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('assemble_id')->nullable();
            $table->unsignedBigInteger('district_id');
            $table->unsignedBigInteger('state_id');
            $table->unsignedBigInteger('booth_id');
            $table->tinyInteger('is_party_reached')->default(0);
            $table->tinyInteger('is_poll_started')->default(0);
            $table->tinyInteger('is_poll_ended')->default(0);
            $table->float('voting')->nullable();
            $table->tinyInteger('is_nopolling')->default(0);
            $table->dateTime('reached_last_updated')->nullable();
            $table->dateTime('started_last_updated')->nullable();
            $table->dateTime('ended_last_updated')->nullable();
            $table->dateTime('voting_last_updated')->nullable();
            $table->dateTime('nopolling_last_updated')->nullable();
            $table->tinyInteger('is_party_dispatch')->default(0);
            $table->dateTime('dispatch_last_updated')->nullable();
            $table->tinyInteger('is_mockpoll_done')->default(0);
            $table->dateTime('mockpoll_last_updated')->nullable();
            $table->integer('voter_in_queue')->default(0);
            $table->dateTime('voter_in_queue_last_updated')->nullable();
            $table->tinyInteger('polling_party_left')->default(0);
            $table->dateTime('polling_party_left_last_updated')->nullable();
            $table->tinyInteger('evm_deposited')->default(0);
            $table->dateTime('evm_deposited_last_updated')->nullable();
            $table->tinyInteger('is_booth_capt')->default(0);
            $table->dateTime('booth_capt_last_updated')->nullable();
            $table->tinyInteger('is_law_prob')->default(0);
            $table->dateTime('law_prob_last_updated')->nullable();
            $table->tinyInteger('is_evm_prob')->default(0);
            $table->dateTime('evm_prob_last_updated')->nullable();
            $table->tinyInteger('is_mockpoll_clear')->default(0);
            $table->dateTime('mockpollclear_last_updated')->nullable();
            $table->tinyInteger('is_battery_removed')->default(0);
            $table->dateTime('battery_removed_last_updated')->nullable();
            $table->tinyInteger('is_evm_switch_off')->default(0);
            $table->dateTime('is_evm_switch_off_last_updated')->nullable();
            $table->foreign('assemble_id')->references('id')->on('assemblies')->onDelete('cascade');
            $table->foreign('booth_id')->references('id')->on('booths')->onDelete('cascade');
            $table->foreign('state_id')->references('id')->on('states')->onDelete('cascade');
            $table->foreign('district_id')->references('id')->on('districts')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('election_infos');
    }
};
