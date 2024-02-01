<?php

namespace Modules\Member\Http\Controllers\Admin;

use App\Http\Controllers\BaseManageController;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Hash, DB, Cache, Auth, Storage;

use Modules\Member\Http\Requests\MemberStoreRequest;
use Modules\Member\Repositories\MemberRepository  as Repository;
use Modules\Household\Repositories\StoreRepository as StoreRepository;

class HouseholdController extends BaseManageController
{
    protected $repository;

    public function __construct(Repository $repository, StoreRepository $StoreRepository)
    {
        $this->repository = $repository;
        $this->StoreRepository = $StoreRepository;

        $this->init([
            'body' => [
                'app_title' => [
                    'h1' => '<i class="fas fa-database"></i> จัดการสมาชิก',
                    'p' => 'สามารถ เพิ่มและแก้ไขข้อมูลสมาชิกได้',
                ],
            ],
            'breadcrumb' => [
                'class_name' => 'AdminMemberBreadcrumb'
            ],
            'permission_prefix' => 'member'
        ]);
    }

    public function index(Request $request, $id)
    {
        if ($request->has('from') && $request->has('to')) {
            $query_string = "?".http_build_query($request->all())."&export=pdf";
        } else {
            $query_string = "?export=pdf";
        }

        if ($request->has('date') || $request->has('code')) {
            $data['lists'] = $this->StoreRepository->search([
                'date' => $request->input('date'),
                'code' => $request->input('code'),
            ]);
        } else {
            $data['lists'] = $this->StoreRepository->historyOfMember($id);
        }
        $data['query_string'] = $query_string;
        $data['approveds'] = $this->getApproveds();

        return $this->render('member::admin.household.index', $data);
    }

    private function getApproveds()
    {
        $response = [];
        $result = $this->StoreRepository->list();
        foreach ($result as $value) {
            $sections = [
                'info' => false,
                'member' => false,
                'econ' => false,
                'enviro' => false,
                'political' => false,
                'communicate' => false
            ];

            if (isset($value->householdInfo->id)) {
                $sections['info'] = true;
            }
            if (isset($value->householdInfo->householdMember->id)) {
                $sections['member'] = true;
            }
            if (isset($value->householdInfo->householdEcon->id)) {
                $sections['econ'] = true;
            }
            if (isset($value->householdInfo->HouseholdEnviro->id)) {
                $sections['enviro'] = true;
            }
            if (isset($value->householdInfo->householdPolitical->id)) {
                $sections['political'] = true;
            }
            if (isset($value->householdInfo->householdCommunicat->id)) {
                $sections['communicate'] = true;
            }

            $response[$value->id] = $sections;
        }

        return $response;
    }
}
