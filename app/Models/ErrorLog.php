<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ErrorLog extends Model
{
    use HasFactory;

    protected $fillable = ['user_id' , 'code' , 'file' , 'line' , 'message' , 'trace','status' ];

    public function user()
    {
        return $this->belongsTo(User::class);

    }
}
