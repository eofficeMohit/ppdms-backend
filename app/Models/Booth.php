<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Binafy\LaravelUserMonitoring\Traits\Actionable;

class Booth extends Model
{
    use HasFactory, Actionable;
    protected $fillable = ['booth_no', 'tot_voters', 'booth_name', 'booth_name_uni', 'district_id', 'state_id', 'assemble_id', 'user_id', 'latitude', 'longitude', 'status', 'assigned_to', 'assigned_by', 'assigned_status'];
    /**
     * Get the assembly that owns the booths
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

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
        return $this->belongsTo(Assembly::class, 'assemble_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
