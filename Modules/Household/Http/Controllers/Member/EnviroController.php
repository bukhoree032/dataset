<?php

namespace Modules\Household\Http\Controllers\Member;

use App\Http\Controllers\BaseMemberManageController;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;
use Modules\Household\Http\Requests\HouseholdEnviroRequest;
use Modules\Household\Repositories\HouseholdEnviroRepository as Repository;

class EnviroController extends BaseMemberManageController
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
                'class_name' => 'EnviroBreadcrumb'
            ],
        ]);
    }


    /**
     * @param $id
     * @param $info_id
     * @return Application|Factory|View
     */
    public function create($id, $info_id)
    {
        $data['store_id'] = $id;
        $data['info_id'] = $info_id;

        return $this->render('household::member.info.enviro.create', $data);
    }


    /**
     * @param HouseholdEnviroRequest $request
     * @param $id
     * @param $info_id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(HouseholdEnviroRequest $request, $id, $info_id)
    {
        // $a = [
        //     'HOUSEHOLD_ENVIR_WLIGHT' => [
        //         '0' => 'ไม่มี',
        //         '1' => '1',
        //     ],
        //     'HOUSEHOLD_ENVIR_CLEAN' => [
        //         '0' => 'ไม่มี',
        //         '1' => '1',
        //     ],
        //     'HOUSEHOLD_ENVIR_SAFE' => [
        //         '0' => 'ไม่มี',
        //         '1' => '1',
        //     ],
        //     'HOUSEHOLD_ENVIR_BIN' => [
        //         '0' => 'ไม่มี',
        //         '1' => '1',
        //         '2' => '2',
        //     ],
        //     'HOUSEHOLD_ENVIR_H_ENVI' => [
        //         '0' => 'ไม่มี',
        //         '1' => '1',
        //         '2' => '4',
        //     ],
        //     'HOUSEHOLD_ENVIR_H_ENVI_OTHER' => 'aa',
        //     'HOUSEHOLD_ENVIR_TOXIC' => [
        //         '0' => 'ไม่มี',
        //         '1' => '1',
        //     ],
        //     'HOUSEHOLD_ENVIR_WATER' => [
        //         '0' => 'ไม่มี',
        //         '1' => '1',
        //     ],
        //     'HOUSEHOLD_ENVIR_DRINKING' => [
        //         '0' => 'ไม่มี',
        //         '1' => '1',
        //         '2' => '2',
        //         '3' => '3',
        //     ],
        //     'HOUSEHOLD_ENVIR_CONTAINER' => [
        //         '0' => 'ไม่มี',
        //         '1' => '1',
        //         '2' => '2',
        //     ],
        //     'HOUSEHOLD_ENVIR_CONTAINER_OTHER' => [],
        //     'HOUSEHOLD_ENVIR_COOKING' => [
        //         '0' => 'ไม่มี',
        //         '1' => '1',
        //     ],
        //     'HOUSEHOLD_ENVIR_WATER_USED' => [
        //         '0' => 'ไม่มี',
        //         '1' => '1',
        //     ],
        //     'HOUSEHOLD_ENVIR_CONTAINER_USED' => [
        //         '0' => 'ไม่มี',
        //         '1' => '1',
        //     ],
        //     'HOUSEHOLD_ENVIR_AREA' => [
        //         '0' => 'ไม่มี',
        //         '1' => '1',
        //     ],
        //     'HOUSEHOLD_ENVIR_ENV_ACT' => [
        //         '0' => 'ไม่มี',
        //         '1' => '1',
        //         '2' => '9',
        //     ],
        //     'HOUSEHOLD_ENVIR_ENV_ACT_OTHER' => 'aaa',
        //     'HOUSEHOLD_ENVIR_ELECTRIC' => [
        //         '0' => '1',
        //     ],
        //     'HOUSEHOLD_ENVIR_CONSERV' => [
        //         '0' => 'ไม่มี',
        //         '1' => '6',
        //     ],
        //     'HOUSEHOLD_ENVIR_CONSERV_OTHER' => 'aa',
        //     'HOUSEHOLD_ENVIR_DISASTER' => [
        //         '0' => '8',
        //     ],
        //     'HOUSEHOLD_ENVIR_AREA_OCCUP_OTHER' => 'AA',
        //     'HOUSEHOLD_ENVIR_SOLUTION' => [
        //         '0' => '1',
        //         '1' => '2',
        //         '2' => '9',
        //     ],
        //     'HOUSEHOLD_ENVIR_SOLUTION_OTHER' => 'aaaa',
        // ];

        // $result = $this->repository->create($a);
        $this->repository->create($request->all());

        return redirect()->route('member.household.info.political.create', [$id, $info_id]);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($store, $info, $id)
    {
        $data['result'] = $this->repository->get($id);

        return $this->render('household::member.info.enviro.edit', $data);
    }

    /**
     * @param HouseholdEnviroRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(HouseholdEnviroRequest $request, $store, $info, $id)
    {
        $result = $this->repository->update($request->all(), $id);

        return redirect()->route('member.household.index');
    }
}
