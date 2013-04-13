<?php
/**
 * 分类model
 */
class mod_category extends MY_Model
{

    public function getCateInfo($cateid, $page)
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
            $result['info'][] =  $result['cate']['children'][0];
            $result['tem'] = $this->checkTem($result['cate']['children'][0]['type']);
            $perpage = ($result['tem']=='image')?11:20;
            if ($result['tem']!='zc') {
                $data = $this->getList($result['cate']['children'][0]['type'], $result['cate']['children'][0]['id']);
                $dataArray = array_chunk($data, $perpage);
                $result['list'] = isset($dataArray[$page-1])?$dataArray[$page-1]:$dataArray[0];
                $config['per_page'] = $perpage;
                $config['base_url'] = base_url("category/index/{$cateid}/");
                $config['total_rows'] = count($data);
                $this->pagination->initialize($config);
                $result['page'] = $this->pagination->create_links();
            } else {
                $query = $this->db->query("select *,attachment.attachmentPath from news left join attachment on attachment.newsid=news.id where menuid=" . $result['cate']['children'][0]['id'] . " order by createtime asc")->result_array();
                foreach($query as $val) {
                    if ($val['pid']==0) {
                        $list[$val['id']] = $val;
                    } else {
                        $list[$val['pid']]['children'][] = $val;
                    }
                }
                $result['list'] = $list;
            }

        } else {
            $this->getParent($cateInfo['id'], $result);
            foreach ($menu as $row) {
                if ($row['id'] == $result['info'][0]['id']) {

                    $result['cate'] = $row;
                    break;
                }
            }
            $result['tem'] = $this->checkTem($cateInfo['type']);
            $perpage = ($result['tem']=='image')?11:20;
            if ($result['tem']!='zc') {

                $data = $this->getList($cateInfo['type'], $cateInfo['id']);
                $dataArray = array_chunk($data, $perpage);
                $result['list'] = isset($dataArray[$page-1])?$dataArray[$page-1]:$dataArray[0];
                $config['per_page'] = $perpage;
                $config['base_url'] = base_url("category/index/{$cateid}/");
                $config['total_rows'] = count($data);
                $this->pagination->initialize($config);
                $result['page'] = $this->pagination->create_links();
            } else {
                $query = $this->db->query("select *,attachment.attachmentPath from news left join attachment on attachment.newsid=news.id where menuid=" . $cateInfo['id'] . " order by createtime asc")->result_array();
                foreach($query as $val) {
                    if ($val['pid']==0) {
                        $list[$val['id']] = $val;
                    } else {
                        $list[$val['pid']]['children'][] = $val;
                    }
                }
                $result['list'] = $list;
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




}