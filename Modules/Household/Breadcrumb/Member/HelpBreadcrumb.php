<?php


namespace Modules\Household\Breadcrumb\Member;


class HelpBreadcrumb
{
    public static function index()
    {
        return [
            [
                'label' => 'ข้อมูลรายการ',
                'link' => route('member.household.index')
            ],
        ];
    }
}