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

class PayController extends BaseManageController
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
        DB::table('members')
            ->where('id', $id)
            ->update(['pay' => $request->pay]);
            return redirect()->route('admin.member.index');
    }


}
