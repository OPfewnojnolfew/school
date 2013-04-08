<?php
class Link_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function queryData($array)
    {
        $offset = ($array['page'] - 1) * $array['rows'];
        $whereCondition = "1=1";
        if (!empty ($array['name'])) {
            $whereCondition .= " AND name LIKE '%" . $array['name'] . "%'";
        }
        if (!empty ($array['begin'])) {
            $whereCondition .= " AND createtime>='" . $array['begin'] . "'";
        }
        if (!empty ($array['end'])) {
            $whereCondition .= " AND createtime<='" . $array['end'] . "'";
        }
        $totalarr = $this->db->query('SELECT COUNT(1) AS total FROM link  WHERE ' . $whereCondition)->result();
        $whereCondition .= " ORDER BY " . $array['sort'] . " " . $array['order'] . "";
        $whereCondition .= " LIMIT " . $offset . "," . $array['rows'] . "";
        $total = $totalarr [0]->total;
        $news = $this->db->query('SELECT id,name,priority,linkurl,type,imagepath,createtime FROM link WHERE ' . $whereCondition)->result();
        return "{\"total\":$total,\"rows\":" . json_encode($news) . "}";

    }

    function addLinkList($name, $linkurl, $priority, $type, $imagepath)
    {
        $data = array(
            'name' => $name,
            'linkurl' => $linkurl,
            'priority' => $priority,
            'type' => $type,
            'imagepath' => $imagepath
        );
        $this->db->insert('link', $data);
    }

    function editLinkList($id, $name, $linkurl, $priority, $type, $imagepath)
    {
        $data = array(
            'name' => $name,
            'linkurl' => $linkurl,
            'priority' => $priority,
            'type' => $type,
            'imagepath' => $imagepath
        );
        $this->db->where('id', $id);
        $this->db->update('link', $data);
    }

    public function  deleteLinks($ids)
    {
        $this->db->query("DELETE FROM link WHERE id IN ($ids)");
    }

}