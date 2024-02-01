<?php

namespace Modules\Setting\Repositories;

use App\Repositories\BaseRepository;
use Spatie\Permission\Models\Role;

class RoleRepository extends BaseRepository
{
	public function __construct()
	{
		$this->init([
			'class_model_name' => Role::class
		]);
	}

	public function ctlUploadOption()
	{
		return [
			'thumbnail' => [
				'width' => 640,
				'height' => 480,
				'watermark' => "watermark_01"
			],
		];
	}

	public function redirectToList(){
		return redirect()->route('admin.user.role.index');
	}
}