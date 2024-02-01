<?php

namespace Modules\Household\Http\Controllers\Admin;

use App\Http\Controllers\BaseManageController;
use Modules\Household\Http\Requests\HouseholdCommunicatRequest;
use Modules\Household\Repositories\HouseholdCommunicatRepository as Repository;

class CommunicatController extends BaseManageController
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
            'permission_prefix' => 'household'
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

        return $this->render('household::admin.info.communicat.create', $data);
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

        return redirect()->route('admin.household.index');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($store, $info, $id)
    {
        $data['result'] = $this->repository->get($id);

        return $this->render('household::admin.info.communicat.edit', $data);
    }

    /**
     * @param HouseholdCommunicatRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(HouseholdCommunicatRequest $request, $store, $info, $id)
    {
        $result = $this->repository->update($request->all(), $id);

        return redirect()->route('admin.household.index');
        // return redirect()->route('admin.household.info.communicat.edit', [$store, $info, $result->id]);
    }
}
