<?php

namespace Modules\Report\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Modules\Report\Exports\HouseholdExport;
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
                    'h1' => '<i class="fas fa-users"></i> จัดการครัวเรือน',
                    'p' => 'สามารถ เพิ่มและแก้ไขข้อมูลสมาชิกได้'
                ]
            ],
            'permission_prefix' => 'report_dataset'
        ]);
    }

    /**
     * index
     *
     * @param  mixed $request
     * @return void
     */
    public function index(Request $request)
    {
        if ($request->has('from') && $request->has('to')) {
            $query_string = "?" . http_build_query($request->all()) . "&export=xlxs";
        } else {
            $query_string = "?export=xlxs";
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

        return $this->render('report::admin.report.index', $data);
    }

    /**
     * exportExcel
     *
     * @param  mixed $from
     * @param  mixed $to
     * @return void
     */
    public function exportExcel($from = "", $to = "")
    {
        return Excel::download(new HouseholdExport, 'household.xlsx');
    }

}
