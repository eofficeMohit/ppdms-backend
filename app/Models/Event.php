<?php

namespace App\Models;

use Binafy\LaravelUserMonitoring\Traits\Actionable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    use Actionable;

    protected $fillable = [
        'event_name', 'event_sequence', 'status','created_at','updated_at'
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    public function timeSlots()
    {
        return $this->hasMany(EventTimeslot::class);
    }
}
