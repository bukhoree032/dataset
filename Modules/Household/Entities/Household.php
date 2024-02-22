<?php

namespace Modules\Household\Entities;

use Illuminate\Database\Eloquent\Model;

class household extends Model
{
    protected $table = 'household';

    protected $fillable = [
        'H_ID',
        'H_NAME',
        'H_HOUSE_NUMBER',
        'H_VILLAGE',
        'H_MOO',
        'H_PROVINCE',
        'H_AMPHURE',
        'H_DISTRICT',
        'H_TEL',
        'H_YEAR',
        'H_ACTIVITY'
    ];

    public function householdInfo()
    {
        return $this->hasOne(HouseholdInfo::class, 'store_id');
    }

    public function householdMember()
    {
        return $this->belongsTo(HouseholdMember::class, 'id', 'household_info_id');
    }
    
    public function householdMemberGeneral()
    {
        return $this->belongsTo(HouseholdMemberGeneral::class, 'id', 'household_members_id');
    }

    public function householdMemberHealth()
    {
        return $this->belongsTo(HouseholdMemberHealth::class, 'id', 'household_members_id');
    }

    public function householdEcon()
    {
        return $this->hasOne(HouseholdEcon::class, 'household_info_id');
    }

    public function HouseholdEnviro()
    {
        return $this->hasOne(HouseholdEnviro::class, 'household_info_id');
    }

    public function householdPolitical()
    {
        return $this->hasOne(HouseholdPolitical::class, 'household_info_id');
    }

    public function householdCommunicat()
    {
        return $this->hasOne(householdCommunicat::class, 'household_info_id');
    }
}
