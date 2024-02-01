<?php


namespace Modules\Household\Breadcrumb\Admin;


class StoreBreadcrumb
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
                'label' => 'เพิ่มข้อมูล',
                'link' => ''
            ]
        ];
    }

    public static function edit()
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
                'label' => 'แก้ไขข้อมูล',
                'link' => ''
            ]
        ];
    }
}