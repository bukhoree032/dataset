<?php


namespace Modules\Household\Breadcrumb\Member;


class EconBreadcrumb
{
    public static function create()
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
                'label' => 'ข้อมูลส่วนที่ 3',
                'link' => ''
            ],
        ];
    }
}