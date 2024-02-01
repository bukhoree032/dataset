<?php


namespace Modules\Household\Breadcrumb\Member;


class InfoBreadcrumb
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
                'link' => ''
            ]
        ];
    }
}