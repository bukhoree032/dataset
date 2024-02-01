<?php

namespace Modules\Member\Http\Controllers;

use App\Http\Controllers\BaseManageController;
use Illuminate\Support\Facades\Hash;

use Modules\Member\Http\Requests\MemberStoreRequest;
use Modules\Member\Repositories\MemberRepository  as Repository;

class MemberController extends BaseManageController
{
    protected $repository;

    public function __construct(Repository $repository)
    {
        $this->repository = $repository;

        $this->init([
            'body' => [
                'app_title' => [
                    'h1' => ic_image('ic-x24-family.png', 30).' จัดการสมาชิก',
                    'p' => 'สามารถ เพิ่มและแก้ไขข้อมูลสมาชิกได้',
                ],
            ],
        ]);
    }

    public function index()
    {
        return $this->render('member::index');
    }

    public function register()
    {
        $data['provinces'] = $this->getProvinces();

        return $this->render('member::register', $data);
    }

    private function getAttribute($request)
    {
        $request['type'] = 'General';

        return $request;
    }

    public function registerStore(MemberStoreRequest $request)
    {
        $this->repository->create($this->getAttribute($request->all()));

        return redirect()->route('member.login');
    }
}
