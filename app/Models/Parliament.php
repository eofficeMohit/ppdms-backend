<?php

namespace App\Models;

use Binafy\LaravelUserMonitoring\Traits\Actionable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
  
class Parliament extends Model
{
    use HasFactory;
    use Actionable;
    
    protected $fillable = [
        'pc_no', 'pc_name', 'pc_type', 'state_id','created_at','updated_at'
    ];
    public function state(): BelongsTo
    {
        return $this->belongsTo(State::class, 'state_id', 'id');
    }
}
