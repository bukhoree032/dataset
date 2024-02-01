<?php


namespace Modules\Household\Breadcrumb\Admin;


class InfoBreadcrumb
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
                'link' => ''
            ]
        ];
    }
}