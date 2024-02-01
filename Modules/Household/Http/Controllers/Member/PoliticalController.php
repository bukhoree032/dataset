<?php

namespace Modules\Household\Http\Controllers\Member;

use App\Http\Controllers\BaseMemberManageController;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;
use Modules\Household\Http\Requests\HouseholdPoliticalRequest;
use Modules\Household\Repositories\HouseholdPoliticalRepository as Repository;

class PoliticalController extends BaseMemberManageController
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
                'class_name' => 'PoliticalBreadcrumb'
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

        return $this->render('household::member.info.political.create', $data);
    }

    /**
     * @param $id
     * @param $info_id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(HouseholdPoliticalRequest $request, $id, $info_id)
    {
        // $a = [
        //     'HOUSEHOLD_POLITICAL_COM_ELEC' => [
        //         '0' => 2,
        //         '1' => 3,
        //         '2' => 12,
        //     ],
        //     'HOUSEHOLD_POLITICAL_COM_ELEC_OTHER' => 'aaa',
        //     'HOUSEHOLD_POLITICAL_HH_CONFLICT' => [
        //         '0' => 'ไม่มี',
        //         '1' => '1'
        //     ],
        //     'HOUSEHOLD_POLITICAL_CONFLICT_OTHER' => [
        //         '0' => 1,
        //         '1' => 2
        //     ],
        // ];

        // $result = $this->repository->create($a);
        $this->repository->create($request->all());

        return redirect()->route('member.household.info.communicat.create', [$id, $info_id]);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($store, $info, $id)
    {
        $data['result'] = $this->repository->get($id);
        
        return $this->render('household::member.info.political.edit', $data);
    }

    /**
     * @param HouseholdPoliticalRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(HouseholdPoliticalRequest $request, $store, $info, $id)
    {
        $result = $this->repository->update($request->all(), $id);

        return redirect()->route('member.household.index');
        // return redirect()->route('admin.household.info.political.edit', [$store, $info, $result->id]);
    }
}
