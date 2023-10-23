<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Binafy\LaravelUserMonitoring\Traits\Actionable;

class District extends Model
{
    use HasFactory, Actionable;

    protected $fillable = ['name', 'd_code', 'state_id', 'd_name_hindi', 'status'];

    protected $casts = [
        'status' => 'boolean',
    ];

    public function state()
    {
        return $this->belongsTo(State::class);
    }
}
