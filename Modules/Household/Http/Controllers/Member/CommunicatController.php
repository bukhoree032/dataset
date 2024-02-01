<?php

namespace Modules\Household\Http\Controllers\Member;

use App\Http\Controllers\BaseMemberManageController;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;
use Modules\Household\Http\Requests\HouseholdCommunicatRequest;
use Modules\Household\Repositories\HouseholdCommunicatRepository as Repository;

class CommunicatController extends BaseMemberManageController
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
                'class_name' => 'CommunicatBreadcrumb'
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

        return $this->render('household::member.info.communicat.create', $data);
    }


    /**
     * @param HouseholdCommunicatRequest $request
     * @param $id
     * @param $info_id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(HouseholdCommunicatRequest $request, $id, $info_id)
    {
        // $a = [
        //     'HOUSEHOLD_COMUNICAT_OCCUP_ID' => 15,
        //     'HOUSEHOLD_COMUNICAT_OCCUP_ID_OTHER' => 'a'
        // ];

        // $result = $this->repository->create($a);
        $this->repository->create($request->all());

        return redirect()->route('member.household.index');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($store, $info, $id)
    {
        $data['result'] = $this->repository->get($id);
        // dd($data['result']);
        return $this->render('household::member.info.communicat.edit', $data);
    }

    /**
     * @param HouseholdCommunicatRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(HouseholdCommunicatRequest $request, $store, $info, $id)
    {   
        $result = $this->repository->update($request->all(), $id);

        return redirect()->route('member.household.index');
    }
}
