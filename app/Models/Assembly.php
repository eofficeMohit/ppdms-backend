<?php

namespace App\Models;

use Binafy\LaravelUserMonitoring\Traits\Actionable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Assembly extends Model
{

    use HasFactory;
    use Actionable;

    protected $dates = ['deleted_at'];
    /**
     * Write code on Method
     *
     * @return response()
     */
    protected $fillable = [
        'st_code', 'asmb_code', 'ac_type', 'pc_type','pc_id','district_id','state_id','asmb_name','ac_name_uni','status'
    ];

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function parliament()
    {
        return $this->belongsTo(Parliament::class, 'pc_id', 'id');
    }

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
