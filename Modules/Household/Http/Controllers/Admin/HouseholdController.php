<?php

namespace Modules\Household\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseManageController;
use Modules\Household\Repositories\StoreRepository as StoreRepository;

class HouseholdController extends BaseManageController
{
    protected $repository;
    protected $storeRepository;

    public function __construct(StoreRepository $storeRepository)
    {
        $this->storeRepository = $storeRepository;

        $this->init([
            'body' => [
                'app_title' => [
                    'h1' => '<i class="fas fa-users"></i> ข้อมูลครัวเรือน',
                    // 'p' => 'สามารถ เพิ่มและแก้ไขข้อมูลสมาชิกได้'
                    
                    // 'h1' => '<i class="fas fa-users"></i> จัดการครัวเรือน',
                    // 'p' => 'สามารถ เพิ่มและแก้ไขข้อมูลสมาชิกได้'
                ]
            ],
            'permission_prefix' => 'household'
        ]);
    }

    public function AMPHURE(Request $request)
    {
        $data = \DB::table('amphures')
                ->where('province_id', $request->id)
                ->get();
        return $data;
    }

    public function DISTRICT(Request $request)
    {
        $data = \DB::table('districts')
                ->where('amphure_id', $request->id)
                ->get();
        return $data;
    }

    public function index(Request $request)
    {
        if ($request->has('from') && $request->has('to')) {
            $query_string = "?" . http_build_query($request->all()) . "&export=xlxs";
        } else {
            $query_string = "?export=pdf";
        }

        if ($request->has('date') || $request->has('code')) {
            $data['lists'] = $this->repository->search([
                'date' => $request->input('date'),
                'code' => $request->input('code')
            ]);
        } else {
            $data['lists'] = $this->storeRepository->paginate();
        }
        $data['query_string'] = $query_string;
        $data['approveds'] = $this->getApproveds();

        return $this->render('household::admin.index', $data);
    }

    public function show(Request $request)
    {
        if ($request->has('from') && $request->has('to')) {
            $query_string = "?" . http_build_query($request->all()) . "&export=xlxs";
        } else {
            $query_string = "?export=pdf";
        }

        if ($request->has('date') || $request->has('code')) {
            $data['lists'] = $this->repository->search([
                'date' => $request->input('date'),
                'code' => $request->input('code')
            ]);
        } else {
            $data = $this->storeRepository->paginate_show();
            foreach($data['lists'] as $index => $value){
                $data['lists'][$index]->STORE_PERSON = unserialize($data['lists'][$index]->STORE_PERSON);
            }
            $data['provinces'] = $this->getProvinces();
        }
        $data['query_string'] = $query_string;
        $data['approveds'] = $this->getApproveds();

        return $this->render('household::admin.show', $data);
    }

    public function search(Request $request)
    {
        if ($request->has('from') && $request->has('to')) {
            $query_string = "?" . http_build_query($request->all()) . "&export=xlxs";
        } else {
            $query_string = "?export=pdf";
        }

        if ($request->has('date') || $request->has('code')) {
            $data['lists'] = $this->repository->search([
                'date' => $request->input('date'),
                'code' => $request->input('code')
            ]);
        } else {
            $data = $this->storeRepository->paginate_search($request);
            foreach($data['lists'] as $index => $value){
                $data['lists'][$index]->STORE_PERSON = unserialize($data['lists'][$index]->STORE_PERSON);
            }
            $data['provinces'] = $this->getProvinces();
        }
        $data['query_string'] = $query_string;
        $data['approveds'] = $this->getApproveds();

        return $this->render('household::admin.show', $data);
    }

    private function getApproveds()
    {
        $response = [];
        $result = $this->storeRepository->list();
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
