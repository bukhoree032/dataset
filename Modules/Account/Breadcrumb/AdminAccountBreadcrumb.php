<?php


namespace Modules\Account\Breadcrumb;


class AdminAccountBreadcrumb
{
	public static function index()
	{
		return [
			[
				'label' => 'Dashboard',
				'link' => route('admin.dashboard.index')
			],
			[
				'label' => 'โปรไฟล์',
				'link' => ''
			]
		];
	}

	public static function password()
	{
		return [
			[
				'label' => 'Dashboard',
				'link' => route('admin.dashboard.index')
			],
			[
				'label' => 'เปลี่ยนรหัสผ่าน',
				'link' => ''
			]
		];
	}
}