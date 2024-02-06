<?php

namespace Modules\Household\Http\Controllers\Admin;

use App\Http\Controllers\BaseManageController;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Modules\Household\Http\Requests\HouseholdMemberRequest;
use Modules\Household\Http\Requests\HouseholdMemberGeneralRequest;
use Modules\Household\Http\Requests\HouseholdMemberHealthRequest;
use Modules\Household\Repositories\HouseholdMemberRepository as Repository;
use Modules\Household\Repositories\HouseholdMemberGeneralRepository as GeneralRepository;
use Modules\Household\Repositories\HouseholdMemberHealthRepository as HealthRepository;

class MemberController extends BaseManageController
{
    protected $repository;
    protected $generalRepository;
    protected $healthRepositoryRepository;

    public function __construct(Repository $repository, GeneralRepository $generalRepository, HealthRepository $healthRepositoryRepository)
    {
        $this->repository = $repository;
        $this->generalRepository = $generalRepository;
        $this->healthRepository = $healthRepositoryRepository;

        $this->init([
            'body' => [
                'app_title' => [
                    'h1' => '<i class="fas fa-users"></i> จัดการครัวเรือน',
                    'p' => 'สามารถ เพิ่มและแก้ไขข้อมูลสมาชิกได้',
                ],
            ],
            'breadcrumb' => [
                'class_name' => 'MemberBreadcrumb'
            ],
            'permission_prefix' => 'household'
        ]);
    }


    /**
     * @param $id
     * @param $info_id
     * @return Application|Factory|View
     */
    public function index($id, $info_id)
    {
        $data['store_id'] = $id;
        $data['info_id'] = $info_id;
        $data['lists'] = $this->repository->listOfInfo([], $info_id);

        return $this->render('household::admin.info.member.index', $data);
    }

    /**
     * @param Request $request
     * @param $id
     * @param $info_id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(HouseholdMemberRequest $request, $id, $info_id)
    {
        // $a = [
        //     'HOUSEHOLD_MEMBER_PNAME' => 'นาย',
        //     'HOUSEHOLD_MEMBER_NAME' => 'a',
        //     'HOUSEHOLD_MEMBER_SURNAME' => 'a',
        //     'HOUSEHOLD_MEMBER_DOB' => '2020-12-31',
        //     'HOUSEHOLD_MEMBER_CITIZENNUMBER' => '123',
        //     'HOUSEHOLD_MEMBER_WEIGHT' => '123',
        //     'HOUSEHOLD_MEMBER_NATIONALITY' => 'a',
        //     'HOUSEHOLD_MEMBER_RELIGION' => 'ศาสนาอิสลาม',
        // ];

        // $result = $this->repository->create($a);
        $this->repository->create($request->all());

        return redirect()->route('admin.household.info.member.index', [$id, $info_id]);
    }

    /**
     * @param $id
     * @param $info_id
     * @param $member_id
     * @return Application|Factory|View
     */
    public function step1($id, $info_id, $member_id)
    {
        $data['store_id'] = $id;
        $data['info_id'] = $info_id;
        $data['member_id'] = $member_id;

        return $this->render('household::admin.info.member.step1', $data);
    }

    /**
     * @param Request $request
     * @param $id
     * @param $info_id
     * @param $member_id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function step1Save(HouseholdMemberGeneralRequest $request, $id, $info_id, $member_id)
    {
        // $a = [
        //     'HOUSEHOLD_MEMBER_GENERAL_SKILL' => [
        //         '0' => 1,
        //         '1' => 2,
        //         '2' => 3,
        //         '20' => 21,
        //     ],
        //     'HOUSEHOLD_MEMBER_GENERAL_SKILL_OTHER' => 'aaa',
        //     'HOUSEHOLD_MEMBER_GENERAL_NATIONAL_LANG' => [
        //         '0' => 1,
        //         '1' => 2,
        //         '2' => 14,
        //     ],
        //     'HOUSEHOLD_MEMBER_GENERAL_NATIONAL_OTHER' => 'aaa',
        //     'HOUSEHOLD_MEMBER_GENERAL_LOCAL_LANG' => [
        //         '0' => 1,
        //         '1' => 2,
        //         '2' => 3,
        //         '3' => 12,
        //     ],
        //     'HOUSEHOLD_MEMBER_GENERAL_LOCAL_OTHER' => 'aa',
        //     'HOUSEHOLD_MEMBER_GENERAL_STATUS' => 4,
        //     'HOUSEHOLD_MEMBER_GENERAL_EDU_STATUS' => 2,
        //     'HOUSEHOLD_MEMBER_GENERAL_EDU_LEVEL' => 3,
        //     'HOUSEHOLD_MEMBER_GENERAL_READING_LEVEL' => 3,
        //     'HOUSEHOLD_MEMBER_GENERAL_WRITING_LEVEL' => 2,
        //     'HOUSEHOLD_MEMBER_GENERAL_CAL_LEVEL' => 1,
        //     'HOUSEHOLD_MEMBER_GENERAL_RELATIN_HEAD' => 2,
        //     'HOUSEHOLD_MEMBER_GENERAL_LIVING_STATUS' => 1,
        //     'HOUSEHOLD_MEMBER_GENERAL_OCCUP_DETAILS' => [
        //         '2' => 'aaaa',
        //     ],
        //     'HOUSEHOLD_MEMBER_GENERAL_OCCUP_ID' => 18,
        //     'HOUSEHOLD_MEMBER_GENERAL_OCCUP_ID_OTHER' => 1,
        //     'HOUSEHOLD_MEMBER_GENERAL_OCCUP_SUB_ID' => [
        //         '1' => 2,
        //         '12' => 13,
        //     ],
        //     'HOUSEHOLD_MEMBER_GENERAL_OCCUP_SUB_DETAILS' => [
        //         '1' => 'aaa',
        //     ],
        //     'HOUSEHOLD_MEMBER_GENERAL_OCCUP_SUB_ID_OTHER' => 'aa',
        //     'HOUSEHOLD_MEMBER_GENERAL_AREA_OCCUP' => 1
        // ];

        // $result = $this->generalRepository->create($a);
       $result = $this->generalRepository->create($request->all());

        return redirect()->route('admin.household.info.member.step2', [$id, $info_id, $member_id]);
    }

    /**
     * @param $id
     * @param $info_id
     * @param $member_id
     * @return Application|Factory|View
     */
    public function step2($id, $info_id, $member_id)
    {
        $data['store_id'] = $id;
        $data['info_id'] = $info_id;
        $data['member_id'] = $member_id;

        return $this->render('household::admin.info.member.step2', $data);
    }

