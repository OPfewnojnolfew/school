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

        );

        $this->load->view('index',$data);
    }
}