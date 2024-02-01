<?php

namespace Modules\Home\Http\Controllers;

use App\Http\Controllers\BaseController;

class HomeController extends BaseController
{

    public function __construct()
    {
        $this->init([
            'body' => [
                'app_title' => [
                    'h1' => ic_image('ic-x32-dashboard.png', 30) . ' Dashboard',
                    'p' => 'ภาพรวมของระบบ'
                ],
            ],
            'breadcrumb' => [
                'class_name' => 'HomeBreadcrumb'
            ]
        ]);
    }

    public function index()
    {
        $data['scripts'] = [
			asset('assets/particleground/jquery.particleground.min.js'),
        ];
        
        return $this->render('home::index', $data);
    }
}
