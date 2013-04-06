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
    }

    public function index($cateid='')
    {
        if (!$cateid) exit;
        $menus =  $this->model->getMenus();
        $cateInfo = $this->model->getCateInfo($cateid);
        $data = array(
            'cateid'=> $cateid,
            'menus' => $menus,
            'cate'  => $cateInfo
        );
        $this->load->view('introduction', $data);
    }
}