<?php

namespace App\Http\Controllers;

class BaseDifferentManageController extends BaseManageController
{
    /**
     * @return array
     */
    public function setBreadcrumb()
    {
        $breadcrumb = [];

        $getModuleCurrentName = $this->getModuleCurrentName();
        $getCurrentAction = $this->getCurrentAction();

        if (isset($this->breadcrumb['class_name'])) {
            $classPath = "\Modules\\$getModuleCurrentName\Breadcrumb\\".$this->breadcrumb['class_name'];
            if (class_exists($classPath)) {
                $classBreadcrumb = new $classPath();
                if (method_exists($classBreadcrumb, $getCurrentAction)) {
                    $breadcrumb = $classBreadcrumb->$getCurrentAction();
                }
            }
        } else {
            $classPath = "\App\Breadcrumb\BaseDifferentBreadcrumb";
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
