<?php

namespace App\Models;

use Binafy\LaravelUserMonitoring\Traits\Actionable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\hasMany;

class Notification extends Model
{
    use HasFactory;
    use Actionable;

    protected $fillable = [
        'title', 'sender_id', 'receiver_id', 'module_id','user_id','url','notification_type','message','sender_status','receiver_status','seen','created_at','updated_at','notification_for','notification_for_reference','notification_to'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
