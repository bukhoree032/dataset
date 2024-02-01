<?php

namespace Modules\Member\Http\Controllers\Admin;

use App\Http\Controllers\BaseManageController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Member\Entities\Member;

use Modules\Member\Http\Requests\ChangePasswordRequest;
use Modules\Member\Repositories\MemberRepository as Repository;
use Hash;

class ChangePasswordController extends BaseManageController
{

    protected $repository;

    public function __construct(Repository $repository)
    {
        $this->repository = $repository;

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


    private function getMember(){
        $result = Auth::guard('member')->user();

        return $result; 
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $data['member'] = Member::findOrFail($id);

        return $this->render('member::admin.changepassword.index', $data);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(ChangePasswordRequest $request, $id)
    {
        $user = Member::findOrFail($id);
        $user->password = Hash::make($request->input('password'));
        $user->save();

        return redirect()->route('admin.member.index');
    }
}
