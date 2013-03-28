<?php
class Uploadify_model extends CI_Model {
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
	function add($attachmentName,$attachmentPath) {
        $data = array(
            'attachmentName' => $attachmentName,
            'attachmentPath' => $attachmentPath
        );
        $this->db->insert('attachment', $data);
        $attachmentID=$this->db->insert_id();
        return json_encode(array(
            "type"=>"1",
            "attachmentID"=>$attachmentID,
            "attachmentName"=>$attachmentName,
            "attachmentPath"=>$attachmentPath
        ));
    }
    function delete($id) {
        $query= $this->db->query ( "SELECT attachmentPath FROM attachment WHERE  attachmentID="+$id );
        if($query->num_rows==1){
            $row=$query->first_row();
            $attachmentPath=$row["attachmentPath"];
            $attachmentPath=dirname(BASEPATH) .'/'. $attachmentPath;
            if(file_exists($attachmentPath)){
                unlink($attachmentPath);
            }
            $this->db->query ( "DELETE FROM attachment WHERE attachmentID="+$id );
            return json_encode(array(
                "type"=>"1",
                "errMessage"=>""
            ));
        }
        return json_encode(array(
            "type"=>"0",
            "errMessage"=>"删除失败"
        ));
    }
    function getAttachment($newsid)
    {
        if(! empty ($newsid)){
            $query = $this->db->query ( "SELECT attachmentID,attachmentPath,attachmentName FROM attachment where newsid='".$newsid."'" );
            try{
                 $rows= $query->result_array();
                if(count($rows)>0){
                    $row=$rows[0];
                return json_encode(array(
                    "type"=>"1",
                    "attachmentID"=>$row['attachmentID'],
                    "attachmentName"=>$row['attachmentName'],
                    "attachmentPath"=>$row['attachmentPath']
                ));
                }
            }catch (Exception $e){
                return json_encode(array(
                    "type"=>"0",
                    "errMessage"=>"获取附件出错"
                ));
            }
        }
        return json_encode(array(
            "type"=>"0",
            "errMessage"=>"无附件"
        ));
    }

}