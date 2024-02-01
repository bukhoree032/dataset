<?php

namespace Modules\Household\Repositories;

use App\Repositories\BaseRepository;
use Modules\Household\Entities\HouseholdMemberHealth;

class HouseholdMemberHealthRepository extends BaseRepository
{
    public function __construct()
    {
        $this->init([
            'class_model_name' => HouseholdMemberHealth::class
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

        $result->HOUSEHOLD_MEMBER_HEALTH_RISK = unserialize($result->HOUSEHOLD_MEMBER_HEALTH_RISK);
        $result->HOUSEHOLD_MEMBER_HEALTH_RISK_OCCUP = unserialize($result->HOUSEHOLD_MEMBER_HEALTH_RISK_OCCUP);
        $result->HOUSEHOLD_MEMBER_HEALTH_HCARE = unserialize($result->HOUSEHOLD_MEMBER_HEALTH_HCARE);
        $result->HOUSEHOLD_MEMBER_HEALTH_EMERGENCY = unserialize($result->HOUSEHOLD_MEMBER_HEALTH_EMERGENCY);
        $result->HOUSEHOLD_MEMBER_HEALTH_C_ILLNESS = unserialize($result->HOUSEHOLD_MEMBER_HEALTH_C_ILLNESS);
        $result->HOUSEHOLD_MEMBER_HEALTH_CARER_ = unserialize($result->HOUSEHOLD_MEMBER_HEALTH_CARER_);
        $result->HOUSEHOLD_MEMBER_HEALTH_CARER_OTHER = unserialize($result->HOUSEHOLD_MEMBER_HEALTH_CARER_OTHER);
        $result->HOUSEHOLD_MEMBER_HEALTH_P_CARE = unserialize($result->HOUSEHOLD_MEMBER_HEALTH_P_CARE);
        $result->HOUSEHOLD_MEMBER_HEALTH_ILLNESS = unserialize($result->HOUSEHOLD_MEMBER_HEALTH_ILLNESS);
        $result->HOUSEHOLD_MEMBER_HEALTH_BENEFIT = unserialize($result->HOUSEHOLD_MEMBER_HEALTH_BENEFIT);
        $result->HOUSEHOLD_MEMBER_HEALTH_BENEFIT_TYPE = unserialize($result->HOUSEHOLD_MEMBER_HEALTH_BENEFIT_TYPE);
        
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

        $request['household_members_id'] = (int) request()->member;

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
