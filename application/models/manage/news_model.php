<?php
class News_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function queryData($array)
    {
        $offset = ($array['page'] - 1) * $array['rows'];
        $whereCondition = "1=1";
        if (!empty ($array['title'])) {
            $whereCondition .= " AND title LIKE '%" . $array['title'] . "%'";
        }
        if (!empty ($array['begin'])) {
            $whereCondition .= " AND createtime>='" . $array['begin'] . "'";
        }
        if (!empty ($array['end'])) {
            $whereCondition .= " AND createtime<='" . $array['end'] . "'";
        }
        $whereCondition .= " AND menuid='" . $array['menuid'] . "'";
        $whereCondition .= " ORDER BY " . $array['sort'] . " " . $array['order'] . "";
        $whereCondition .= " LIMIT " . $offset . "," . $array['rows'] . "";
        $totalarr = $this->db->query('SELECT COUNT(1) AS total FROM news')->result();
        $total = $totalarr [0]->total;
        $news = $this->db->query("SELECT * FROM news WHERE $whereCondition")->result();
        return "{\"total\":$total,\"rows\":" . json_encode($news) . "}";
    }

    function queryDataTree($array)
    {
        $whereCondition = "1=1";
        if (!empty ($array['title'])) {
            $whereCondition .= " AND title LIKE '%" . $array['title'] . "%'";
        }
        if (!empty ($array['begin'])) {
            $whereCondition .= " AND createtime>='" . $array['begin'] . "'";
        }
        if (!empty ($array['end'])) {
            $whereCondition .= " AND createtime<='" . $array['end'] . "'";
        }
        $whereCondition .= " AND menuid='" . $array['menuid'] . "'";
        $query = $this->db->query("SELECT id,pid,( CASE pid WHEN '0' THEN '' ELSE pid END) as _parentId, title,content,menuid,readcount,createtime,attachmentID,attachmentPath,attachmentName FROM news LEFT JOIN attachment ON attachment.newsid=news.id WHERE " . $whereCondition);
        return json_encode(array(
            'total' => $query->num_rows,
            'rows' => $query->result_array(),
        ));
    }
    public function  initSingle($menuid)
    {
        if (!empty($menuid)) {
            $news = $this->db->query("SELECT id, title,content,menuid FROM news WHERE menuid='{$menuid}'");
            if( $news->num_rows==1){
                $new=$news->first_row();
                return json_encode($new);
            }
        }
        return "";
    }

//    function getNews($id)
//    {
//        $news = $this->db->query("SELECT title,content,menuid,readcount,createtime FROM news WHERE id='{$id}'")->result();
//        return $news [0];
//    }

    function deleteNews($ids)
    {
        $this->db->query("DELETE FROM news WHERE id IN ($ids)");
    }

    function addNormalList($title, $content, $menuid, $createid)
    {
        $data = array(
            'title' => $title,
            'content' => $content,
            'menuid' => $menuid,
            'createid' => $createid
        );
        $this->db->insert('news', $data);
    }

    function editNormalList($id, $title, $content)
    {
        $data = array(
            'title' => $title,
            'content' => $content
        );
        $this->db->where('id', $id);
        $this->db->update('news', $data);
    }

    function addLinkList($title, $linkUrl, $menuid, $createid)
    {
        $data = array(
            'title' => $title,
            'linkurl' => $linkUrl,
            'menuid' => $menuid,
            'createid' => $createid
        );
        $this->db->insert('news', $data);
    }

    function editLinkList($id, $title, $linkUrl)
    {
        $data = array(
            'title' => $title,
            'linkurl' => $linkUrl
        );
        $this->db->where('id', $id);
        $this->db->update('news', $data);
    }

    function addImageOrVideoList($title, $content, $menuid, $attachmentID)
    {
        $data = array(
            'title' => $title,
            'content' => $content,
            'menuid' => $menuid
        );
        $this->db->insert('news', $data);
        $newsid = $this->db->insert_id();

        $attrdata = array(
            'newsid' => $newsid
        );
        $this->db->where('attachmentID', $attachmentID);
        $this->db->update('attachment', $attrdata);
    }

    function editImageOrVideoList($id, $title, $content, $attachmentID)
    {
        $data = array(
            'title' => $title,
            'content' => $content
        );
        if (!empty($attachmentID)) {
            $this->db->where('id', $id);
            $this->db->update('news', $data);
            $this->db->query("DELETE FROM attachment WHERE newsid=" . $id . " AND attachmentID !=" . $attachmentID . "");


            $attrdata = array(
                'newsid' => $id
            );
            $this->db->where('attachmentID', $attachmentID);
            $this->db->update('attachment', $attrdata);
        }
    }

    function addMultiAttrList($title, $content, $menuid, $attachmentIDs)
    {
        $data = array(
            'title' => $title,
            'content' => $content,
            'menuid' => $menuid
        );
        $this->db->insert('news', $data);
        $newsid = $this->db->insert_id();
        if (!empty($attachmentIDs)) {
            $this->db->query("UPDATE attachment SET newsid=" . $newsid . " WHERE  attachmentID IN(" . $attachmentIDs . ")");
        }
    }

    function editMultiAttrList($id, $title, $content, $attachmentIDs)
    {
        $data = array(
            'title' => $title,
            'content' => $content
        );
        if (!empty($attachmentIDs)) {
            $this->db->where('id', $id);
            $this->db->update('news', $data);
            $this->db->query("DELETE FROM attachment WHERE newsid=" . $id . " AND attachmentID NOT IN(" . $attachmentIDs . ")");

            $this->db->query("UPDATE attachment SET newsid=" . $id . " WHERE attachmentID IN(" . $attachmentIDs . ")");
        }
    }
    function addMaterSlaveList($pid,$title, $content, $menuid, $attachmentID)
    {
        $data = array(
            'pid'=>$pid,
            'title' => $title,
            'content' => $content,
            'menuid' => $menuid
        );
        $this->db->insert('news', $data);
        $newsid = $this->db->insert_id();

        $attrdata = array(
            'newsid' => $newsid
        );
        $this->db->where('attachmentID', $attachmentID);
        $this->db->update('attachment', $attrdata);
    }

    function editMaterSlaveList($id, $title, $content, $attachmentID)
    {
        $data = array(
            'title' => $title,
            'content' => $content
        );
        if (!empty($attachmentID)) {
            $this->db->where('id', $id);
            $this->db->update('news', $data);
            $this->db->query("DELETE FROM attachment WHERE newsid=" . $id . " AND attachmentID !=" . $attachmentID . "");


            $attrdata = array(
                'newsid' => $id
            );
            $this->db->where('attachmentID', $attachmentID);
            $this->db->update('attachment', $attrdata);
        }
    }
    function addSingle($title, $content, $menuid)
    {
        $data = array(
            'title' => $title,
            'content' => $content,
            'menuid' => $menuid
        );
        $this->db->insert('news', $data);
        return $this->db->insert_id();
    }

    function editSingle($id, $title, $content)
    {
        $data = array(
            'title' => $title,
            'content' => $content
        );
        $this->db->where('id', $id);
        $this->db->update('news', $data);
    }
}

?>