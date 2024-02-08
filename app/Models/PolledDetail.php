<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Binafy\LaravelUserMonitoring\Traits\Actionable;

class PolledDetail extends Model
{
    use HasFactory,Actionable;

     /**
     * Write code on Method
     *
     * @return response()
     */
    protected $fillable = [
        'district_id', 'assemble_id','state_id','event_id', 'user_id', 'booth_id','ac_code','vote_polled','date_time_received','ip_address','ip_host'
    ];


    public function polledState(): BelongsTo
    {
        return $this->belongsTo(State::class, 'state_id', 'id');
    }

    public function polledDistrict(): BelongsTo
    {
        return $this->belongsTo(District::class, 'district_id', 'id');
    }


    public function polledBooth(): BelongsTo
    {
        return $this->belongsTo(Booth::class, 'booth_id', 'id');
    }


    public function polledAssembly(): BelongsTo
    {
        return $this->belongsTo(Assembly::class, 'assemble_id', 'id');
    }

}
