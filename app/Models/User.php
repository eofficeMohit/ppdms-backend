<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\hasMany;

class User extends Authenticatable
{
    use HasApiTokens,SoftDeletes,HasFactory,Notifiable,HasRoles;

    protected $dates = ['deleted_at'];
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'mobile_number',
        'alternate_mobile',
        'email_verified_at',
        'designation',
        'office_name',
        'dept_name',
        'ac_code',
        'api_key',
        'category',
        'start_from',
        'dest',
        'other_name',
        'last_pass',
        'sec_last_pass',
        'third_last_pass',
        'ac_active',
        'status',
        'no_of_login_attempts',
        'assemble_id',
        'district_id',
        'state_id',
        'remember_token',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    public function userAssembly()
    {
        return $this->hasMany(Assembly::class);
    }

    /**
     * Get the user that owns the assemblies
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function userAssemblies(): BelongsTo
    {
        return $this->belongsTo(Assembly::class, 'assemble_id', 'id');
    }

    /**
     * Get the user that owns the state
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function userState(): BelongsTo
    {
        return $this->belongsTo(State::class, 'state_id', 'id');
    }

    /**
     * Get the user that owns the district
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function userDistrict(): BelongsTo
    {
        return $this->belongsTo(District::class, 'district_id', 'id');
    }

     /**
     * Get the assembly that owns the booths
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function assemblyBooths(): BelongsTo
    {
        return $this->belongsTo(Booth::class, 'id', 'assemble_id');
    }

}
