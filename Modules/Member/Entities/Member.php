<?php

namespace Modules\Member\Entities;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Modules\Household\Entities\Store;
use Modules\Household\Entities\householdInfo;
use Modules\Household\Entities\householdMember;

/**
 * @method static where(string $string, $username)
 * @method static create(array $array)
 */
class Member extends Authenticatable
{
    use Notifiable;

    protected $guard = 'member';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'password',
        'name',
        'pay',
        'nickname',
        'email',
        'remark',
        'type',
        'province_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function store()
    {
        return $this->hasMany(Store::class, 'member_id');
    }
    
    public function householdInfo()
    {
        return $this->hasOne(HouseholdInfo::class, 'store_id');
    }

    public function householdMember()
    {
        return $this->belongsTo(HouseholdMember::class, 'id', 'household_info_id');
    }
}
