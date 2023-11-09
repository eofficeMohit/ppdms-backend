<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Binafy\LaravelUserMonitoring\Traits\Actionable;

class State extends Model
{
    use HasFactory,Actionable;
    protected $fillable = [
        'name','st_code','created_at','updated_at','status'
    ];
}
