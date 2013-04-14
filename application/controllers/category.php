<?php
/**
 * 分类
 * @create 2013-04-06
 */
class category extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mod_category', 'model');
        $this->load->model('mod_news', 'news');
        $this->load->library('pagination');
    }

    public function index($cateid='', $page=1)
    {
        if (!$cateid) exit;
        $menus      = $this->model->getMenus();
        $cateInfo   = $this->model->getCateInfo($cateid, $page);
        $data = array(
            'cateid'=> $cateid,
            'menus' => $menus,
            'cate'  => $cateInfo,
            'num'   =>  $this->model->getnum(),

        );
        $this->load->view($cateInfo['tem'], $data);
    }
}