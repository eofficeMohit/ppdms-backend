<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DashboardSettings extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'slug', 'data', 'created_at', 'updated_at'
    ];
}
