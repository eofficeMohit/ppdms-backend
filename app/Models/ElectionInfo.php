<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ElectionInfo extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'assemble_id', 'district_id', 'state_id', 'booth_id','pc_no','is_party_reached','is_poll_started','is_poll_ended','voting','is_nopolling',
        'reached_last_updated','started_last_updated','ended_last_updated','voting_last_updated','nopolling_last_updated','is_party_dispatch','dispatch_last_updated',
        'is_mockpoll_done','created_at','updated_at'
    ];
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
