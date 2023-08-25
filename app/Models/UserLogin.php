<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserLogin extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'latitude', 'longitude','last_login', 'last_logout', 'ip_address','device', 'login_type', 'device_id','device_token','status'];
}
