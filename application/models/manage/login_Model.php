<?php
class Login_model extends CI_Model
{
    public function login($user, $pass, $ip)
    {
        $map = array('username'=>$user,'password'=>md5($pass));
        $query = $this->db->where($map)->get('user');
        if($query->num_rows()>0) {
            $row = $query->row();
            $this->db->login_time = time();
            $this->db->login_ip   = ip2long($ip);
            $logincount = $row->logincount+1;
            $data = array('login_time'=> time(),'login_ip' => ip2long($ip),'logincount' => $logincount );
            $this->db->where(array('account_id'=>$row->account_id))->update('user', $data);
            return $row;
        } else {
            return false;
        }
    }

    public function userList()
    {
        $query = $this->db->get('user');
        $res = $query->result_array();
        foreach ($res as $key=>$val) {
            $res[$key]['login_time'] = date("Y-m-d H:i:s", $val['login_time']);
            $res[$key]['login_ip'] = long2ip($val['login_ip']);
        }
        return array('total'=>$query->num_rows,'rows'=>$res);
    }
}