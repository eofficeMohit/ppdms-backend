<?php

namespace App\Models;

use Binafy\LaravelUserMonitoring\Traits\Actionable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DashboardSettings extends Model
{
    use HasFactory;
    use Actionable;
    
    protected $fillable = [
        'name', 'slug', 'data', 'created_at', 'updated_at'
    ];
}
