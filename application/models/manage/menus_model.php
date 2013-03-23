<?php
class Menus_model extends CI_Model {
	function __construct() {
		parent::__construct ();
	}
	function queryData() {
		$query = $this->db->query ( "SELECT id,name,( CASE pid WHEN '0' THEN '' ELSE pid END) as _parentId,type,isValid,createTime FROM menus" );
        return json_encode(array(
            'total' => $query->num_rows,
            'rows'  => $query->result_array(),
        ));
	}
	/*function getNews($id) {
		$news = $this->db->query ( "SELECT * FROM news WHERE id='{$id}'" )->result ();
		return $news [0];
	}*/
	function deleteMenu($id) {
        $query = $this->db->query ( "SELECT count(1) as childCount FROM menus WHERE pid='{$id}'" )->first_row();
		//判断是否有子节点，若有不能删除
        if(isset($query->childCount) && $query->childCount >0){
            return json_encode(array(
                'errorMessage' => "有子节点，请先删除子节点",
                'type'  => "0"
            ));
        }
        $this->db->delete('menus', array('id' => $id));
        return json_encode(array(
            'errorMessage' => "",
            'type'  => "1"
        ));
	}
	function add($pid,$name, $type) {
        $data = array(
            'pid' => $pid,
            'type' => $type ,
            'name' => $name
        );
        $this->db->insert('menus', $data);	}
	function edit($id,$name, $type) {
        $data = array(
            'type' => $type ,
            'name' => $name
        );
        $this->db->where('id', $id);
        $this->db->update('menus', $data);
	}
}