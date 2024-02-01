<?php


namespace Modules\Household\Breadcrumb\Member;


class StoreBreadcrumb
{
    public static function create()
    {
        return [
            [
                'label' => 'ข้อมูลรายการ',
                'link' => route('member.household.index')
            ],
            [
                'label' => 'เพิ่มข้อมูล',
                'link' => ''
            ]
        ];
    }
}