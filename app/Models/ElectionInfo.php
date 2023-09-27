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
        'assemble_id', 'district_id', 'state_id', 'booth_id','user_id','event_id','pc_no','voting','voting_last_updated','status','mock_poll_status','evm_cleared_status','vvpat_cleared_status','created_at','updated_at'
    ];

    protected $casts = [
        'status' => 'boolean',
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

    public function electionEvent(): BelongsTo
    {
        return $this->belongsTo(Event::class, 'event_id', 'id');
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

    public function event()
    {
        return $this->belongsTo(Event::class);

    }
}
