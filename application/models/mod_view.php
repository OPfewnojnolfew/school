<?php
/**
 * 分类model
 */
class mod_view extends MY_Model
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
            $result['info'][] =  $result['cate']['children'][0];

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

    public function  getNewsInfo($id)
    {
        $this->db->query("update news set readcount=readcount+1 where id={$id}");
        $data = $this->db->get_where('news', array('id' => $id))->first_row('array');
        if (!$data) return false;
        $str = '
    <object standby="loading media player components..." classid="clsid:6bf52a52-394a-11d3-b153-00c04f79faa6" height="490" width="660">
        <param name="URL" value="{$src}" />
        <param name="rate" value="1" />
        <param name="balance" value="0" />
        <param name="currentPosition" value="170.4149243" />
        <param name="defaultFrame" />
        <param name="playCount" value="1" />
        <param name="autoStart" value="0" />
        <param name="currentMarker" value="0" />
        <param name="invokeURLs" value="-1" />
        <param name="baseURL" />
        <param name="volume" value="100" />
        <param name="mute" value="0" />
        <param name="uiMode" value="full" />
        <param name="stretchToFit" value="-1" />
        <param name="windowlessVideo" value="0" />
        <param name="enabled" value="-1" />
        <param name="enableContextMenu" value="-1" />
        <param name="fullScreen" value="0" />
        <param name="SAMIStyle" />
        <param name="SAMILang" />
        <param name="SAMIFilename" />
        <param name="captioningID" />
        <param name="enableErrorDialogs" value="0" />
        <param name="_cx" value="17463" />
        <param name="_cy" value="12965" />
    </object>';
        preg_match_all('/(?:.*?)href=\"(.*?)\.wmv\"/',$data['content'], $match);
        if (isset($match[1])) {
            foreach($match[1] as $val) {
                $videoList[$val] = $val . '.wmv';
            }
        }
        foreach($videoList as $videosrc) {
            $data['content'] .= str_replace('{$src}', $videosrc, $str);
        }
        return  $data;
    }
}