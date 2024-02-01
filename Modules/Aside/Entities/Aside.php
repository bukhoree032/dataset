<?php

namespace Modules\Aside\Entities;

use Auth;

class Aside
{
    public static function setNavigationSidebar()
    {
        return [
            [
                'role' => [
                    'name' => 'MAIN NAVIGATION'
                ],
                'data' => [
                    [
                        'name' => 'Dashboard',
                        'active_name' => "admin/dashboard",
                        'url' => route('admin.dashboard.index'),
                        'permission_prefix' => "dashboard",
                        'webfont_icon' => '<i class="app-menu__icon fas fa-tachometer-alt"></i>'
                    ],
                    [
                        'name' => 'ข้อมูลครัวเรือน',
                        'active_name' => "admin/household*",
                        'url' => route('admin.household.show'),
                        'permission_prefix' => "household",
                        'webfont_icon' => '<i class="app-menu__icon fas fa-users"></i>'
                    ],
                    [
                        'name' => 'จัดการครัวเรือน',
                        'active_name' => "admin/household*",
                        'url' => route('admin.household.index'),
                        'permission_prefix' => "household",
                        'webfont_icon' => '<i class="app-menu__icon fas fa-users"></i>'
                    ],
                    [
                        'name' => 'สมาชิก',
                        'active_name' => "admin/member*",
                        'url' => route('admin.member.index'),
                        'permission_prefix' => "member",
                        'webfont_icon' => '<i class="app-menu__icon fas fa-database"></i>'
                    ],
                    [
                        'name' => 'รายงาน',
                        'active_name' => "admin/report*",
                        'url' => '',
                        'permission_prefix' => "report",
                        'webfont_icon' => '<i class="app-menu__icon fas fa-print"></i>',
                        'childs' => [
                            [
                                'name' => 'รายงาน Dataset',
                                'active_name' => "admin/report/dataset**",
                                'url' => route('admin.report.dataset.index'),
                                'permission_prefix' => "report_dataset",
                                'webfont_icon' => '<i class="app-menu__icon fas fa-layer-group"></i>'
                            ],
                        ]
                    ]
                ]
            ],
            [
                'role' => [
                    'name' => 'SYSTEMS SETTING'
                ],
                'data' => [
                    [
                        'name' => 'จัดการผู้ใช้งาน',
                        'active_name' => "admin/user*",
                        'url' => '',
                        'permission_prefix' => "user",
                        'webfont_icon' => '<i class="app-menu__icon fas fa-users-cog"></i>',
                        'childs' => [
                            [
                                'name' => 'จัดการบทบาท',
                                'active_name' => "admin/user/role**",
                                'url' => route('admin.user.role.index'),
                                'permission_prefix' => "role",
                                'webfont_icon' => '<i class="app-menu__icon fas fa-layer-group"></i>'
                            ],
                            [
                                'name' => 'จัดการผู้ใช้งาน',
                                'active_name' => "admin/user**",
                                'url' => route('admin.user.index'),
                                'permission_prefix' => "user",
                                'webfont_icon' => '<i class="app-menu__icon fas fa-users-cog"></i>'
                            ],
                        ]
                    ],
                    [
                        'name' => 'คำอธิบายเว็บไซต์',
                        'active_name' => "admin/setting/meta*",
                        'url' => route('admin.setting.meta.index'),
                        'permission_prefix' => "meta",
                        'webfont_icon' => '<i class="app-menu__icon fas fa-text-width"></i>'
                    ],
                ]
            ]
        ];
    }

    /**
     * @param  false  $expanded
     *
     * @return array
     */
    public static function getNavigationSidebar($expanded = false)
    {
        $response = [];
        foreach (self::setNavigationSidebar() as $role_index => $role) {
            if (!$expanded) {
                if (isset($role['data']) && !empty($role['data'])) {
                    foreach ($role['data'] as $parent_index => $parent) {
                        if (false !== array_search($parent['permission_prefix'], self::getPermissionAuth())) {
                            $role['data'][$parent_index] = $parent;

                            if (isset($parent['childs']) && !empty($parent['childs'])) {
                                foreach ($parent['childs'] as $child_index => $child) {
                                    if (false == array_search($child['permission_prefix'], self::getPermissionAuth())) {
                                        unset($role['data'][$parent_index]['childs'][$child_index]);
                                    }
                                }
                            }

                        } else {
                            unset($role['data'][$parent_index]);
                        }
                    }
                }
            }

            $response[$role_index] = $role;
        }

        return $response;
    }

    public static function getPermissionAuth()
    {
        $response = [];
        $user = Auth::user();
        $permissions = $user->getAllPermissions()->toArray();
        foreach ($permissions as $permission) {
            [$prefix, $method] = explode("-", $permission['name']);
            $response[$prefix] = $prefix;
        }

        return array_values($response);
    }
}
