<?php

namespace Modules\Household\Entities;

use Illuminate\Database\Eloquent\Model;

class HouseholdMemberHealth extends Model
{
    protected $table = 'household_member_healths';

    protected $fillable = [
        'HOUSEHOLD_MEMBER_HEALTH_RISK',
        'HOUSEHOLD_MEMBER_HEALTH_RISK_OCCUP',
        'HOUSEHOLD_MEMBER_HEALTH_HCARE',
        'HOUSEHOLD_MEMBER_HEALTH_EMERGENCY',
        'HOUSEHOLD_MEMBER_HEALTH_C_ILLNESS',
        'HOUSEHOLD_MEMBER_HEALTH_C_ILLNESS_OTHER',
        'HOUSEHOLD_MEMBER_HEALTH_CARER_',
        'HOUSEHOLD_MEMBER_HEALTH_CARER_OTHER',
        'HOUSEHOLD_MEMBER_HEALTH_W_CARE',
        'HOUSEHOLD_MEMBER_HEALTH_W_CARE_OTHER',
        'HOUSEHOLD_MEMBER_HEALTH_P_CARE',
        'HOUSEHOLD_MEMBER_HEALTH_P_CARE_OTHER',
        'HOUSEHOLD_MEMBER_HEALTH_ILLNESS',
        'HOUSEHOLD_MEMBER_HEALTH_BENEFIT',
        'HOUSEHOLD_MEMBER_HEALTH_BENEFIT_TYPE',
        'household_members_id'
    ];

    public function householdMember()
    {
        return $this->hasOne(HouseholdMember::class, 'household_members_id', 'id');
    }
}
