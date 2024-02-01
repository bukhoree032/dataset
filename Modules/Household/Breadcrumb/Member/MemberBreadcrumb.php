<?php


namespace Modules\Household\Breadcrumb\Member;


class MemberBreadcrumb
{
    public static function index()
    {
        return [
            [
                'label' => 'ข้อมูลรายการ',
                'link' => route('member.household.index')
            ],
            [
                'label' => 'ข้อมูลครัวเรือน',
                'link' => route('member.household.info.create', [request()->store])
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
                'label' => 'ข้อมูลรายการ',
                'link' => route('member.household.index')
            ],
            [
                'label' => 'ข้อมูลครัวเรือน',
                'link' => route('member.household.info.create', [request()->store])
            ],
            [
                'label' => 'ข้อมูลสมาชิก',
                'link' => route('member.household.info.member.index', [request()->store, request()->info])
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
                'label' => 'ข้อมูลรายการ',
                'link' => route('member.household.index')
            ],
            [
                'label' => 'ข้อมูลครัวเรือน',
                'link' => route('member.household.info.create', [request()->store])
            ],
            [
                'label' => 'ข้อมูลสมาชิก',
                'link' => route('member.household.info.member.index', [request()->store, request()->info])
            ],
            [
                'label' => 'ข้อมูลส่วนที่ 2',
                'link' => ''
            ],
        ];
    }
}