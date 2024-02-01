<?php

namespace Modules\Household\Http\Controllers\Member;

use App\Http\Controllers\BaseMemberManageController;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Modules\Household\Http\Requests\HouseholdInfoRequest;
use Modules\Household\Repositories\HouseholdInfoRepository as Repository;

class InfoController extends BaseMemberManageController
{
    protected $repository;

    public function __construct(Repository $repository)
    {
        $this->repository = $repository;

        $this->init([
            'body' => [
                'app_title' => [
                    'h1' => '<i class="fas fa-users"></i> จัดการครัวเรือน',
                    'p' => 'สามารถ เพิ่มและแก้ไขข้อมูลสมาชิกได้',
                ],
            ],
            'breadcrumb' => [
                'class_name' => 'InfoBreadcrumb'
            ],
        ]);
    }


    /**
     * @param $id
     * @return Application|Factory|View
     */
    public function create($id)
    {
        $data['store_id'] = $id;
        $data['provinces'] = $this->getProvinces();

        $data['scripts'] = [
            asset('assets/@site_control/js/app/modules/info/controllers/info.controller.js'),
            asset('assets/@site_control/js/app/modules/info/providers/info.provider.js'),
        ];

        return $this->render('household::member.info.create', $data);
    }


    /**
     * @param HouseholdInfoRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(HouseholdInfoRequest $request, $id)
    {
        // $a = [
        //     'HOUSEHOLD_INFO_PROVINCE' => '75',
        //     'HOUSEHOLD_INFO_AMPHURE' => '977',
        //     'HOUSEHOLD_INFO_DISTRICT' => '950101',
        //     'HOUSEHOLD_INFO_MOO' => '1',
        //     'HOUSEHOLD_INFO_VIL_NAME' => 'a',
        //     'HOUSEHOLD_INFO_COMMU_NAME' => 'a',
        //     'HOUSEHOLD_INFO_ADDRESS' => '123',
        //     'HOUSEHOLD_INFO_HOUSE_CODE' => '123',
        //     'HOUSEHOLD_INFO_HOUSE_NEAR' => '123',
        //     'HOUSEHOLD_INFO_SOI' => 'a',
        //     'HOUSEHOLD_INFO_ROAD' => 'a',
        //     'HOUSEHOLD_INFO_LOCAL_LAT' => '123',
        //     'HOUSEHOLD_INFO_LOCAL_LONG' => '123',
        // ];

        // $result = $this->repository->create($a);
        $result = $this->repository->create($request->all());

        return redirect()->route('member.household.info.member.index', [$id, $result->id]);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($store, $id)
    {
        $data['result'] = $this->repository->get($id);
        $data['provinces'] = $this->getProvinces();

        $data['scripts'] = [
            asset('assets/@site_control/js/app/modules/info/controllers/info.controller.js'),
            asset('assets/@site_control/js/app/modules/info/providers/info.provider.js'),
        ];
        return $this->render('household::member.info.edit', $data);
    }

    /**
     * @param HouseholdInfoRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(HouseholdInfoRequest $request, $store, $id)
    {
        $result = $this->repository->update($request->all(), $id);

        return redirect()->route('member.household.index');
    }
}
