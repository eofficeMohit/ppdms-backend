<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ElectionInfo extends Model
{
    use HasFactory;

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function assembly()
    {
        return $this->belongsTo(Assembly::class);
    }
    
    public function booth()
    {
        return $this->belongsTo(Booth::class);
    }
}
