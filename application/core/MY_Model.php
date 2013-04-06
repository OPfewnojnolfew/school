<?php
class MY_Model extends CI_Model
{
    public function getMenus()
    {
        $data = $this->db->get('menus')->result_array();
        $resultMenus = array();
        foreach($data as &$val){
            if(isset($val["pid"])&&$val["pid"]==0){
                $this->menuTree($val,$data);
                array_push($resultMenus,$val);
            }
        }
        return $resultMenus;
    }

    private function menuTree(&$menu,&$menus){
        foreach($menus as &$val){
            if($val["pid"]==$menu["id"]){
                $menu["children"][] = $val;
                $this->menuTree($val,$menus);
            }
        }
    }
}