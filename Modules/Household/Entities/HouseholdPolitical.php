<?php

namespace Modules\Household\Entities;

use Illuminate\Database\Eloquent\Model;

class HouseholdPolitical extends Model
{
    protected $table = 'household_politicals';

    protected $fillable = [
        'HOUSEHOLD_POLITICAL_COM_ELEC',
        'HOUSEHOLD_POLITICAL_COM_ELEC_NUM',
        'HOUSEHOLD_POLITICAL_COM_ELEC_OTHER',
        'household_info_id',
    ];

    public function householdInfo()
    {
        return $this->hasOne(HouseholdInfo::class, 'household_info_id', 'id');
    }
}
