<?php
class MY_Controller extends CI_Controller
{
    public function __construct() {
        parent::__construct ();
        $this->load->model ( 'manage/Base_model' );
        $this->load->library ( 'session' );
        $this->load->helper ( 'url' );
    }

    public function _remap($method)
    {
//        if (!method_exists($this, $method)) {
//            show_404("{$this}/{$method}");
//        }
//        $beforeMethod = "before$method";
//        $afterMethod = "after$method";
//        if (method_exists($this,$beforeMethod)) {
//            $this->$beforeMethod();
//        }
        if($this->session->userdata('account_id')==false) {
            redirect(base_url('manage/login/'));
        }
        call_user_func_array(array($this, $method), '');
    }

    public  function  getMenus(){
        echo $this->Base_model->getMenus();
    }
}