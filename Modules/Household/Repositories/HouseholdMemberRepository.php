<?php

namespace Modules\Household\Repositories;

use App\Repositories\BaseRepository;
use Modules\Household\Entities\HouseholdMember;

class HouseholdMemberRepository extends BaseRepository
{
    public function __construct()
    {
        $this->init([
            'class_model_name' => HouseholdMember::class
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

        $sex = [
            'นาย'    => 'ชาย',
            'นาง'    => 'หญิง',
            'นางสาว' => 'หญิง',
            'เด็กชาย' => 'ชาย',
            'เด็กหญิง' => 'หญิง'
        ];

        $request['HOUSEHOLD_MEMBER_SEX'] = $sex[$request['HOUSEHOLD_MEMBER_PNAME']];
        
        list($byear)= explode("-",$request['HOUSEHOLD_MEMBER_DOB']);  
        $age=date('Y')-$byear;  
        if($age < 1 ){
            $age = $age+543;
        }
          
        $request['HOUSEHOLD_MEMBER_AGE'] = $age; 
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
     * @param array $sort
     * @param $info_id
     * @return \Illuminate\Support\Collection|mixed
     */
    public function listOfInfo($sort = [], $info_id = '1')
    {
        $q = $this->classModelName::query();
        if (empty($sort)) {
            $q->orderBy('id', 'ASC');
        } else {
            foreach ($sort as $field => $option) {
                $q->orderBy($field, $option);
            }
        }

        $q->where('household_info_id', $info_id);
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
     * @param array $sort
     * @param $info_id
     * @return \Illuminate\Support\Collection|mixed
     */
    public function listMember($sort = [], $info_id = '1')
    {
        $q = $this->classModelName::query();
        if (empty($sort)) {
            $q->orderBy('id', 'ASC');
        } else {
            foreach ($sort as $field => $option) {
                $q->orderBy($field, $option);
            }
        }

        $q->where('household_info_id', $info_id);
        $result = $q->get();
        foreach($result as $index => $value){
            if(isset($result[$index]->householdMemberGeneral)){
                $result[$index]->householdMemberGeneral->HOUSEHOLD_MEMBER_GENERAL_SKILL = unserialize($result[$index]->householdMemberGeneral->HOUSEHOLD_MEMBER_GENERAL_SKILL);
                $result[$index]->householdMemberGeneral->HOUSEHOLD_MEMBER_GENERAL_NATIONAL_LANG = unserialize($result[$index]->householdMemberGeneral->HOUSEHOLD_MEMBER_GENERAL_NATIONAL_LANG);
                $result[$index]->householdMemberGeneral->HOUSEHOLD_MEMBER_GENERAL_LOCAL_LANG = unserialize($result[$index]->householdMemberGeneral->HOUSEHOLD_MEMBER_GENERAL_LOCAL_LANG);
                $result[$index]->householdMemberGeneral->HOUSEHOLD_MEMBER_GENERAL_OCCUP_SUB_ID = unserialize($result[$index]->householdMemberGeneral->HOUSEHOLD_MEMBER_GENERAL_OCCUP_SUB_ID);
                $result[$index]->householdMemberGeneral->HOUSEHOLD_MEMBER_GENERAL_OCCUP_SUB_DETAILS = unserialize($result[$index]->householdMemberGeneral->HOUSEHOLD_MEMBER_GENERAL_OCCUP_SUB_DETAILS);
                if(isset($result[$index]->householdMemberGeneral->HOUSEHOLD_MEMBER_GENERAL_OCCUP_DETAILS)){
                    $result[$index]->householdMemberGeneral->HOUSEHOLD_MEMBER_GENERAL_OCCUP_DETAILS = unserialize($result[$index]->householdMemberGeneral->HOUSEHOLD_MEMBER_GENERAL_OCCUP_DETAILS);
                    foreach($result[$index]->householdMemberGeneral->HOUSEHOLD_MEMBER_GENERAL_OCCUP_DETAILS as $value){
                        if($value!=''){
                            $HOUSEHOLD_MEMBER_GENERAL_OCCUP_DETAILS=$value;
                        }
                    }
                    if(isset($HOUSEHOLD_MEMBER_GENERAL_OCCUP_DETAILS)){
                        $result[$index]->householdMemberGeneral->HOUSEHOLD_MEMBER_GENERAL_OCCUP_DETAILS = $HOUSEHOLD_MEMBER_GENERAL_OCCUP_DETAILS;
                    }else{
                        $result[$index]->householdMemberGeneral->HOUSEHOLD_MEMBER_GENERAL_OCCUP_DETAILS = '';
                    }
                }
            }
            
            if(isset($result[$index]->householdMemberHealth)){
                $result[$index]->householdMemberHealth->HOUSEHOLD_MEMBER_HEALTH_RISK = unserialize($result[$index]->householdMemberHealth->HOUSEHOLD_MEMBER_HEALTH_RISK);
                $result[$index]->householdMemberHealth->HOUSEHOLD_MEMBER_HEALTH_RISK_OCCUP = unserialize($result[$index]->householdMemberHealth->HOUSEHOLD_MEMBER_HEALTH_RISK_OCCUP);
                $result[$index]->householdMemberHealth->HOUSEHOLD_MEMBER_HEALTH_HCARE = unserialize($result[$index]->householdMemberHealth->HOUSEHOLD_MEMBER_HEALTH_HCARE);
                $result[$index]->householdMemberHealth->HOUSEHOLD_MEMBER_HEALTH_EMERGENCY = unserialize($result[$index]->householdMemberHealth->HOUSEHOLD_MEMBER_HEALTH_EMERGENCY);
                $result[$index]->householdMemberHealth->HOUSEHOLD_MEMBER_HEALTH_C_ILLNESS = unserialize($result[$index]->householdMemberHealth->HOUSEHOLD_MEMBER_HEALTH_C_ILLNESS);
                $result[$index]->householdMemberHealth->HOUSEHOLD_MEMBER_HEALTH_CARER_ = unserialize($result[$index]->householdMemberHealth->HOUSEHOLD_MEMBER_HEALTH_CARER_);
                $result[$index]->householdMemberHealth->HOUSEHOLD_MEMBER_HEALTH_CARER_OTHER = unserialize($result[$index]->householdMemberHealth->HOUSEHOLD_MEMBER_HEALTH_CARER_OTHER);
                $result[$index]->householdMemberHealth->HOUSEHOLD_MEMBER_HEALTH_P_CARE = unserialize($result[$index]->householdMemberHealth->HOUSEHOLD_MEMBER_HEALTH_P_CARE);
                $result[$index]->householdMemberHealth->HOUSEHOLD_MEMBER_HEALTH_ILLNESS = unserialize($result[$index]->householdMemberHealth->HOUSEHOLD_MEMBER_HEALTH_ILLNESS);
                $result[$index]->householdMemberHealth->HOUSEHOLD_MEMBER_HEALTH_BENEFIT = unserialize($result[$index]->householdMemberHealth->HOUSEHOLD_MEMBER_HEALTH_BENEFIT);
                $result[$index]->householdMemberHealth->HOUSEHOLD_MEMBER_HEALTH_BENEFIT_TYPE = unserialize($result[$index]->householdMemberHealth->HOUSEHOLD_MEMBER_HEALTH_BENEFIT_TYPE);
            }
        }
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
     * @param array $sort
     * @param $info_id
     * @return \Illuminate\Support\Collection|mixed
     */
    public function CountMember($sort = [], $info_id = '1', $day = '2000-02-10 00:00:00', $today = '3000-02-10 23:59:59')
    {   
        $result = \DB::table('household_members')
            ->select([
                'household_members.household_info_id',
                'household_infos.id',
            ])
            ->join('household_infos', 'household_members.household_info_id', '=', 'household_infos.id')
            ->where('HOUSEHOLD_INFO_PROVINCE', '=', $info_id)
            ->whereBetween('household_members.created_at', [$day, $today])
            // r
            ->count();
            
        return $result;
    }

    

    /**
     * @param array $sort
     * @param $info_id
     * @return \Illuminate\Support\Collection|mixed
     */
    public function CountMemberAll($sort = [],$day = '2000-02-10 00:00:00', $today = '3000-02-10 23:59:59')
    {   
        $result = \DB::table('household_members')
            ->select([
                'household_members.household_info_id',
                'household_infos.id',
            ])
            ->join('household_infos', 'household_members.household_info_id', '=', 'household_infos.id')
            ->whereBetween('household_members.created_at', [$day, $today])
            // r
            ->count();
            
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
