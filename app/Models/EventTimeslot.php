<?php

namespace App\Models;

use Binafy\LaravelUserMonitoring\Traits\Actionable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventTimeslot extends Model
{
    use HasFactory;
    use Actionable;

    protected $fillable = [
        'event_id', 'date', 'start_time','end_time', 'status','created_at','updated_at'
    ];
}
