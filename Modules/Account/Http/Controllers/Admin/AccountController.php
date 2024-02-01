<?php

namespace Modules\Account\Http\Controllers\Admin;

use App\Http\Controllers\BaseManageController;

use Modules\Account\Http\Requests\PasswordStoreRequest;

use Modules\Account\Repositories\AccountRepository  as Repository;
use Modules\User\Entities\User;
use Modules\User\Http\Requests\UserStoreRequese;

use Hash, Auth;

class AccountController extends BaseManageController
{
    protected $repository;

    public function __construct(Repository $repository)
    {
        $this->repository = $repository;

        $this->init([
            'body' => [
                'app_title' => [
                    'h1' => '<i class="fas fa-user-circle"></i> โปรไฟล์',
                    'p' => 'สามารถแก้ไขข้อมูลโปรไฟล์ได้'
                ]
            ],
            'breadcrumb' => [
                'class_name' => 'AdminAccountBreadcrumb'
            ]
        ]);
    }

    public function index()
    {
        $data['account'] = Auth::user();
        $data['provinces'] = $this->getProvinces();

        return $this->render('account::admin.index', $data);
    }

    private function setCreateValue($request)
    {
        $method = request()->method();
        if ($method == "POST") {
            $request['password'] = Hash::make($request['password']);
        }

        return $request;
    }

    public function update(UserStoreRequese $request, $id)
    {
        $this->repository->update($this->setCreateValue($request->all()), $id);

        return $this->repository->redirectToList();
    }

    public function password()
    {
        $this->init([
            'body' => [
                'app_title' => [
                    'h1' => '<i class="fa fa-tachometer-alt"></i> เปลี่ยนรหัสผ่าน',
                    'p' => 'สามารถแก้ไขข้อมูลรหัสผ่านได้'
                ]
            ],
            'breadcrumb' => [
                'class_name' => 'AdminAccountBreadcrumb'
            ]
        ]);

        $data['account'] = Auth::user();

        return $this->render('account::admin.password', $data);
    }

    public function passwordUpdate(PasswordStoreRequest $request, $id)
    {
        $account = User::find(auth()->user()->id);
        $account->password = Hash::make($request->new_password);
        if ($account->save()) {
            Auth::logout();
            return redirect()->route('login');
        }
    }
}
