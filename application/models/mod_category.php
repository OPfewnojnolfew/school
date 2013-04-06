<?php
/**
 * 分类model
 */
class mod_category extends MY_Model
{

    public function getCateInfo($cateid)
    {
        $menu = $this->getMenus();
        $cateInfo = $this->db->get_where('menus', array('id' => $cateid))->first_row('array');
        if (!$cateInfo) exit;
        $result['info'][] = $cateInfo;
        if ($cateInfo['pid'] == 0) {
            foreach ($menu as $row) {
                if ($row['id'] == $cateInfo['id']) {
                    $result['cate'] = $row;
                    break;
                }
            }
        } else {
            $this->getParent($cateInfo['id'], $result);
            foreach ($menu as $row) {
                if ($row['id'] == $result['info'][0]['id']) {
                    $result['cate'] = $row;
                    break;
                }
            }
        }
        return $result;
    }

    public function getParent($id, &$result)
    {
        $data = $this->db->get('menus')->result_array();
        foreach ($data as &$menu) {
            if ($menu['id'] == $id) {
                $this->parent($menu, $data, $result);
                return $menu;
            }
        }

    }
    public function parent(&$menu, $data,  &$result)
    {
        foreach ($data as &$m) {
            if ($m["id"] == $menu["pid"]) {
                array_unshift($result['info'], array('id'=>$m['id'], 'name'=>$m['name']));
                if ($m["pid"] != 0) {
                    $this->parent($m, $data,$result);
                }
            }
        }
    }


    public function  getxxx(){
        $id = 1;
        $data = $this->db->get('menus')->result_array();
        foreach ($data as &$menu) {
            if ($menu['id'] == $id) {
                $this->parent($menu, $data);
                return $menu;
            }
        }
    }
    public function  getxxxx(){

    }
}