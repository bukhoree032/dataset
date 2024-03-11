<?php

namespace Modules\Household\Entities;

use Illuminate\Database\Eloquent\Model;

class Help extends Model
{
    protected $table = 'help';

    protected $fillable = [
        'HE_ID',
        'HE_NAME',
        'HE_RECEIVE_KNOW',
        'HE_RECEIVE',
        'HE_YEAR',
        'HE_DATE',
    ];

    // public function householdInfo()
    // {
    //     return $this->hasOne(HouseholdInfo::class, 'store_id');
    // }

    // public function householdMember()
    // {
    //     return $this->belongsTo(HouseholdMember::class, 'id', 'household_info_id');
    // }
    
    // public function householdMemberGeneral()
    // {
    //     return $this->belongsTo(HouseholdMemberGeneral::class, 'id', 'household_members_id');
    // }

    // public function householdMemberHealth()
    // {
    //     return $this->belongsTo(HouseholdMemberHealth::class, 'id', 'household_members_id');
    // }

    // public function householdEcon()
    // {
    //     return $this->hasOne(HouseholdEcon::class, 'household_info_id');
    // }

    // public function HouseholdEnviro()
    // {
    //     return $this->hasOne(HouseholdEnviro::class, 'household_info_id');
    // }

    // public function householdPolitical()
    // {
    //     return $this->hasOne(HouseholdPolitical::class, 'household_info_id');
    // }

    // public function householdCommunicat()
    // {
    //     return $this->hasOne(householdCommunicat::class, 'household_info_id');
    // }
}
