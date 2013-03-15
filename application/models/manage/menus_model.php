<?php
class Menus_model extends CI_Model {
	function __construct() {
		parent::__construct ();
	}
	function queryData() {
		$menus = $this->db->query ( "SELECT * FROM web_menutemp" )->result ();
		$treeMenus=array();
		foreach ($menus as $menu)
		{
			$pid=$menu->fid==0?"":$menu->fid;
			$treeMenu=new Tree($menu->id,$menu->name,$pid,$menu->type,$menu->isValid,$menu->createTime);
			array_push($treeMenus, $treeMenu);
		}
		return "{\"total\":".count($treeMenus).",\"rows\":" . json_encode ( $treeMenus ) . "}";
		//return json_encode ( $treeMenus ) ;
	}
	/*function getNews($id) {
		$news = $this->db->query ( "SELECT * FROM news WHERE id='{$id}'" )->result ();
		return $news [0];
	}*/
	function deleteMenu($id) {
		$childCount = $this->db->query ( "SELECT count(1) FROM web_menutemp WHERE fid='{$id}'" )->result ();
		//判断是否有子节点，若有不能删除
		$this->db->query ( "DELETE FROM web_menutemp WHERE id='".$id."'" );
	}
	function add($pid,$name, $type) {
		$this->db->query ( "INSERT INTO web_menutemp(fid,type,name) VALUES('" . $pid . "','" . $type . "' ,'" . $name . "')");
	}
	function edit($id,$name, $type) {
		$this->db->query ( "UPDATE web_menutemp SET name='" . $name . "',type='" . $type . "' WHERE id='" . $id . "'" );
	}
}
class Tree{
	var $id;
	var $name;
	var $_parentId;
	var $type;
	var $isValid;
	var $createTime;
	public function Tree($id, $name,$_parentId,$type,$isValid,$createTime){
		$this->id=$id;
		$this->name=$name;
		$this->_parentId=$_parentId;
		$this->type=$type;
		$this->isValid=$isValid;
		$this->createTime=$createTime;
	}
}
?>