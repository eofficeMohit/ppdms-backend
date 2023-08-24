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
        'is_mockpoll_done','created_at','updated_at'
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
}
