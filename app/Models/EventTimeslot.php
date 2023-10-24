<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Binafy\LaravelUserMonitoring\Traits\Actionable;

class EventTimeslot extends Model
{
    use HasFactory, Actionable;
    protected $fillable = ['event_id', 'date', 'start_time', 'end_time', 'locking_time', 'status', 'created_at', 'updated_at'];
}
