<?php

namespace Modules\Household\Repositories;

use App\Repositories\BaseRepository;
use Modules\Household\Entities\HouseholdMemberGeneral;

class HouseholdMemberGeneralRepository extends BaseRepository
{
    public function __construct()
    {
        $this->init([
            'class_model_name' => HouseholdMemberGeneral::class
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

        $result->HOUSEHOLD_MEMBER_GENERAL_SKILL = unserialize($result->HOUSEHOLD_MEMBER_GENERAL_SKILL);
        $result->HOUSEHOLD_MEMBER_GENERAL_NATIONAL_LANG = unserialize($result->HOUSEHOLD_MEMBER_GENERAL_NATIONAL_LANG);
        $result->HOUSEHOLD_MEMBER_GENERAL_LOCAL_LANG = unserialize($result->HOUSEHOLD_MEMBER_GENERAL_LOCAL_LANG);
        $result->HOUSEHOLD_MEMBER_GENERAL_OCCUP_SUB_ID = unserialize($result->HOUSEHOLD_MEMBER_GENERAL_OCCUP_SUB_ID);
        $result->HOUSEHOLD_MEMBER_GENERAL_OCCUP_SUB_DETAILS = unserialize($result->HOUSEHOLD_MEMBER_GENERAL_OCCUP_SUB_DETAILS);
        $result->HOUSEHOLD_MEMBER_GENERAL_OCCUP_DETAILS = unserialize($result->HOUSEHOLD_MEMBER_GENERAL_OCCUP_DETAILS);
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
