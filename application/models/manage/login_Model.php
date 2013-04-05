<?php
class Login_model extends CI_Model
{
    public function login($user, $pass, $ip)
    {
        $map = array('username' => $user, 'password' => md5($pass));
        $query = $this->db->where($map)->get('user');
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $this->db->login_time = time();
            $this->db->login_ip = ip2long($ip);
            $logincount = $row->logincount + 1;
            $data = array('login_time' => time(), 'login_ip' => ip2long($ip), 'logincount' => $logincount);
            $this->db->where(array('account_id' => $row->account_id))->update('user', $data);
            return $row;
        } else {
            return false;
        }
    }

    public function userList()
    {
        $query = $this->db->get('user');
        $res = $query->result_array();
        foreach ($res as $key => $val) {
            $res[$key]['login_time'] = date("Y-m-d H:i:s", $val['login_time']);
            $res[$key]['login_ip'] = long2ip($val['login_ip']);
        }
        return array('total' => $query->num_rows, 'rows' => $res);
    }

    public function  addUser($userName, $nickName, $password, $ip)
    {
        if (!empty($userName) && !empty($password)) {
            $total = $this->db->query("SELECT COUNT(1) AS total FROM user WHERE username='" . $userName . "'")->result();
            if ($total[0]->total > 0) {
                return json_encode(array(
                    'errorMessage' => "用户名已存在",
                    'type' => "0"
                ));
            }
            $user = array('username' => $userName, 'password' => md5($password), 'nickname' => $nickName, 'regist_ip' => ip2long($ip));
            $this->db->insert('user', $user);
            return json_encode(array(
                'errorMessage' => "",
                'type' => "1"
            ));
        }
        return json_encode(array(
            'errorMessage' => "新增用户出错",
            'type' => "0"
        ));
    }

    public function delUser($ids)
    {
        $this->db->query("DELETE FROM user WHERE account_id IN ($ids)");
    }

    public function changePassword($id, $oldPassword, $newPassword)
    {
        if (!empty($id) && !empty($oldPassword) && !empty($newPassword)) {
            $query = $this->db->query("SELECT password FROM user WHERE account_id=" . $id);
            if ($query->num_rows == 1) {
                $user = $query->first_row();
                if ($user->password !== $oldPassword) {
                    return json_encode(array(
                        'errorMessage' => "原密码错误",
                        'type' => "0"
                    ));
                }
                $this->db->query("UPDATE user SET password='" . $newPassword . "' WHERE account_id=" . $id);
                return json_encode(array(
                    'errorMessage' => "",
                    'type' => "1"
                ));
            }
        }
        return json_encode(array(
            'errorMessage' => "修改密码出错",
            'type' => "0"
        ));
    }
}