<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'sender_id', 'receiver_id', 'module_id','user_id','url','notification_type','message','sender_status','receiver_status','seen','created_at','updated_at','notification_for','notification_for_ref','notification_to'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
