<?php

namespace Modules\Household\Entities;

use Illuminate\Database\Eloquent\Model;

class HouseholdCommunicat extends Model
{
    protected $table = 'household_communicats';

    protected $fillable = [
        'HOUSEHOLD_COMUNICAT_OCCUP_ID',
        'HOUSEHOLD_COMUNICAT_OCCUP_ID_OTHER',
        'SUGGESTION',
        'household_info_id'
    ];

    public function householdInfo()
    {
        return $this->hasOne(HouseholdInfo::class, 'household_info_id', 'id');
    }
}
