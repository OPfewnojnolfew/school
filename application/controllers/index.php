<?php
/**
 * Created by JetBrains PhpStorm.
 * User: ptf
 * Date: 13-4-6
 * Time: 下午3:22
 * To change this template use File | Settings | File Templates.
 */
class index extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mod_category', 'model');
    }

    public function index()
    {
        $menus =  $this->model->getMenus();
        $data = array(
            'menus' => $menus,
            'num'   =>  $this->model->getnum(),
            'link'  => $this->model->getLink(),
            'imagenews' => $this->model->getImagenews(),
            'focus' => $this->model->getNewsList(10, 5,true),
            'cultrue'   => $this->model->getNewsList(49, 3,true),
            'dt'    => $this->model->getNewsList(32, 11,false),
            'qc'    => $this->model->getNewsList(20, 11,false),
            'xw'    => $this->model->getNewsList(10, 11,false),
            'tz'    => $this->model->getNewsList(8, 11,false),
            'zt'    => $this->model->getNewsList(43, 3,true),
             'tgkj' =>$this->model->getNewsList(51, 4,true),
            'sp'    => $this->model->getNewsList(44, 3,true),
        );

        $this->load->view('index',$data);
    }
}