<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/TestCNPM/Model/MenuModel.php';
 class MenuController{
    private $model;

    public function __construct()
    {
        $this->model = new MenuModel();
    }
    public function displayMenu(){
        $menuItems = $this->model->getMenuItems();
        $menuDropdownItem = [];

        foreach ($menuItems as $menuItem) {
            $menuItem['dropdown'] = $this->model->getDropdownItems($menuItem['MenuID']);
            $menuDropdownItem[] = $menuItem;
        }
        return $menuDropdownItem;
    }
 }
?>