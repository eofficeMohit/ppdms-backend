<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_name', 'event_sequence', 'status','created_at','updated_at'
    ];

    protected $casts = [
        'status' => 'boolean',
    ];
}
