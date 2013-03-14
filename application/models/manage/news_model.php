<?php
class News_model extends CI_Model {
	function __construct() {
		parent::__construct ();
	}
	function queryData($title, $begin, $end, $offset, $rows, $sort, $order) {
		$whereCondition = "1=1";
		if ($title != false && ! empty ( $title )) {
			$whereCondition .= " AND title LIKE '%$title%'";
		}
		if ($begin != false && ! empty ( $begin )) {
			$whereCondition .= " AND createTime>='" . $begin . "'";
		}
		if ($end != false && ! empty ( $end )) {
			$whereCondition .= " AND createTime<='" . $end . "'";
		}
		$whereCondition .= " ORDER BY $sort $order";
		$whereCondition .= " LIMIT $offset,$rows";
		$totalarr = $this->db->query ( 'SELECT COUNT(*) AS total FROM news' )->result ();
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
	function add($title, $content, $copyWriter) {
		$id = uniqid ();
		$this->db->query ( "INSERT INTO news(id,title,content,copyWriter,createTime) VALUES('" . $id . "','" . $title . "','" . $content . "','" . $copyWriter . "',now())" );
	}
	function edit($id, $title, $content, $copyWriter) {
		$this->db->query ( "UPDATE news SET title='" . $title . "',content='" . $content . "',copyWriter='" . $copyWriter . "' WHERE id='" . $id . "'" );
	}
}

?>