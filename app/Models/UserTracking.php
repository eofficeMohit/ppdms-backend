<?php

namespace App\Models;


use Binafy\LaravelUserMonitoring\Traits\Actionable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTracking extends Model
{
    use HasFactory;
    use Actionable;
}
