<?php
class link extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('manage/Link_model');
        //$this->load->library('Layout_manage');
        $this->load->helper('url');
    }

    public function index()
    {
        $this->load->view("manage/link/index");
    }
    public function initData()
    {
        $array = array(
            'name' => $this->input->post('title'),
            'begin' => $this->input->post('begin'),
            'end' => $this->input->post('end'),
            'page' => $this->input->post('page'),
            'rows' => $this->input->post('rows'),
            'order' => $this->input->post('order'),
            'sort' => $this->input->post('sort'),
        );
        echo $this->Link_model->queryData($array);
    }
    public function addOrEditLinkList()
    {
        try {
            $id = $this->input->post('id');
            $name = $this->input->post('name');
            $linkurl = $this->input->post('linkurl');
            $priority = $this->input->post('priority');
            $type = $this->input->post('type');
            $imagepath = $this->input->post('imagepath');
            if ($id == false) {
                $this->Link_model->addLinkList($name, $linkurl, $priority,$type, $imagepath);
            } else {
                $this->Link_model->editLinkList($id, $name, $linkurl, $priority, $type, $imagepath);
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
    public  function deleteLinks(){
        try {
            $ids = $this->input->post('ids');
            $this->Link_model->deleteLinks($ids);
            echo json_encode(array(
                'errorMessage' => "",
                'type' => "1"
            ));
        } catch (Exception $ex) {
            echo json_encode(array(
                'errorMessage' => $ex,
                'type' => "0"
            ));
        }
    }
}