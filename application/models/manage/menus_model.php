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
	}
	function deleteNews($ids) {
		$this->db->query ( "DELETE FROM news WHERE id IN ($ids)" );
	}
	function add($title, $content, $copyWriter) {
		$id = uniqid ();
		$this->db->query ( "INSERT INTO news(id,title,content,copyWriter,createTime) VALUES('" . $id . "','" . $title . "','" . $content . "','" . $copyWriter . "',now())" );
	}
	function edit($id, $title, $content, $copyWriter) {
		$this->db->query ( "UPDATE news SET title='" . $title . "',content='" . $content . "',copyWriter='" . $copyWriter . "' WHERE id='" . $id . "'" );
	}*/
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