<?php

namespace Modules\Household\Repositories;

use App\Repositories\BaseRepository;
use Modules\Household\Entities\HouseholdInfo;

class HouseholdInfoRepository extends BaseRepository
{
    public function __construct()
    {
        $this->init([
            'class_model_name' => HouseholdInfo::class
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
        // $result->HOUSEHOLD_POLITICAL_COM_ELEC = unserialize($result->HOUSEHOLD_POLITICAL_COM_ELEC);

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

        $request['store_id'] = (int) request()->store;

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
