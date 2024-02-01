<?php

namespace Modules\Household\Entities;

use Illuminate\Database\Eloquent\Model;

class HouseholdInfo extends Model
{
    protected $table = 'household_infos';

    protected $fillable = [
        'HOUSEHOLD_INFO_PROVINCE',
        'HOUSEHOLD_INFO_AMPHURE',
        'HOUSEHOLD_INFO_DISTRICT',
        'HOUSEHOLD_INFO_MOO',
        'HOUSEHOLD_INFO_VIL_NAME',
        'HOUSEHOLD_INFO_COMMU_NAME',
        'HOUSEHOLD_INFO_ADDRESS',
        'HOUSEHOLD_INFO_HOUSE_CODE',
        'HOUSEHOLD_INFO_HOUSE_NEAR',
        'HOUSEHOLD_INFO_SOI',
        'HOUSEHOLD_INFO_ROAD',
        'HOUSEHOLD_INFO_LOCAL_LAT',
        'HOUSEHOLD_INFO_LOCAL_LONG',
        'store_id',
    ];

    public function store()
    {
        return $this->belongsTo(Store::class, 'id', 'store_id');
    }

    public function householdMember()
    {
        return $this->hasOne(HouseholdMember::class, 'household_info_id');
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
        return $this->hasOne(HouseholdCommunicat::class, 'household_info_id');
    }
}
