<?php

namespace Modules\Household\Entities;

use Illuminate\Database\Eloquent\Model;

class HouseholdEnviro extends Model
{
    protected $table = 'household_enviros';

    protected $fillable = [
        'HOUSEHOLD_ENVIR_WLIGHT',
        'HOUSEHOLD_ENVIR_CLEAN',
        'HOUSEHOLD_ENVIR_SAFE',
        'HOUSEHOLD_ENVIR_BIN',
        'HOUSEHOLD_ENVIR_H_ENVI',
        'HOUSEHOLD_ENVIR_H_ENVI_OTHER',
        'HOUSEHOLD_ENVIR_TOXIC',
        'HOUSEHOLD_ENVIR_WATER',
        'HOUSEHOLD_ENVIR_DRINKING',
        // 'HOUSEHOLD_ENVIR_CONTAINER',
        // 'HOUSEHOLD_ENVIR_CONTAINER_OTHER',
        'HOUSEHOLD_ENVIR_COOKING',
        'HOUSEHOLD_ENVIR_WATER_USED',
        // 'HOUSEHOLD_ENVIR_CONTAINER_USED',
        'HOUSEHOLD_ENVIR_AREA',
        'HOUSEHOLD_ENVIR_ENV_ACT',
        'HOUSEHOLD_ENVIR_ENV_ACT_OTHER',
        'HOUSEHOLD_ENVIR_ELECTRIC',
        'HOUSEHOLD_ENVIR_CONSERV',
        'HOUSEHOLD_ENVIR_CONSERV_OTHER',
        'HOUSEHOLD_ENVIR_DISASTER',
        'HOUSEHOLD_ENVIR_AREA_OCCUP_OTHER',
        'HOUSEHOLD_ENVIR_SOLUTION',
        'HOUSEHOLD_ENVIR_SOLUTION_OTHER',
        'household_info_id'
    ];

    public function householdInfo()
    {
        return $this->hasOne(HouseholdInfo::class, 'household_info_id', 'id');
    }
}
