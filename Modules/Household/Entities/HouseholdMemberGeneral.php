<?php

namespace Modules\Household\Entities;

use Illuminate\Database\Eloquent\Model;

class HouseholdMemberGeneral extends Model
{
    protected $table = 'household_member_generals';

    protected $fillable = [
        'HOUSEHOLD_MEMBER_GENERAL_SKILL',
        'HOUSEHOLD_MEMBER_GENERAL_SKILL_OTHER',
        'HOUSEHOLD_MEMBER_GENERAL_NATIONAL_LANG',
        'HOUSEHOLD_MEMBER_GENERAL_NATIONAL_OTHER',
        'HOUSEHOLD_MEMBER_GENERAL_LOCAL_LANG',
        'HOUSEHOLD_MEMBER_GENERAL_LOCAL_OTHER',
        'HOUSEHOLD_MEMBER_GENERAL_STATUS',
        'HOUSEHOLD_MEMBER_GENERAL_EDU_STATUS',
        'HOUSEHOLD_MEMBER_GENERAL_EDU_LEVEL',
        'HOUSEHOLD_MEMBER_GENERAL_READING_LEVEL',
        'HOUSEHOLD_MEMBER_GENERAL_WRITING_LEVEL',
        'HOUSEHOLD_MEMBER_GENERAL_CAL_LEVEL',
        'HOUSEHOLD_MEMBER_GENERAL_RELATIN_HEAD',
        'HOUSEHOLD_MEMBER_GENERAL_LIVING_STATUS',
        'HOUSEHOLD_MEMBER_GENERAL_OCCUP_DETAILS',
        'HOUSEHOLD_MEMBER_GENERAL_OCCUP_ID',
        'HOUSEHOLD_MEMBER_GENERAL_OCCUP_ID_OTHER',
        'HOUSEHOLD_MEMBER_GENERAL_OCCUP_SUB_ID',
        'HOUSEHOLD_MEMBER_GENERAL_OCCUP_SUB_DETAILS',
        'HOUSEHOLD_MEMBER_GENERAL_OCCUP_SUB_ID_OTHER',
        'HOUSEHOLD_MEMBER_GENERAL_AREA_OCCUP',
        'household_members_id'
    ];

    public function householdMember()
    {
        return $this->hasOne(HouseholdMember::class, 'household_members_id', 'id');
    }
}
