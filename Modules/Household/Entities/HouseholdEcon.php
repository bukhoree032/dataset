<?php

namespace Modules\Household\Entities;

use Illuminate\Database\Eloquent\Model;

class HouseholdEcon extends Model
{
    protected $table = 'household_econs';

    protected $fillable = [
        'HOUSEHOLD_ECON_INCOME_TYPE',
        'HOUSEHOLD_ECON_INCOME',
        'HOUSEHOLD_ECON_INCOME_DATEDIFF',
        'HOUSEHOLD_ECON_EXP_SUM',
        'HOUSEHOLD_ECON_EXP',
        'HOUSEHOLD_ECON_HOUSE_LIST',
        'HOUSEHOLD_ECON_HOUSE_NO',
        'HOUSEHOLD_ECON_LAND',
        'HOUSEHOLD_ECON_LAND_SIZE',
        'HOUSEHOLD_ECON_AREA_LIST',
        'HOUSEHOLD_ECON_AREA_NO',
        'HOUSEHOLD_ECON_EQUIPMENT_TYPE',
        'HOUSEHOLD_ECON_EQUIPMENT_NUM',
        'HOUSEHOLD_ECON_VEHICLE_NUM',
        'HOUSEHOLD_ECON_VEHICLE_TYPE',
        'HOUSEHOLD_ECON_COM_DEVICE_TYPE',
        'HOUSEHOLD_ECON_COM_DEVICE_NUM',
        'HOUSEHOLD_ECON_PET_NUM',
        'HOUSEHOLD_ECON_PET_CATEG',
        'HOUSEHOLD_DEPT_AMOUNT',
        'HOUSEHOLD_ECON_DEPT_FROM_TYPE',
        'HOUSEHOLD_ECON_DEPT_FROM_TYPE_OTHER',
        'HOUSEHOLD_ECON_SPECIAL_FIN_',
        'HOUSEHOLD_ECON_COMM_BANK_',
        'HOUSEHOLD_ECON_COMM_BANK_OTHER',
        'HOUSEHOLD_ECON_NONBANK_',
        'HOUSEHOLD_ECON_NONBANK_OTHER',
        'HOUSEHOLD_ECON_COMMU_FUND_',
        'HOUSEHOLD_ECON_COMMU_FUND_OTHER',
        'HOUSEHOLD_ECON_SHARK_LOAN_',
        'HOUSEHOLD_ECON_H_SAVING_',
        'HOUSEHOLD_ECON_H_SAVING_OTHER',
        'HOUSEHOLD_ECON_OCCUP_PROBLEM_',
        'HOUSEHOLD_ECON_OCCUP_PROBLEM_OTHER',
        'HOUSEHOLD_ECON_LIVING_PROBLEM_',
        'HOUSEHOLD_ECON_LIVING_PROBLEM_OTHER',
        'household_info_id'
    ];

    public function householdInfo()
    {
        return $this->hasOne(HouseholdInfo::class, 'household_info_id', 'id');
    }
}
