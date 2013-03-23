<?php
class base extends CI_Controller {
    public function __construct() {
        parent::__construct ();
        $this->load->model ( 'manage/Base_model' );
        $this->load->helper ( 'url' );
    }
//    public function getMenus() {
//        echo $this->Base_model->getMenus ();
//    }
    public  function  getZtreeMenus(){
        echo $this->Base_model->getZtreeMenus ();
    }
}