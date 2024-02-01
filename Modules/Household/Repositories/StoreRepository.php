<?php

namespace Modules\Household\Repositories;

use App\Repositories\BaseRepository;
use Modules\Household\Entities\Store;
use Auth;

class StoreRepository extends BaseRepository
{
    public function __construct()
    {
        $this->init([
            'class_model_name' => Store::class
        ]);
    }

    public function ctlUploadOption()
    {
        return [
            'crop' => [
                'width' => 160,
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
        $result = $this->classModelName::findOrFail($id);

        function extract_int($str){
            $str = explode(".",$str);
            if(isset($str[1])){
                return $str[1];
            }else{
                return $str[0];
            }
        }

        $result->STORE_PERSON = unserialize($result->STORE_PERSON);

        
        if(isset($result->householdInfo->householdPolitical)){
            $result->householdInfo->householdPolitical->HOUSEHOLD_POLITICAL_COM_ELEC = unserialize($result->householdInfo->householdPolitical->HOUSEHOLD_POLITICAL_COM_ELEC);
            foreach($result->householdInfo->householdPolitical->HOUSEHOLD_POLITICAL_COM_ELEC as $key_OCCUP_ID => $value_OCCUP_ID){
                $result1[$key_OCCUP_ID] = extract_int($value_OCCUP_ID);
                $result->householdInfo->householdPolitical->HOUSEHOLD_POLITICAL_COM_ELEC = $result1;
            }
        }  

        if(isset($result->householdInfo->householdCommunicat)){
            $result->householdInfo->householdCommunicat->HOUSEHOLD_COMUNICAT_OCCUP_ID = unserialize($result->householdInfo->householdCommunicat->HOUSEHOLD_COMUNICAT_OCCUP_ID);
            foreach($result->householdInfo->householdCommunicat->HOUSEHOLD_COMUNICAT_OCCUP_ID as $key_OCCUP_ID => $value_OCCUP_ID){
                $result1[$key_OCCUP_ID] = extract_int($value_OCCUP_ID);
                $result->householdInfo->householdCommunicat->HOUSEHOLD_COMUNICAT_OCCUP_ID = $result1;
            }
        }
        
        return $result;
    }

    /**
     * @param array $sort
     * @return mixed
     */
    public function list($sort = [])
    {
        $q = $this->classModelName::query();

        if(Auth::guard('member')->check()){
            $q->where('member_id', Auth::guard('member')->user()->id);
        }

        if (empty($sort)) {
            $q->orderBy('id', 'DESC');
        } else {
            foreach ($sort as $field => $option) {
                $q->orderBy($field, $option);
            }
        }

        $result = $q->get();
        return collect($result)->map(function ($item) {
            if (!isset($item->url)) {
                $uri = $item->id;
                if (isset($item->slug)) {
                    $uri = $item->slug;
                }

                $item->url = url($this->uriPrefix . '/view/' . $uri);
            }

            return $item;
        });
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

        if(Auth::guard('member')->check()){
            $request['member_id'] = Auth::guard('member')->user()->id;
        }

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

    /**
     * @param mixed $id
     * @param mixed $file_name
     * @return void
     */
    public function storageDelete($id, $file_name)
    {
        $exp = explode("\\", $this->classModelName);
        $folder = 'avatar/' . gen_folder($id);

        Storage::disk('public')->delete("$folder/$file_name");
        Storage::disk('public')->delete("$folder/crop/$file_name");
        Storage::disk('public')->delete("$folder/thumbnail/$file_name");
        Storage::disk('public')->delete("$folder/resize/$file_name");
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function historyOfMember($id)
    {
        $q = $this->classModelName::query();

        $q->where('member_id', $id);
        if (empty($sort)) {
            $q->orderBy('id', 'DESC');
        } else {
            foreach ($sort as $field => $option) {
                $q->orderBy($field, $option);
            }
        }

        return $q->paginate(20);
    }

}
