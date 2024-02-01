<?php

namespace Modules\Household\Repositories;

use App\Repositories\BaseRepository;
use Modules\Household\Entities\HouseholdEnviro;
use Modules\Household\Repositories\HouseholdEnviroRepository as Repository;

class HouseholdEnviroRepository extends BaseRepository
{
    public function __construct()
    {
        $this->init([
            'class_model_name' => HouseholdEnviro::class
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
        $result->HOUSEHOLD_ENVIR_WLIGHT  = unserialize($result->HOUSEHOLD_ENVIR_WLIGHT);
        $result->HOUSEHOLD_ENVIR_CLEAN  = unserialize($result->HOUSEHOLD_ENVIR_CLEAN);
        $result->HOUSEHOLD_ENVIR_SAFE  = unserialize($result->HOUSEHOLD_ENVIR_SAFE);
        $result->HOUSEHOLD_ENVIR_BIN  = unserialize($result->HOUSEHOLD_ENVIR_BIN);
        $result->HOUSEHOLD_ENVIR_H_ENVI  = unserialize($result->HOUSEHOLD_ENVIR_H_ENVI);
        $result->HOUSEHOLD_ENVIR_TOXIC  = unserialize($result->HOUSEHOLD_ENVIR_TOXIC);
        $result->HOUSEHOLD_ENVIR_WATER  = unserialize($result->HOUSEHOLD_ENVIR_WATER);
        $result->HOUSEHOLD_ENVIR_DRINKING  = unserialize($result->HOUSEHOLD_ENVIR_DRINKING);
        $result->HOUSEHOLD_ENVIR_CONTAINER  = unserialize($result->HOUSEHOLD_ENVIR_CONTAINER);
        $result->HOUSEHOLD_ENVIR_COOKING  = unserialize($result->HOUSEHOLD_ENVIR_COOKING);
        $result->HOUSEHOLD_ENVIR_WATER_USED  = unserialize($result->HOUSEHOLD_ENVIR_WATER_USED);
        $result->HOUSEHOLD_ENVIR_CONTAINER_USED  = unserialize($result->HOUSEHOLD_ENVIR_CONTAINER_USED);
        $result->HOUSEHOLD_ENVIR_AREA  = unserialize($result->HOUSEHOLD_ENVIR_AREA);
        $result->HOUSEHOLD_ENVIR_ENV_ACT  = unserialize($result->HOUSEHOLD_ENVIR_ENV_ACT);
        $result->HOUSEHOLD_ENVIR_ELECTRIC  = unserialize($result->HOUSEHOLD_ENVIR_ELECTRIC);
        $result->HOUSEHOLD_ENVIR_CONSERV  = unserialize($result->HOUSEHOLD_ENVIR_CONSERV);
        $result->HOUSEHOLD_ENVIR_DISASTER  = unserialize($result->HOUSEHOLD_ENVIR_DISASTER);
        $result->HOUSEHOLD_ENVIR_SOLUTION  = unserialize($result->HOUSEHOLD_ENVIR_SOLUTION);
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
