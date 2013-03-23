<?php
class user extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('manage/Login_Model','model');
    }

    public function  index()
    {
        $this->load->view('manage/user/index');

    }

    public function userlist()
    {
        echo json_encode($this->model->userList());
    }
}