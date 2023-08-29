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
    public function assemblyBooths(): BelongsTo
    {
        return $this->belongsTo(Assembly::class, 'id', 'assemble_id');
    }
}
