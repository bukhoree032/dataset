<?php


namespace Modules\Setting\Breadcrumb;


class AdminRoleBreadcrumb
{
	public static function index()
	{
		return [
			[
				'label' => 'Dashboard',
				'link' => route('admin.dashboard.index')
			],
			[
				'label' => 'ข้อมูลรายการ',
				'link' => ''
			]
		];
	}

	public static function create()
	{
		return [
			[
				'label' => 'Dashboard',
				'link' => route('admin.dashboard.index')
			],
			[
				'label' => 'ข้อมูลรายการ',
				'link' => route('admin.user.role.index')
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
				'label' => 'Dashboard',
				'link' => route('admin.dashboard.index')
			],
			[
				'label' => 'ข้อมูลรายการ',
				'link' => route('admin.user.role.index')
			],
			[
				'label' => 'แก้ไขรายการ',
				'link' => ''
			]
		];
	}
}