<?php

namespace Modules\Setting\Breadcrumb;

use App\Breadcrumb\BaseBreadcrumb;

class AdminVisualEquipmentBreadcrumb extends BaseBreadcrumb
{

    public function __construct()
    {
        $this->init([
            'prefix' => 'setting.visual-equipment'
        ]);
    }
}