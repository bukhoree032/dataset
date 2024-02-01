<?php

namespace App\Http\Controllers;

class BaseMemberManageController extends BaseManageController
{
    public function init(array $config = [])
    {
        if (isset($config['breadcrumb']) && isset($config['breadcrumb']['class_name'])) {
            $this->breadcrumb = [
                'class_name' => $config['breadcrumb']['class_name']
            ];
        }

        $this->setCacheProvinces();
    }

    /**
     * @return array
     */
    public function setBreadcrumb()
    {
        $breadcrumb = [];

        $getModuleCurrentName = $this->getModuleCurrentName();
        $getCurrentAction = $this->getCurrentAction();

        if (isset($this->breadcrumb['class_name'])) {
            $classPath = "\Modules\\$getModuleCurrentName\Breadcrumb\Member\\".$this->breadcrumb['class_name'];
            if (class_exists($classPath)) {
                $classBreadcrumb = new $classPath();
                if (method_exists($classBreadcrumb, $getCurrentAction)) {
                    $breadcrumb = $classBreadcrumb->$getCurrentAction();
                }
            }
        } else {
            $classPath = "\App\Breadcrumb\BaseBreadcrumb";
            if (class_exists($classPath)) {
                $classBreadcrumb = new $classPath();
                $classBreadcrumb->init(['prefix' => strtolower($getModuleCurrentName)]);
                if (method_exists($classBreadcrumb, $getCurrentAction)) {
                    $breadcrumb = $classBreadcrumb->$getCurrentAction();
                }
            }
        }

        return $breadcrumb;
    }
}
