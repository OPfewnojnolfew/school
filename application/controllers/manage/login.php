<?php
class login extends CI_Controller
{
    public function  __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model ( 'manage/Login_model', 'model');
    }
    public function index()
    {
        if($this->session->userdata('account_id')) {
 			redirect(base_url('manage/index/'));
 		}
        $this->load->view('manage/login/index');
    }

    public function check()
    {
        if ($this->input->is_ajax_request()) {
            if (!$this->input->post('username') || !$this->input->post('password')) {
                echo json_encode(array('errorcode'=>1, 'message'=>'参数不完整'));
                return false;
            }
            $flag = $this->model->login($this->input->post('username'),$this->input->post('password'),$this->input->ip_address());
            if ($flag) {
                $arr = array(
                    'account_id'        => $flag->account_id,
                    'username'          => $flag->username,
                    'nickname'          => $flag->nickname,
                    'last_login_time'   => $flag->login_time,
                    'last_login_ip'     => $flag->login_ip,
                    'login_time'        => time(),
                    'login_ip'          => $this->input->ip_address(),
                );
                $this->session->set_userdata($arr);
                echo json_encode(array('errorcode' => 0, 'message' => '登录成功！'));
            } else {
                echo json_encode(array('errorcode'=>1, 'message'=>'用户名和密码错误!'));
            }
        } else {
            echo json_encode(array('errorcode'=>1, 'message'=>'参数不完整'));
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url('manage/login'));
    }
}