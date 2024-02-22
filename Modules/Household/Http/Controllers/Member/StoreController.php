<?php

namespace Modules\Household\Http\Controllers\Member;

use App\Http\Controllers\BaseMemberManageController;
use Illuminate\Http\Request;
use Modules\Household\Http\Requests\HouseholdStoreRequest;
use Modules\Household\Repositories\StoreRepository as Repository;
use Modules\Household\Repositories\HouseholdRepository as HouseholdRepository;
use Modules\Household\Repositories\HouseholdInfoRepository as InfoRepository;
use Modules\Household\Repositories\HouseholdMemberRepository as MemberRepository;
use Modules\Household\Repositories\HouseholdEconRepository as EconRepository;
use Modules\Household\Repositories\HouseholdEnviroRepository as EnviroRepository;

class StoreController extends BaseMemberManageController
{
    protected $repository;
    protected $HouseholdRepository;
    protected $InfoRepository;
    protected $MemberRepository;
    protected $EconRepository;
    protected $EnviroRepository;

    public function __construct(Repository $repository,InfoRepository $InfoRepository, MemberRepository $MemberRepository, EconRepository $EconRepository, EnviroRepository $EnviroRepository, HouseholdRepository $HouseholdRepository)
    {
        $this->repository = $repository;
        $this->HouseholdRepository = $HouseholdRepository;
        $this->InfoRepository = $InfoRepository;
        $this->MemberRepository = $MemberRepository;
        $this->EconRepository = $EconRepository;
        $this->EnviroRepository = $EnviroRepository;

        $this->init([
            'body' => [
                'app_title' => [
                    'h1' => '<i class="fas fa-users"></i> จัดการครัวเรือน',
                    'p' => 'สามารถ เพิ่มและแก้ไขข้อมูลสมาชิกได้',
                ],
            ],
            'breadcrumb' => [
                'class_name' => 'StoreBreadcrumb'
            ],
        ]);
    }


    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create($id)
    {
        $data['result'] = $this->HouseholdRepository->get($id);

        $data['provinces'] = $this->getProvinces();

        $data['scripts'] = [
            asset('assets/@site_control/js/app/modules/info/controllers/info.controller.js'),
            asset('assets/@site_control/js/app/modules/info/providers/info.provider.js'),
        ];

        return $this->render('household::member.store.create', $data);
    }


    /**
     * @param HouseholdStoreRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(HouseholdStoreRequest $request)
    {
        // $a = [
        //     'STORE_DATE' => '2020-12-27',
        //     'STORE_TIME' => '19:06',
        //     'STORE_TO_TIME' => '19:06',
        //     'STORE_FORM_ROUND' => '1',
        //     'STORE_COLLECTOR' => 'นายบูคอรี สาเมาะ',
        //     'STORE_CHECK' => 'นายฮาดี ดอเลาะ',
        //     'STORE_SAVE' => 'นางสาวรอกีเยาะ สาและ',
        //     'STORE_PERSON' => [
        //         '0' => 'ผู้ให้คนที่ 1',
        //         '1' => 'ผู้ให้คนที่ 2',
        //         '2' => 'ผู้ให้คนที่ 3'],
        // ];

         $result = $this->repository->create($request->all());

         $id = $result->id;
         $result = $this->InfoRepository->createinfo($request->all(), $id);
 
         return redirect()->route('member.household.info.member.index', [$id, $result->id]);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $data['result'] = $this->repository->get($id);

        return $this->render('household::member.store.edit', $data);
    }

    /**
     * @param HouseholdStoreRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(HouseholdStoreRequest $request, $id)
    {
        $result = $this->repository->update($request->all(), $id);

        return redirect()->route('member.household.store.edit', $result->id);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $this->repository->destroy($id);

        return redirect()->route('member.household.index');
        // return $this->repository->redirectToList();
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function detail($id)
    {
        function format_number($str)
        {
            if($str == '-'){
                $str = 0;
            }else{
                $str = str_replace(",", "", $str);
            }
            return ($str);
        }

        $data['result'] = $this->repository->get($id);
        if(isset($data['result']->householdInfo->householdEcon->id)){
            $data['resultEcon'] = $this->EconRepository->get($data['result']->householdInfo->householdEcon->id);
        //     foreach($data['resultEcon']->HOUSEHOLD_ECON_INCOME_TYPE as $index => $value){
        //         $data['INCOME_TYPE'][$index] = format_number($data['resultEcon']->HOUSEHOLD_ECON_INCOME_TYPE[$index]);
        //     }
        //     foreach($data['resultEcon']->HOUSEHOLD_ECON_EXP_SUM as $index => $value){
        //         $data['ECON_EXP_SUM'][$index] = format_number($data['resultEcon']->HOUSEHOLD_ECON_EXP_SUM[$index]);
        //     }
        }
        if(isset($data['result']->householdInfo->HouseholdEnviro->id)){
            $data['resultEnviro'] = $this->EnviroRepository->get($data['result']->householdInfo->HouseholdEnviro->id);
        }
        if(isset($data['result']->householdInfo->id)){
            $data['resultMember'] = $this->MemberRepository->listMember([], $data['result']->householdInfo->id);
        }
        
        return $this->render('household::member.detail.detail', $data);
    }
}
