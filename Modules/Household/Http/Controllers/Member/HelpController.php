<?php

namespace Modules\Household\Http\Controllers\Member;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseMemberManageController;
use Modules\Household\Repositories\HelpRepository as Repository;
use Modules\Household\Repositories\HouseholdRepository as HouseholdRepository;

class HelpController extends BaseMemberManageController
{
    protected $repository;
    protected $householdRepository;

    public function __construct(Repository $Repository,HouseholdRepository $householdRepository)
    {
        $this->Repository = $Repository;
        $this->householdRepository = $householdRepository;

        $this->init([
            'body' => [
                'app_title' => [
                    'h1' => '<i class="fas fa-users"></i> จัดการช่วยเหลือ',
                    'p' => 'สามารถ เพิ่มและแก้ไขข้อมูลช่วยเหลือได้'
                ]
            ],
            'breadcrumb' => [
                'class_name' => 'HelpBreadcrumb'
            ]
        ]);
    }
    
    /**
     * Method index
     *
     * @param Request $request [explicite description]
     *
     * @return void
     */
    public function index(Request $request, $id)
    {
        $data['id'] = $id;
        if ($request->has('from') && $request->has('to')) {
            $query_string = "?" . http_build_query($request->all()) . "&export=xlxs";
        } else {
            $query_string = "?export=pdf";
        }

        $data['lists'] = $this->Repository->historyOfMember($id);

        $data['query_string'] = $query_string;

        return $this->render('household::member.help.help', $data);
    }


    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create($id)
    {
        $data['id'] = $id;
        // $data['result'] = $this->HouseholdRepository->get($id);

        $data['provinces'] = $this->getProvinces();

        $data['scripts'] = [
            asset('assets/@site_control/js/app/modules/info/controllers/info.controller.js'),
            asset('assets/@site_control/js/app/modules/info/providers/info.provider.js'),
        ];

        return $this->render('household::member.help.create', $data);
    }


    /**
     * @param HouseholdStoreRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function help(Request $request)
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
         $result = $this->Repository->create($request->all());

         return redirect()->route('member.household.help', [$result->HE_ID]);
    }

    /**
     * @param HouseholdStoreRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function edit($id)
    {
        $data['lists'] = $this->Repository->get($id);

        return $this->render('household::member.help.edit', $data);
    }

    /**
     * @param HouseholdStoreRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $result = $this->Repository->update($request->all(), $request->id);

        return redirect()->route('member.household.help', [$request->HE_ID]);
    }

}
