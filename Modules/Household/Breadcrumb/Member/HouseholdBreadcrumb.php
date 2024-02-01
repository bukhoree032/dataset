<?php


namespace Modules\Household\Breadcrumb\Member;


class HouseholdBreadcrumb
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