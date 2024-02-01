<?php

namespace Modules\Setting\Breadcrumb;

use App\Breadcrumb\BaseBreadcrumb;

class AdminRoomBreadcrumb extends BaseBreadcrumb
{

    public function __construct()
    {
        $this->init([
            'prefix' => 'setting.room'
        ]);
    }
}