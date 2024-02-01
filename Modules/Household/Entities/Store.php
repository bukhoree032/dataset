<?php

namespace Modules\Household\Entities;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $table = 'stores';

    protected $fillable = [
        'STORE_PERSON',
        'STORE_DATE',
        'STORE_TIME',
        'STORE_TO_TIME',
        'STORE_FORM_ROUND',
        'STORE_FORM_NUMBER',
        'STORE_COLLECTOR',
        'STORE_CHECK',
        'STORE_SAVE',
        'STORE_PERSON',
        'member_id'
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
