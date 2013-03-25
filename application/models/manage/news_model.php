<?php
class News_model extends CI_Model {
	function __construct() {
		parent::__construct ();
	}
	function queryData($array) {
        $offset=($array['page']-1)*$array['rows'];
		$whereCondition = "1=1";
		if ( ! empty ( $array['title'])) {
			$whereCondition .= " AND title LIKE '%".$array['title']."%'";
		}
		if (! empty ( $array['begin'] )) {
			$whereCondition .= " AND createtime>='" . $array['begin']  . "'";
		}
		if ( ! empty ($array['end'])) {
			$whereCondition .= " AND createtime<='" . $array['end'] . "'";
		}
        $whereCondition .= " AND menuid='" . $array['menuid'] . "'";
        $whereCondition .= " ORDER BY ".$array['sort']." ". $array['order']."";
		$whereCondition .= " LIMIT ".$offset.",". $array['rows']."";
		$totalarr = $this->db->query ( 'SELECT COUNT(1) AS total FROM news' )->result ();
		$total = $totalarr [0]->total;
		$news = $this->db->query ( "SELECT * FROM news WHERE $whereCondition" )->result ();
		return "{\"total\":$total,\"rows\":" . json_encode ( $news ) . "}";
	}
	function getNews($id) {
		$news = $this->db->query ( "SELECT * FROM news WHERE id='{$id}'" )->result ();
		return $news [0];
	}
	function deleteNews($ids) {
		$this->db->query ( "DELETE FROM news WHERE id IN ($ids)" );
	}
	function addNormalList($title, $content,$menuid,$createid) {
		$this->db->query ( "INSERT INTO news(title,content,menuid,createid) VALUES('" . $title . "','" . $content . "','" . $menuid . "','" . $createid . "')" );
	}
	function editNormalList($id, $title, $content, $createid) {
		$this->db->query ( "UPDATE news SET title='" . $title . "',content='" . $content . "',createid='" . $createid . "' WHERE id='" . $id . "'" );
	}
}

?>