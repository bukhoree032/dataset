<?php

namespace Modules\Dashboard\Http\Controllers\Admin;

use App\Http\Controllers\BaseManageController;
use Auth;

use Illuminate\Http\Request;
// use Modules\Member\Repositories\MemberRepository  as Repository;
use Modules\Household\Repositories\StoreRepository as Repository;
use Modules\Household\Repositories\HouseholdMemberRepository as HouseholdMemberRepository;
use Modules\Member\Repositories\MemberRepository  as MemberRepository;

class DashboardController extends BaseManageController
{
	public function __construct(Repository $Repository, HouseholdMemberRepository $HouseholdMemberRepository, MemberRepository $MemberRepository)
	{
        $this->Repository = $Repository;
        $this->HouseholdMemberRepository = $HouseholdMemberRepository;
        $this->MemberRepository = $MemberRepository;

		$this->init([
			'body' => [
				'app_title' => [
					'h1' => '<i class="fas fa-tachometer-alt"></i> Dashboard',
					'p' => 'ภาพรวมของระบบ'
				],
			],
            'permission_prefix' => 'dashboard'
		]);

	}

	public function index()
	{
		$day = '2000-02-10 00:00:00';
		$today = '3000-02-10 23:59:59';
		$data['scripts'] = [
			asset('assets/node_modules/chart.js/dist/Chart.min.js'),
		];
		
		$data['householdSum'] = 0;
		$data['householdYala'] = 0;
		$data['householdNara'] = 0;
		$data['householdPat'] = 0;
		$data['householdOther'] = 0;

		$data['lists'] = $this->Repository->paginate_all($day ,$today);
		$data['MemberSum'] = $this->HouseholdMemberRepository->CountMemberAll([] ,$day ,$today);
		$data['MemberYala'] = $this->HouseholdMemberRepository->CountMember([], '75' ,$day ,$today);
		$data['MemberNara'] = $this->HouseholdMemberRepository->CountMember([], '76' ,$day ,$today);
		$data['MemberPat'] = $this->HouseholdMemberRepository->CountMember([], '74' ,$day ,$today);
		$data['listHouseholdAll'] = $this->MemberRepository->listHouseholdAll();
		$data['MemberOther'] = ($data['MemberSum'])-($data['MemberYala']+$data['MemberNara']+$data['MemberPat']);
		// dd($data['lists']);

		$AMPHURE_Sum = [];
		$AMPHURE_Yala = [];
		$AMPHURE_Nara = [];
		$AMPHURE_Pat = [];
		$AMPHURE_Other = [];

		$DISTRICT_Sum = [];
		$DISTRICT_Yala = [];
		$DISTRICT_Nara = [];
		$DISTRICT_Pat = [];
		$DISTRICT_Other = [];

		$Moo_Sum = [];
		$Moo_Yala = [];
		$Moo_Nara = [];
		$Moo_Pat = [];
		$Moo_Other = [];

		foreach($data['lists'] as $index => $value){
			if(isset($value->householdInfo)){
				$data['householdSum']++;
				$AMPHURE_Sum[$index] = $value->householdInfo->HOUSEHOLD_INFO_AMPHURE;
				$DISTRICT_Sum[$index] = $value->householdInfo->HOUSEHOLD_INFO_DISTRICT;
				$Moo_Sum[$index] = $value->householdInfo->HOUSEHOLD_INFO_MOO;
				if($value->householdInfo->HOUSEHOLD_INFO_PROVINCE == '75'){
					$data['householdYala']++;
					$AMPHURE_Yala[$index] = $value->householdInfo->HOUSEHOLD_INFO_AMPHURE;
					$DISTRICT_Yala[$index] = $value->householdInfo->HOUSEHOLD_INFO_DISTRICT;
					$Moo_Yala[$index] = $value->householdInfo->HOUSEHOLD_INFO_MOO;
				}else if($value->householdInfo->HOUSEHOLD_INFO_PROVINCE == '76'){
					$data['householdNara']++;
					$AMPHURE_Nara[$index] = $value->householdInfo->HOUSEHOLD_INFO_AMPHURE;
					$DISTRICT_Nara[$index] = $value->householdInfo->HOUSEHOLD_INFO_DISTRICT;
					$Moo_Nara[$index] = $value->householdInfo->HOUSEHOLD_INFO_MOO;
				}else if($value->householdInfo->HOUSEHOLD_INFO_PROVINCE == '74'){
					$data['householdPat'] ++;
					$AMPHURE_Pat[$index] = $value->householdInfo->HOUSEHOLD_INFO_AMPHURE;
					$DISTRICT_Pat[$index] = $value->householdInfo->HOUSEHOLD_INFO_DISTRICT;
					$Moo_Pat[$index] = $value->householdInfo->HOUSEHOLD_INFO_MOO;
				}else{
					$data['householdOther']++;
					$AMPHURE_Other[$index] = $value->householdInfo->HOUSEHOLD_INFO_AMPHURE;
					$DISTRICT_Other[$index] = $value->householdInfo->HOUSEHOLD_INFO_DISTRICT;
					$Moo_Other[$index] = $value->householdInfo->HOUSEHOLD_INFO_MOO;
				}
			}
		}
		$data['AMPHURESum'] = count(array_unique($AMPHURE_Sum));
		$data['AMPHUREYala'] = count(array_unique($AMPHURE_Yala));
		$data['AMPHURENara'] = count(array_unique($AMPHURE_Nara));
		$data['AMPHUREPat'] = count(array_unique($AMPHURE_Pat));
		$data['AMPHUREOther'] = count(array_unique($AMPHURE_Other));
		
		$data['DISTRICTSum'] = count(array_unique($DISTRICT_Sum));
		$data['DISTRICTYala'] = count(array_unique($DISTRICT_Yala));
		$data['DISTRICTNara'] = count(array_unique($DISTRICT_Nara));
		$data['DISTRICTPat'] = count(array_unique($DISTRICT_Pat));
		$data['DISTRICTOther'] = count(array_unique($DISTRICT_Other));
		
		$Moo_Sum = array_unique($Moo_Sum);
		$Moo_Yala = array_unique($Moo_Yala);
		$Moo_Nara = array_unique($Moo_Nara);
		$Moo_Pat = array_unique($Moo_Pat);
		$Moo_Other = array_unique($Moo_Other);
		// dd($data['MemberSum']."/".$data['MemberYala']."/".$data['MemberNara']."/".$data['MemberPat']."/".$data['MemberOther']);
		// dd($data['householdSum']."/".$data['householdYala']."/".$data['householdNara']."/".$data['householdPat']."/".$data['householdOther']);
		return $this->render('dashboard::index', $data);
	}

