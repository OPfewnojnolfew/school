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

    public function checkTem($typeid)
    {
        switch ($typeid) {
            case 1 :
                $tem = 'introduction';
                break;
            case 2 :
                $tem = 'introduction';
                break;
            case 3 :
                $tem = 'introduction';
                break;
            case 4 :
                $tem = 'introduction';
                break;
            case 5 :
                $tem = 'introduction';
                break;
            case 6 :
                $tem = 'introduction';
                break;
            case 7 :
                $tem = 'introduction';
                break;
            default :
                $tem = 'news';
                break;
        }
        return $tem;
    }

    public function getList($type, $id)
    {
        $data = $this->db->query("select * from news where menuid={$id} order by createtime desc")->result_array();
        return $data;
    }
}