    /**
     * @param Request $request
     * @param $id
     * @param $info_id
     * @param $member_id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function step2Save(HouseholdMemberHealthRequest $request, $id, $info_id, $member_id)
    {

        // $a = [
        //     'HOUSEHOLD_MEMBER_HEALTH_RISK' => [
        //         '0' => 1,
        //         '1' => 2,
        //         '2' => 3,
        //         '3' => 4,
        //         '4' => 5,
        //     ],
        //     'HOUSEHOLD_MEMBER_HEALTH_RISK_OCCUP' => [
        //         '1' => 2,
        //         '2' => 3,
        //         '3' => 4,
        //     ],
        //     'HOUSEHOLD_MEMBER_HEALTH_HCARE_' => [
        //         '0' => 1,
        //         '1' => 2,
        //         '3' => 4,
        //         '4' => 5,
        //     ],
        //     'HOUSEHOLD_MEMBER_HEALTH_EMERGENCY' => [
        //         '0' => 1,
        //         '1' => 2,
        //         '2' => 3,
        //     ],
        //     'HOUSEHOLD_MEMBER_HEALTH_C_ILLNESS' => [
        //         '1' => 2,
        //         '23' => 24,
        //     ],
        //     'HOUSEHOLD_MEMBER_HEALTH_C_ILLNESS_OTHER' => 'aaa',
        //     'HOUSEHOLD_MEMBER_HEALTH_CARER_' => [
        //         '0' => 1,
        //         '9' => 10,
        //         '10' => 11,
        //         '11' => 12,
        //     ],
        //     'HOUSEHOLD_MEMBER_HEALTH_CARER_OTHER' => [
        //         '9' => 'aaa',
        //         '10' => 'aaa',
        //         '11' => 'aaa',
        //     ],
        //     'HOUSEHOLD_MEMBER_HEALTH_W_CARE' => 9,
        //     'HOUSEHOLD_MEMBER_HEALTH_W_CARE_OTHER' => 'aaa',
        //     'HOUSEHOLD_MEMBER_HEALTH_P_CARE' => [
        //         '0' => 1,
        //         '1' => 2,
        //         '8' => 9,
        //     ],
        //     'HOUSEHOLD_MEMBER_HEALTH_P_CARE_OTHER' => 'aa',
        //     'HOUSEHOLD_MEMBER_HEALTH_ILLNESS' => [
        //         '0' => 1,
        //         '1' => 2,
        //     ],
        //     'HOUSEHOLD_MEMBER_HEALTH_BENEFIT' => [
        //         '0' => 1,
        //         '1' => 2.1,
        //         '2' => 2.2,
        //         '3' => 2.3,
        //     ],
        //     'HOUSEHOLD_MEMBER_HEALTH_BENEFIT_TYPE' => [
        //         '0' => 1,
        //         '1' => 2,
        //         '2' => 3,
        //     ]
        // ];

        // $result = $this->healthRepository->create($a);
        $result = $this->healthRepository->create($request->all());
        
        return redirect()->route('admin.household.info.member.index', [$id, $info_id]);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($store, $info, $id)
    {
        $data['result'] = $this->repository->get($id);
        // dd($data['result']);
        return $this->render('household::admin.info.member.edit', $data);
    }

    /**
     * @param HouseholdMemberRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(HouseholdMemberRequest $request, $store, $info, $id)
    {
        $result = $this->repository->update($request->all(), $id);

        return redirect()->route('admin.household.info.member.index', [$store, $info]);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function step1edit($store, $info, $member, $id)
    {
        $data['result'] = $this->generalRepository->get($id);
        
        return $this->render('household::admin.info.member.step1_edit', $data);
        
    }
    
    /**
     * @param HouseholdMemberGeneralRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function step1update(HouseholdMemberGeneralRequest $request, $store, $info, $member, $id)
    {
        $result = $this->generalRepository->update($request->all(), $id);
        // dd($result);
        return redirect()->route('admin.household.info.member.index', [$store, $info]);
    }

    public function step2edit($store, $info, $member, $id)
    {
        $data['result'] = $this->healthRepository->get($id);
        
        return $this->render('household::admin.info.member.step2_edit', $data);
    }
    
    /**
     * @param HouseholdMemberHealthRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function step2update(HouseholdMemberHealthRequest $request, $store, $info, $member, $id)
    {
        $result = $this->healthRepository->update($request->all(), $id);
        // dd($result);
        return redirect()->route('admin.household.info.member.index', [$store, $info]);
    }
}
