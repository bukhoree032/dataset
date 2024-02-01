<?php


namespace Modules\Household\Breadcrumb\Admin;


class EnviroBreadcrumb
{
    public static function create()
    {
        return [
            [
                'label' => 'หน้าแรก',
                'link' => route('admin.dashboard.index')
            ],
            [
                'label' => 'ข้อมูลรายการ',
                'link' => route('admin.household.index')
            ],
            [
                'label' => 'ข้อมูลครัวเรือน',
                'link' => route('admin.household.info.create', [request()->store])
            ],
            [
                'label' => 'ข้อมูลส่วนที่ 4',
                'link' => ''
            ],
        ];
    }
}