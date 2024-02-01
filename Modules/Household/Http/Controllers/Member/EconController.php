<?php

namespace Modules\Household\Http\Controllers\Member;

use App\Http\Controllers\BaseMemberManageController;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Modules\Household\Http\Requests\HouseholdEconRequest;
use Modules\Household\Repositories\HouseholdEconRepository as Repository;

class EconController extends BaseMemberManageController
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
                'class_name' => 'EconBreadcrumb'
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

        return $this->render('household::member.info.econ.create', $data);
    }

    /**
     * @param Request $request
     * @param $id
     * @param $info_id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(HouseholdEconRequest $request, $id, $info_id)
    {
        // $a = [
        //     'HOUSEHOLD_ECON_INCOME_TYPE' => [
        //         '1' => 800,
        //         '2' => 22000,
        //         '3' => 800,
        //         '4' => 8000,
        //         '5' => 800,
        //     ],
        //     'HOUSEHOLD_ECON_INCOME' => [
        //         '1' => [
        //             '0' => 1,
        //             '1' => 2,
        //         ],

        //         '2' => [
        //             '0' => 1,
        //             '1' => 2,
        //         ],

        //     ],
        //     'HOUSEHOLD_ECON_INCOME_DATEDIFF' => [
        //         '3' => [
        //             '0' => 1,
        //             '1' => 2,
        //             '4' => 5,
        //         ],

        //         '4' => [
        //             '0' => 1,
        //         ],

        //         '5' => [
        //             '0' => 1,
        //             '2' => 3,
        //         ],

        //     ],
        //     'HOUSEHOLD_ECON_EXP_SUM' => [
        //         '1' => 800,
        //         '2' => 800,
        //         '3' => 800,
        //         '4' => 800,
        //         '5' => 800,
        //         '6' => 800,
        //         '7' => 800,
        //         '8' => 800,
        //     ],
        //     'HOUSEHOLD_ECON_EXP' => [
        //         '1' => [
        //             '0' => 1,
        //             '3' => 4,
        //         ],

        //         '2' => [
        //             '0' => 1,
        //             '4' => 5,
        //             '5' => 6,
        //         ],

        //         '3' => [
        //             '1' => 2,
        //             '7' => 8,
        //         ],

        //         '4' => [
        //             '1' => 2,
        //             '4' => 5,
        //         ],

        //         '5' => [
        //             '0' => 1,
        //             '1' => 2,
        //         ],

        //         '6' => [
        //             '0' => 1,
        //             '1' => 2,
        //         ],

        //         '7' => [
        //             '0' => 1,
        //             '3' => 4,
        //         ],

        //         '8' => [
        //             '0' => 1,
        //             '1' => 2,
        //         ],
        //     ],
        //     'HOUSEHOLD_ECON_HOUSE_LIST' => [
        //         '0' => 1,
        //         '1' => 2,
        //     ],
        //     'HOUSEHOLD_ECON_HOUSE_NO' => [
        //         '0' => 111,
        //         '1' => 111,
        //     ],
        //     'HOUSEHOLD_ECON_LAND' => [
        //         '0' => 1,
        //         '1' => 2,
        //     ],
        //     'HOUSEHOLD_ECON_LAND_SIZE' => [
        //         '0' => 1111,
        //         '1' => 1111,
        //     ],
        //     'HOUSEHOLD_ECON_AREA_LIST' => [
        //         '0' => 1,
        //         '1' => 2,
        //     ],
        //     'HOUSEHOLD_ECON_EQUIPMENT_TYPE' => [
        //         '0' => 1,
        //         '15' => 16,
        //         '16' => 17,
        //     ],
        //     'HOUSEHOLD_ECON_EQUIPMENT_NUM' => [
        //         '0' => 1111,
        //         '15' => 1111,
        //         '16' => 1111,
        //     ],
        //     'HOUSEHOLD_ECON_VEHICLE_NUM' => [
        //         '3' => 1111,
        //         '4' => 111,
        //     ],
        //     'HOUSEHOLD_ECON_VEHICLE_TYPE' => [
        //         '3' => 4,
        //         '4' => 5,
        //     ],
        //     'HOUSEHOLD_ECON_COM_DEVICE_TYPE' => [
        //         '0' => 1,
        //         '1' => 2,
        //     ],
        //     'HOUSEHOLD_ECON_COM_DEVICE_NUM' => [
        //         '0' => 11111,
        //         '1' => 11111,
        //     ],
        //     'HOUSEHOLD_ECON_PET_NUM' => [
        //         '4' => 111,
        //         '5' => 1111,
        //         '6' => 1111,
        //     ],
        //     'HOUSEHOLD_ECON_PET_CATEG' => [
        //         '4' => 5,
        //         '5' => 6,
        //         '6' => 7,
        //     ],
        //     'HOUSEHOLD_DEPT_AMOUNT' => 5000,
        //     'HOUSEHOLD_ECON_DEPT_FROM_TYPE' => [
        //         '0' => 1,
        //         '10' => 11,
        //         '11' => 12,
        //     ],
        //     'HOUSEHOLD_ECON_DEPT_FROM_TYPE_OTHER' => [
        //         '11' => 'aaa',
        //     ],
        //     'HOUSEHOLD_ECON_SPECIAL_FIN_' => [
        //         '0' => 1,
        //         '1' => 2,
        //     ],
        //     'HOUSEHOLD_ECON_COMM_BANK_' => [
        //         '1' => 2,
        //         '2' => 3,
        //         '3' => 4,
        //         '7' => 8,
        //     ],
        //     'HOUSEHOLD_ECON_COMM_BANK_OTHER' => [
        //         '7' => 'aa',
        //     ],
        //     'HOUSEHOLD_ECON_NONBANK_' => [
        //         '0' => 1,
        //         '1' => 2,
        //         '2' => 3,
        //     ],
        //     'HOUSEHOLD_ECON_NONBANK_OTHER' => [
        //         '0' => 'aaa',
        //         '2' => 'aaaa',
        //     ],
        //     'HOUSEHOLD_ECON_COMMU_FUND_' => [
        //         '0' => 1,
        //         '1' => 2,
        //         '9' => 10,
        //     ],
        //     'HOUSEHOLD_ECON_COMMU_FUND_OTHER' => [
        //         '9' => 'aaa',
        //     ],
        //     'HOUSEHOLD_ECON_SHARK_LOAN_' => [
        //         '0' => 1,
        //         '1' => 2,
        //     ],
        //     'HOUSEHOLD_ECON_H_SAVING_' => [
        //         '4' => 5,
        //         '5' => 6,
        //         '14' => 15,
        //     ],
        //     'HOUSEHOLD_ECON_H_SAVING_OTHER' => [
        //         '5' => 'aa',
        //         '14' => 'aaa',
        //     ],
        //     'HOUSEHOLD_ECON_OCCUP_PROBLEM_' => [
        //         '4' => 5,
        //         '6' => 7,
        //     ],
        //     'HOUSEHOLD_ECON_OCCUP_PROBLEM_OTHER' => [
        //         '6' => 'aa',
        //     ],
        //     'HOUSEHOLD_ECON_LIVING_PROBLEM_' => [
        //         '1' => 2,
        //         '4' => 5,
        //     ],
        //     'HOUSEHOLD_ECON_LIVING_PROBLEM_OTHER' => [
        //         '4' => 'aa',
        //     ],
        // ];
        // $result = $this->repository->create($a);
       $this->repository->create($request->all());

        return redirect()->route('member.household.info.enviro.create', [$id, $info_id]);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($store, $info, $id)
    {
        $data['result'] = $this->repository->get($id);
        // dd($data['result']);
        return $this->render('household::member.info.econ.create_edit', $data);
    }

    /**
     * @param HouseholdEconRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(HouseholdEconRequest $request, $store, $info, $id)
    {
        // dd($request);
        $result = $this->repository->update($request->all(), $id);

        return redirect()->route('member.household.index');
    }
}
