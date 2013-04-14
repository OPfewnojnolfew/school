<?php
class MY_Model extends CI_Model
{
    public function getMenus()
    {
        $data = $this->db->get('menus')->result_array();
        $resultMenus = array();
        foreach($data as &$val){
            if(isset($val["pid"])&&$val["pid"]==0){
                $this->menuTree($val,$data);
                array_push($resultMenus,$val);
            }
        }
        return $resultMenus;
    }

    private function menuTree(&$menu,&$menus){
        foreach($menus as &$val){
            if($val["pid"]==$menu["id"]){
                $this->menuTree($val,$menus);
                $menu["children"][] = $val;
            }
        }
    }

    public function checkTem($typeid)
    {
        switch ($typeid) {
            case 1 :
                $tem = 'introduction';
                break;
            case 2 :
                $tem = 'news';
                break;
            case 3 :
                $tem = 'image';
                break;
            case 4 :
                $tem = 'introduction';
                break;
            case 5 :
                $tem = 'news';
                break;
            case 6 :
                $tem = 'zc';
                break;
            case 7 :
                $tem = 'introduction';
                break;
            default :
                $tem = 'news';
                break;
        }
        return $tem;
    }

    public function getList($type, $id)
    {
        $data = $this->db->query("select * ,attachment.attachmentPath from news left join attachment on attachment.newsid=news.id where menuid={$id} order by createtime desc")->result_array();
        return $data;
    }

    public function getnum()
    {
        $this->db->query("update stat set guest=guest+1");
        $data = $this->db->get('stat')->first_row('array');
        return  $data['guest'];
    }

    public function getLink()
    {
        $data = $this->db->get('link')->result_array();
        if (!$data) return false;
        foreach($data as $row) {
            $result[$row['type']][] = $row;
        }
        unset($data);
        return $result;
    }

    public function getImagenews()
    {
        $data = $this->db->query("select a.*,b.attachmentPath from news a left join attachment b on a.id=b.newsid where a.menuid=48 order by createtime desc limit 12 ")->result_array();
        return $data;
    }

    public function getNewsList($menuid, $num, $attach = false)
    {
        if ($attach) {
            $sql ="select a.*,b.attachmentPath from news a left join attachment b on a.id=b.newsid where a.menuid={$menuid} and b.attachmentPath<>'' order by createtime desc limit {$num}";
        } else {
            $sql ="select a.*,b.attachmentPath from news a left join attachment b on a.id=b.newsid where a.menuid={$menuid} order by createtime desc limit {$num}";
        }
        $data = $this->db->query($sql)->result_array();
        return $data?$data:'';
    }
}