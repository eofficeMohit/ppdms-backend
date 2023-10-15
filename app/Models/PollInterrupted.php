<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Binafy\LaravelUserMonitoring\Traits\Actionable;

class PollInterrupted extends Model
{
    use HasFactory;
    protected $fillable = ['assemble_id', 'district_id', 'state_id', 'booth_id', 'event_id', 'user_id', 'interrupted_type', 'remarks', 'old_cu', 'old_bu', 'new_cu', 'new_bu', 'stop_time', 'resume_time', 'created_at', 'updated_at'];

    protected $casts = [
        'status' => 'boolean',
    ];

    public function electionState(): BelongsTo
    {
        return $this->belongsTo(State::class, 'state_id', 'id');
    }

    public function userId(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function interruptedType(): BelongsTo
    {
        return $this->belongsTo(PollInterruptedTypes::class, 'inter_type_id', 'id');
    }

    public function electionDistrict(): BelongsTo
    {
        return $this->belongsTo(District::class, 'district_id', 'id');
    }

    public function electionBooth(): BelongsTo
    {
        return $this->belongsTo(Booth::class, 'booth_id', 'id');
    }

    public function electionAssembly(): BelongsTo
    {
        return $this->belongsTo(Assembly::class, 'assemble_id', 'id');
    }

    public function electionEvent(): BelongsTo
    {
        return $this->belongsTo(Event::class, 'event_id', 'id');
    }
}
