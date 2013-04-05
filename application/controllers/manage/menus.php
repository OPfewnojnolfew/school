<?php
class menus extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('manage/Menus_model');
        $this->load->helper('url');
    }

    public function index()
    {
        $this->load->view("manage/menus/index");
    }

    public function initData()
    {
        echo $this->Menus_model->queryData();
    }

    public function addOrEdit()
    {
        try {
            $id = $this->input->post('id');
            $pid = $this->input->post('pid');
            $name = $this->input->post('name');
            $type = $this->input->post('type');
            if ($id == false) {
                $this->Menus_model->add($pid, $name, $type);
            } else {
                $this->Menus_model->edit($id, $name, $type);
            }
            echo json_encode(array(
                'errorMessage' => "",
                'type' => "1"
            ));
        } catch (Exception $e) {
            echo json_encode(array(
                'errorMessage' => $e,
                'type' => "0"
            ));
        }
    }

    public function del()
    {
        $id = $this->input->post('id');
        echo $this->Menus_model->deleteMenu($id);
    }
}