<?php
class view extends CI_Controller
{
   public function __construct()
   {
       parent::__construct();
        $this->load->model('mod_view', 'model');
   }

    public function index($typeid, $id)
    {
        if (!$typeid) exit;
        $menus      = $this->model->getMenus();
        $cateInfo   = $this->model->getCateInfo($typeid);
        $data = array(
            'cateid'=> $typeid,
            'menus' => $menus,
            'cate'  => $cateInfo,
            'news'  => $this->model->getNewsInfo($id),
            'num'   =>  $this->model->getnum(),
        );
        $this->load->view('view', $data);
    }
}