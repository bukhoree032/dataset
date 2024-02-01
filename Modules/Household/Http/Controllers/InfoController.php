<?php

namespace Modules\Household\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Household\Repositories\HouseholdInfoRepository as Repository;

class InfoController extends Controller
{
    protected $repository;

    public function __construct(Repository $repository)
    {
    }

    public function getAmphures(Request $request)
    {
        $q = \DB::table('amphures')->select(['id', 'name_th'])->where('province_id', $request->input('province_id'));
        $response = $q->get();

        return response()->json($response, 200);
    }

    public function getDistricts(Request $request)
    {
        $q = \DB::table('districts')->select(['id', 'name_th'])->where('amphure_id', $request->input('amphure_id'));
        $response = $q->get();

        return response()->json($response, 200);
    }
}
