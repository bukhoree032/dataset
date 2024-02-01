<?php

namespace Modules\Household\Entities;

use Illuminate\Database\Eloquent\Model;

class HouseholdMember extends Model
{
    protected $table = 'household_members';

    protected $fillable = [
        'HOUSEHOLD_MEMBER_PNAME',
        'HOUSEHOLD_MEMBER_NAME',
        'HOUSEHOLD_MEMBER_SURNAME',
        'HOUSEHOLD_MEMBER_AGE',
        'HOUSEHOLD_MEMBER_SEX',
        'HOUSEHOLD_MEMBER_DOB',
        'HOUSEHOLD_MEMBER_HEIGHT',
        'HOUSEHOLD_MEMBER_WEIGHT',
        'HOUSEHOLD_MEMBER_NATIONALITY',
        'HOUSEHOLD_MEMBER_RELIGION',
        'household_info_id'
    ];

    public function householdInfo()
    {
        return $this->hasOne(HouseholdInfo::class, 'household_info_id', 'id');
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
        return $this->hasOne(HouseholdEcon::class, 'household_info_id', 'household_info_id');
    }

    public function householdEnviro()
    {
        return $this->hasOne(HouseholdEnviro::class, 'household_info_id', 'household_info_id');
    }

    public function householdPolitical()
    {
        return $this->hasOne(HouseholdPolitical::class, 'household_info_id', 'household_info_id');
    }

    public function householdCommunicat()
    {
        return $this->hasOne(HouseholdCommunicat::class, 'household_info_id','household_info_id');
    }
}
