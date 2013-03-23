<?php
class Base_model extends CI_Model {
	function __construct() {
		parent::__construct ();
	}
    function getZtreeMenus(){
        $menus = $this->db->query ( "SELECT id,name,pid,type,isValid,createTime FROM web_menutemp" )->result_array();
        return json_encode($menus);
    }
//	function getMenus() {
//        $menus = $this->db->query ( "SELECT id,name as text,pid,type,isValid,createTime,url FROM web_menutemp" )->result_array();
//        foreach($menus as &$val){
//            $val["attributes"]=array("url"=>$val["url"]);
//            $val["children"]=array();
//        }
//        $resultMenus=array();
//        foreach($menus as &$val){
//            if(isset($val["pid"])&&$val["pid"]==0){
//                $this->menuTree($val,$menus);
//                array_push($resultMenus,$val);
//            }
//        }
//        //print_r(json_encode($menus));
//        return json_encode($resultMenus);
//	}
//    private function menuTree(&$menu,&$menus){
//        foreach($menus as &$val){
//            if($val["pid"]==$menu["id"]){
//                array_push($menu["children"],$val);
//                //print_r(json_encode($menus)); return;
//                $this->menuTree($val,$menus);
//            }
//        }
//    }
}