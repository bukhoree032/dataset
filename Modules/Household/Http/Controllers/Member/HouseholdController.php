<?php

namespace Modules\Household\Http\Controllers\Member;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseMemberManageController;
use Modules\Household\Repositories\StoreRepository as StoreRepository;
use Modules\Household\Repositories\HouseholdRepository as HouseholdRepository;

class HouseholdController extends BaseMemberManageController
{
    protected $repository;
    protected $storeRepository;
    protected $householdRepository;

    public function __construct(StoreRepository $storeRepository,HouseholdRepository $householdRepository)
    {
        $this->storeRepository = $storeRepository;
        $this->householdRepository = $householdRepository;

        $this->init([
            'body' => [
                'app_title' => [
                    'h1' => '<i class="fas fa-users"></i> จัดการครัวเรือน',
                    'p' => 'สามารถ เพิ่มและแก้ไขข้อมูลสมาชิกได้'
                ]
            ],
            'breadcrumb' => [
                'class_name' => 'HouseholdBreadcrumb'
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
    public function index(Request $request)
    {
        if ($request->has('from') && $request->has('to')) {
            $query_string = "?" . http_build_query($request->all()) . "&export=xlxs";
        } else {
            $query_string = "?export=pdf";
        }

        $data['lists'] = $this->householdRepository->historyOfMember();

        $data['query_string'] = $query_string;

        $data['approveds'] = $this->getApproveds();

        return $this->render('household::member.household', $data);
    }
    
    /**
     * Method index
     *
     * @param Request $request [explicite description]
     *
     * @return void
     */
    public function house(Request $request, $id)
    {
        $data['id'] = $id;
        
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
            $data['lists'] = $this->storeRepository->historyOfMember($id);
        }
        $data['query_string'] = $query_string;
        $data['approveds'] = $this->getApproveds();

        return $this->render('household::member.index', $data);
    }
    
    /**
     * Method index
     *
     * @param Request $request [explicite description]
     *
     * @return void
     */
    public function search(Request $request)
    {
        // $request->search
        $data['data'] = \DB::table('household')
            ->where('H_ID', 'LIKE','%'.$request->search.'%' )
            ->orwhere('H_NAME', 'LIKE','%'.$request->search.'%' )
            ->orwhere('H_DISTRICT', 'LIKE','%'.$request->search.'%' )
            ->orwhere('H_AMPHURE', 'LIKE','%'.$request->search.'%' )
            ->orwhere('H_PROVINCE', 'LIKE','%'.$request->search.'%' )
            ->orderBy('id','DESC')
            // ->whereBetween('household_members.created_at', [$day, $today])
            ->get();
        return $this->render('household::member.household', $data);
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
