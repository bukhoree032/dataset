<?php


namespace Modules\Household\Breadcrumb\Admin;


class MemberBreadcrumb
{
    public static function index()
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
                'label' => 'ข้อมูลสมาชิก',
                'link' => ''
            ]
        ];
    }

    public static function step1()
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
                'label' => 'ข้อมูลสมาชิก',
                'link' => route('admin.household.info.member.index', [request()->store, request()->info])
            ],
            [
                'label' => 'ข้อมูลส่วนที่ 1',
                'link' => ''
            ],
        ];
    }

    public static function step2()
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
                'label' => 'ข้อมูลสมาชิก',
                'link' => route('admin.household.info.member.index', [request()->store, request()->info])
            ],
            [
                'label' => 'ข้อมูลส่วนที่ 2',
                'link' => ''
            ],
        ];
    }
}