<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ElectionInfo extends Model
{
    use HasFactory;
     /**
     * Write code on Method
     *
     * @return response()
     */
    protected $fillable = [
        'assemble_id', 'district_id', 'state_id', 'booth_id','pc_no','is_party_reached','is_poll_started','is_poll_ended','voting','is_nopolling',
        'reached_last_updated','started_last_updated','ended_last_updated','voting_last_updated','nopolling_last_updated','is_party_dispatch','dispatch_last_updated',
        'is_mockpoll_done','mockpoll_last_updated','voter_in_queue','voter_in_queue_last_updated','polling_party_left','polling_party_left_last_updated','evm_deposited',
        'evm_deposited_last_updated','is_booth_capt','booth_capt_last_updated','is_law_prob','law_prob_last_updated','is_evm_prob','evm_prob_last_updated','is_mockpoll_clear',
        'mockpollclear_last_updated','is_battery_removed','battery_removed_last_updated','is_evm_switch_off','is_evm_switch_off_last_updated','created_at','updated_at'
    ];

    protected $casts = [
        'is_party_reached' => 'boolean',
        'is_poll_started' => 'boolean',
        'is_poll_ended' => 'boolean',
        'is_nopolling' => 'boolean',
        'is_party_dispatch' => 'boolean',
        'is_mockpoll_done' => 'boolean',
        'voter_in_queue' => 'boolean',
        'polling_party_left' => 'boolean',
        'evm_deposited' => 'boolean',
        'is_booth_capt' => 'boolean',
        'is_law_prob' => 'boolean',
        'is_evm_prob' => 'boolean',
        'is_mockpoll_clear' => 'boolean',
        'is_battery_removed' => 'boolean',
        'is_evm_switch_off' => 'boolean',

    ];

    public function electionState(): BelongsTo
    {
        return $this->belongsTo(State::class, 'state_id', 'id');
    }

    public function electionDistrict(): BelongsTo
    {
        return $this->belongsTo(District::class, 'district_id', 'id');
    }


    public function electionBooth(): BelongsTo
    {
        return $this->belongsTo(Booth::class, 'booth_id', 'id');
    }


    public function electionAssembly(): BelongsTo
    {
        return $this->belongsTo(Assembly::class, 'assemble_id', 'id');
    }
    
    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function assembly()
    {
        return $this->belongsTo(Assembly::class);
    }
    
    public function booth()
    {
        return $this->belongsTo(Booth::class);

    }
}
