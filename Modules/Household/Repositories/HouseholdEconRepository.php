<?php

namespace Modules\Household\Repositories;

use App\Repositories\BaseRepository;
use Modules\Household\Entities\HouseholdEcon;

class HouseholdEconRepository extends BaseRepository
{
    public function __construct()
    {
        $this->init([
            'class_model_name' => HouseholdEcon::class
        ]);
    }

    public function ctlUploadOption()
    {
        return [
            'crop' => [
                'width'  => 160,
                'height' => 160
            ]
        ];
    }

    /**
     * @param $id
     * @return mixed
     */
    public function get($id)
    {
        $result =  $this->classModelName::findOrFail($id);
        $result->HOUSEHOLD_ECON_INCOME_TYPE  = unserialize($result->HOUSEHOLD_ECON_INCOME_TYPE);
        $result->HOUSEHOLD_ECON_INCOME  = unserialize($result->HOUSEHOLD_ECON_INCOME);
        $result->HOUSEHOLD_ECON_EXP_SUM  = unserialize($result->HOUSEHOLD_ECON_EXP_SUM);
        $result->HOUSEHOLD_ECON_EXP  = unserialize($result->HOUSEHOLD_ECON_EXP);
        $result->HOUSEHOLD_ECON_HOUSE_LIST  = unserialize($result->HOUSEHOLD_ECON_HOUSE_LIST);
        $result->HOUSEHOLD_ECON_HOUSE_NO  = unserialize($result->HOUSEHOLD_ECON_HOUSE_NO);
        $result->HOUSEHOLD_ECON_LAND  = unserialize($result->HOUSEHOLD_ECON_LAND);
        $result->HOUSEHOLD_ECON_LAND_SIZE  = unserialize($result->HOUSEHOLD_ECON_LAND_SIZE);
        $result->HOUSEHOLD_ECON_AREA_LIST  = unserialize($result->HOUSEHOLD_ECON_AREA_LIST);
        $result->HOUSEHOLD_ECON_AREA_NO  = unserialize($result->HOUSEHOLD_ECON_AREA_NO);
        $result->HOUSEHOLD_ECON_EQUIPMENT_TYPE  = unserialize($result->HOUSEHOLD_ECON_EQUIPMENT_TYPE);
        $result->HOUSEHOLD_ECON_EQUIPMENT_NUM  = unserialize($result->HOUSEHOLD_ECON_EQUIPMENT_NUM);
        $result->HOUSEHOLD_ECON_VEHICLE_NUM  = unserialize($result->HOUSEHOLD_ECON_VEHICLE_NUM);
        $result->HOUSEHOLD_ECON_VEHICLE_TYPE  = unserialize($result->HOUSEHOLD_ECON_VEHICLE_TYPE);
        $result->HOUSEHOLD_ECON_COM_DEVICE_TYPE  = unserialize($result->HOUSEHOLD_ECON_COM_DEVICE_TYPE);
        $result->HOUSEHOLD_ECON_COM_DEVICE_NUM  = unserialize($result->HOUSEHOLD_ECON_COM_DEVICE_NUM);
        $result->HOUSEHOLD_ECON_PET_NUM  = unserialize($result->HOUSEHOLD_ECON_PET_NUM);
        $result->HOUSEHOLD_ECON_PET_CATEG  = unserialize($result->HOUSEHOLD_ECON_PET_CATEG);
        $result->HOUSEHOLD_ECON_DEPT_FROM_TYPE  = unserialize($result->HOUSEHOLD_ECON_DEPT_FROM_TYPE);
        $result->HOUSEHOLD_ECON_DEPT_FROM_TYPE_OTHER  = unserialize($result->HOUSEHOLD_ECON_DEPT_FROM_TYPE_OTHER);
        $result->HOUSEHOLD_ECON_SPECIAL_FIN_  = unserialize($result->HOUSEHOLD_ECON_SPECIAL_FIN_);
        $result->HOUSEHOLD_ECON_COMM_BANK_  = unserialize($result->HOUSEHOLD_ECON_COMM_BANK_);
        $result->HOUSEHOLD_ECON_COMM_BANK_OTHER  = unserialize($result->HOUSEHOLD_ECON_COMM_BANK_OTHER);
        $result->HOUSEHOLD_ECON_NONBANK_  = unserialize($result->HOUSEHOLD_ECON_NONBANK_);
        $result->HOUSEHOLD_ECON_NONBANK_OTHER  = unserialize($result->HOUSEHOLD_ECON_NONBANK_OTHER);
        $result->HOUSEHOLD_ECON_COMMU_FUND_  = unserialize($result->HOUSEHOLD_ECON_COMMU_FUND_);
        $result->HOUSEHOLD_ECON_COMMU_FUND_OTHER  = unserialize($result->HOUSEHOLD_ECON_COMMU_FUND_OTHER);
        $result->HOUSEHOLD_ECON_SHARK_LOAN_  = unserialize($result->HOUSEHOLD_ECON_SHARK_LOAN_);
        $result->HOUSEHOLD_ECON_H_SAVING_  = unserialize($result->HOUSEHOLD_ECON_H_SAVING_);
        $result->HOUSEHOLD_ECON_H_SAVING_OTHER  = unserialize($result->HOUSEHOLD_ECON_H_SAVING_OTHER);
        $result->HOUSEHOLD_ECON_OCCUP_PROBLEM_  = unserialize($result->HOUSEHOLD_ECON_OCCUP_PROBLEM_);
        $result->HOUSEHOLD_ECON_OCCUP_PROBLEM_OTHER  = unserialize($result->HOUSEHOLD_ECON_OCCUP_PROBLEM_OTHER);
        $result->HOUSEHOLD_ECON_LIVING_PROBLEM_  = unserialize($result->HOUSEHOLD_ECON_LIVING_PROBLEM_);
        $result->HOUSEHOLD_ECON_LIVING_PROBLEM_OTHER  = unserialize($result->HOUSEHOLD_ECON_LIVING_PROBLEM_OTHER);
        
        // dd($result);
        return $result;
    }

    /**
     * @param $request
     * @return mixed
     */
    public function create($request)
    {
        if (!empty($request)) {
            foreach ($request as $key => $value) {
                if (is_array($value)) {
                    $request[$key] = serialize($value);
                }
            }
        }

        $request['household_info_id'] = (int) request()->info;

        $result = $this->classModelName::create($request);
        if ($result) {
            if (isset($request['cover'])) {
                $this->classModelName::where('id', $result->id)->update([
                    'avatar' => $this->ctlUpload($_FILES['cover'], $result->id)
                ]);
            }
        }

        return $result;
    }

    /**
     * @param $request
     * @param $id
     * @return mixed
     */
    public function update($request, $id)
    {
        if (!empty($request)) {
            foreach ($request as $key => $value) {
                if (is_array($value)) {
                    $request[$key] = serialize($value);
                }
            }
        }

        $result = $this->classModelName::findOrFail($id);
        $cover = $result->cover;
        $result->update($request);
        if ($result) {
            if (isset($request['cover'])) {
                $this->storageDelete($id, $cover);

                $this->classModelName::where('id', $id)->update([
                    'avatar' => $this->ctlUpload($_FILES['cover'], $id)
                ]);
            }
        }

        return $result;
    }

}
