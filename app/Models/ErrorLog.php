<?php

namespace App\Models;

use Binafy\LaravelUserMonitoring\Traits\Actionable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ErrorLog extends Model
{
    use HasFactory;
    use Actionable;

    protected $fillable = ['user_id' , 'code' , 'file' , 'line' , 'message' , 'trace','status' ];

    public function user()
    {
        return $this->belongsTo(User::class);

    }
}
