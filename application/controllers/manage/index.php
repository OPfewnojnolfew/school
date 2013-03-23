<?php
class index extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
//        print_r($this->uri->uri_to_assoc(4));
        $this->load->view('manage/layout');
    }
}
