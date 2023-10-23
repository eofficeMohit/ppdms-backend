<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Binafy\LaravelUserMonitoring\Traits\Actionable;

class District extends Model
{
    use HasFactory, Actionable;

    protected $fillable = ['name', 'd_code', 'state_id', 'd_name_hindi', 'status'];

    /**
     * Write code on Method
     *
     * @return response()
     */
    // protected $hidden = ['name', 'd_code', 'state_id', 'd_name_hindi', 'status'];

    /**
     * Write code on Method
     *
     * @return response()
     */
    //   protected $casts = [
    //      'name' => 'encrypted',
    //       'd_code' => 'encrypted',
    //       'state_id' => 'encrypted',
    //      'd_name_hindi' => 'encrypted',
    //      'status' => 'encrypted',
    //  ];

    public function state()
    {
        return $this->belongsTo(State::class);
    }
}
