<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Binafy\LaravelUserMonitoring\Traits\Actionable;

class UserLogin extends Model
{
    use HasFactory,Actionable;
    protected $fillable = ['user_id', 'latitude', 'longitude','last_login', 'last_logout', 'ip_address','device', 'login_type', 'device_id','device_token','status'];
   
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