	public function index_search(Request $request)
	{
		if($request->DATE == ''){
			$day = '2000-02-10 00:00:00';
		}else{
			$day = $request->DATE.' 00:00:00';
		}

		if($request->TODATE == ''){
			$today = '3000-02-10 23:59:59';
		}else{
			$today = $request->TODATE.' 23:59:59';
		}
		
		$data['scripts'] = [
			asset('assets/node_modules/chart.js/dist/Chart.min.js'),
		];
		
		$data['householdSum'] = 0;
		$data['householdYala'] = 0;
		$data['householdNara'] = 0;
		$data['householdPat'] = 0;
		$data['householdOther'] = 0;

		$data['lists'] = $this->Repository->paginate_all($day ,$today);
		$data['MemberSum'] = $this->HouseholdMemberRepository->CountMemberAll([] ,$day ,$today);
		$data['MemberYala'] = $this->HouseholdMemberRepository->CountMember([], '75' ,$day ,$today);
		$data['MemberNara'] = $this->HouseholdMemberRepository->CountMember([], '76' ,$day ,$today);
		$data['MemberPat'] = $this->HouseholdMemberRepository->CountMember([], '74' ,$day ,$today);
		$data['listHouseholdAll'] = $this->MemberRepository->listHouseholdAll();
		$data['MemberOther'] = ($data['MemberSum'])-($data['MemberYala']+$data['MemberNara']+$data['MemberPat']);
		// dd($data['lists']);

		$AMPHURE_Sum = [];
		$AMPHURE_Yala = [];
		$AMPHURE_Nara = [];
		$AMPHURE_Pat = [];
		$AMPHURE_Other = [];

		$DISTRICT_Sum = [];
		$DISTRICT_Yala = [];
		$DISTRICT_Nara = [];
		$DISTRICT_Pat = [];
		$DISTRICT_Other = [];

		$Moo_Sum = [];
		$Moo_Yala = [];
		$Moo_Nara = [];
		$Moo_Pat = [];
		$Moo_Other = [];

		foreach($data['lists'] as $index => $value){
			if(isset($value->householdInfo)){
				$data['householdSum']++;
				$AMPHURE_Sum[$index] = $value->householdInfo->HOUSEHOLD_INFO_AMPHURE;
				$DISTRICT_Sum[$index] = $value->householdInfo->HOUSEHOLD_INFO_DISTRICT;
				$Moo_Sum[$index] = $value->householdInfo->HOUSEHOLD_INFO_MOO;
				if($value->householdInfo->HOUSEHOLD_INFO_PROVINCE == '75'){
					$data['householdYala']++;
					$AMPHURE_Yala[$index] = $value->householdInfo->HOUSEHOLD_INFO_AMPHURE;
					$DISTRICT_Yala[$index] = $value->householdInfo->HOUSEHOLD_INFO_DISTRICT;
					$Moo_Yala[$index] = $value->householdInfo->HOUSEHOLD_INFO_MOO;
				}else if($value->householdInfo->HOUSEHOLD_INFO_PROVINCE == '76'){
					$data['householdNara']++;
					$AMPHURE_Nara[$index] = $value->householdInfo->HOUSEHOLD_INFO_AMPHURE;
					$DISTRICT_Nara[$index] = $value->householdInfo->HOUSEHOLD_INFO_DISTRICT;
					$Moo_Nara[$index] = $value->householdInfo->HOUSEHOLD_INFO_MOO;
				}else if($value->householdInfo->HOUSEHOLD_INFO_PROVINCE == '74'){
					$data['householdPat'] ++;
					$AMPHURE_Pat[$index] = $value->householdInfo->HOUSEHOLD_INFO_AMPHURE;
					$DISTRICT_Pat[$index] = $value->householdInfo->HOUSEHOLD_INFO_DISTRICT;
					$Moo_Pat[$index] = $value->householdInfo->HOUSEHOLD_INFO_MOO;
				}else{
					$data['householdOther']++;
					$AMPHURE_Other[$index] = $value->householdInfo->HOUSEHOLD_INFO_AMPHURE;
					$DISTRICT_Other[$index] = $value->householdInfo->HOUSEHOLD_INFO_DISTRICT;
					$Moo_Other[$index] = $value->householdInfo->HOUSEHOLD_INFO_MOO;
				}
			}
		}
		$data['AMPHURESum'] = count(array_unique($AMPHURE_Sum));
		$data['AMPHUREYala'] = count(array_unique($AMPHURE_Yala));
		$data['AMPHURENara'] = count(array_unique($AMPHURE_Nara));
		$data['AMPHUREPat'] = count(array_unique($AMPHURE_Pat));
		$data['AMPHUREOther'] = count(array_unique($AMPHURE_Other));
		
		$data['DISTRICTSum'] = count(array_unique($DISTRICT_Sum));
		$data['DISTRICTYala'] = count(array_unique($DISTRICT_Yala));
		$data['DISTRICTNara'] = count(array_unique($DISTRICT_Nara));
		$data['DISTRICTPat'] = count(array_unique($DISTRICT_Pat));
		$data['DISTRICTOther'] = count(array_unique($DISTRICT_Other));
		
		$Moo_Sum = array_unique($Moo_Sum);
		$Moo_Yala = array_unique($Moo_Yala);
		$Moo_Nara = array_unique($Moo_Nara);
		$Moo_Pat = array_unique($Moo_Pat);
		$Moo_Other = array_unique($Moo_Other);
		// dd($data['MemberSum']."/".$data['MemberYala']."/".$data['MemberNara']."/".$data['MemberPat']."/".$data['MemberOther']);
		// dd($data['householdSum']."/".$data['householdYala']."/".$data['householdNara']."/".$data['householdPat']."/".$data['householdOther']);
		return $this->render('dashboard::index', $data);
	}
}
