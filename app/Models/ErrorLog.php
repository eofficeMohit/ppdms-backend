<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Binafy\LaravelUserMonitoring\Traits\Actionable;

class ErrorLog extends Model
{
    use HasFactory,Actionable;

    protected $fillable = ['user_id' , 'code' , 'file' , 'line' , 'message' , 'trace','status' ];

    public function user()
    {
        return $this->belongsTo(User::class);

    }
}
