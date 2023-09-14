<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'd_code', 'state_id', 'd_name_hindi', 'status'
    ];

    public function state()
    {
        return $this->belongsTo(State::class);
    }
}
