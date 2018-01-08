<?php

class User_model extends CI_model {

    public function register_user($user) {


        $this->db->insert('user', $user);
    }

    public function modify_user_password($password, $user_id) {
        $user = array(
            'user_password' => md5($password),
            'user_recovery' => ''
        );
        $this->db->where('user_id', $user_id);
        return $this->db->update('user', $user);
    }

    public function login_user($email, $pass) {

        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('user_email', $email);
        $this->db->where('user_password', $pass);

        if ($query = $this->db->get()) {
            return $query->row_array();
        } else {
            return false;
        }
    }

    public function login_user_facebook($email) {

        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('user_email', $email);

        if ($query = $this->db->get()) {
            return $query->row_array();
        } else {
            return false;
        }
    }

    public function user_token($user_id) {
        //Generate token
        $length = 20;
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        //Update db
        $this->db->where('user_id', $user_id);
        $data['user_recovery'] = $randomString;
        $this->db->update('user', $data);

        return $randomString;
    }

    public function email_check($email) {

        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('user_email', $email);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return false;
        } else {
            return true;
        }
    }

    public function user_recovery($email, $password, $tokenPost) {

        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('user_email', $email);
        $this->db->where('user_recovery', $tokenPost);

        if ($query = $this->db->get()) {
            $result = $query->row_array();
            $this->modify_user_password($password, $result['user_id']);
            return $result;
        } else {
            return false;
        }
    }

}

?>
