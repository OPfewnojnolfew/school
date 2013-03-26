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
		$news = $this->db->query ( "SELECT title,content,menuid,readcount,createtime FROM news WHERE id='{$id}'" )->result ();
		return $news [0];
	}
	function deleteNews($ids) {
		$this->db->query ( "DELETE FROM news WHERE id IN ($ids)" );
	}
	function addNormalList($title, $content,$menuid,$createid) {
        $data = array(
            'title' => $title,
            'content' => $content ,
            'menuid' => $menuid,
            'createid'=>$createid
        );
        $this->db->insert('news', $data);
	}
	function editNormalList($id, $title, $content) {
        $data = array(
            'title' => $title,
            'content' => $content
        );
        $this->db->where('id', $id);
        $this->db->update('news', $data);
	}

    function addLinkList($title, $linkUrl,$menuid,$createid) {
        $data = array(
            'title' => $title,
            'linkurl' => $linkUrl ,
            'menuid' => $menuid,
            'createid'=>$createid
        );
        $this->db->insert('news', $data);
    }
    function editLinkList($id, $title, $linkUrl) {
        $data = array(
            'title' => $title,
            'linkurl' => $linkUrl
        );
        $this->db->where('id', $id);
        $this->db->update('news', $data);
    }
}

?>