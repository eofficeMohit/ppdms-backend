<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Binafy\LaravelUserMonitoring\Traits\Actionable;

class DashboardSettings extends Model
{
    use HasFactory,Actionable;
    protected $fillable = [
        'name', 'slug', 'data', 'created_at', 'updated_at'
    ];
}
