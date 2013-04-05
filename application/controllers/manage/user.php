<?php
class user extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('manage/Login_Model', 'model');
    }

    public function  index()
    {
        $this->load->view('manage/user/index');

    }
    public function  password()
    {
        $this->load->view('manage/user/password');

    }
    public function userlist()
    {
        echo json_encode($this->model->userList());
    }

    public function  addUser()
    {
        try {
            if ($this->session->userdata('username') !== "admin") {
                echo json_encode(array(
                    'errorMessage' => "只有admin管理员有该权限",
                    'type' => "0"
                ));
            } else {
                $userName = $this->input->post('userName');
                $nickName = $this->input->post('nickName');
                $password = $this->input->post('password');
                $ip = $this->input->ip_address();
                echo $this->model->addUser($userName, $nickName, $password, $ip);
            }

        } catch (Exception $e) {
            echo json_encode(array(
                'errorMessage' => $e,
                'type' => "0"
            ));
        }
    }

    public function  deleteUsers()
    {
        try {
            if ($this->session->userdata('username') !== "admin") {
                echo json_encode(array(
                    'errorMessage' => "只有admin管理员有该权限",
                    'type' => "0"
                ));
            } else {
                $ids = $this->input->post('ids');
                $this->model->delUser($ids);
                echo json_encode(array(
                    'errorMessage' => "",
                    'type' => "1"
                ));
            }

        } catch (Exception $e) {
            echo json_encode(array(
                'errorMessage' => $e,
                'type' => "0"
            ));
        }
    }

    public function  changePassword()
    {
        try {
            $oldPassword = $this->input->post('oldPassword');
            $newPassword = $this->input->post('newPassword');
            $id=$this->session->userdata('account_id');
            echo $this->model->changePassword($id,md5($oldPassword), md5($newPassword));
        } catch (Exception $e) {
            echo json_encode(array(
                'errorMessage' => $e,
                'type' => "0"
            ));
        }
    }
}