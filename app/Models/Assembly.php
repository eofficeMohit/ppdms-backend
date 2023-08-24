<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use lluminate\Database\Eloquent\SoftDeletes;

class Assembly extends Model
{

    use HasFactory;

    //protected $dates = ['deleted_at'];
    /**
     * Write code on Method
     *
     * @return response()
     */
    protected $fillable = [
        'st_code', 'asmb_code', 'ac_type', 'pc_type','pc_no','district_id','state_id','asmb_name','ac_name_uni','status'
    ];

    public function state()
    {
        return $this->hasOne(State::class,'state_id');
    }

    public function district()
    {
        return $this->hasOne(District::class,'district_id');
    }
}
