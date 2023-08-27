<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Booth extends Model
{
    use HasFactory;

    /**
     * Get the assembly that owns the booths
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function assembly(): BelongsTo
    {
        return $this->hasOne(Assembly::class, 'id', 'assemble_id');
    }

    public function state()
    {
        return $this->hasOne(State::class,'state_id');
    }

    public function district()
    {
        return $this->hasOne(District::class,'district_id');
    }

}
