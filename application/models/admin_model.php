<?php


class Admin_model extends CI_Model {
    public function __construct()
    {
        $this->load->database();
    }


    //    登录
    public function login_do($loginInfo)
    {
        $query = $this->db->get_where('jm_admin',$loginInfo);
        return $query->row_array();
    }


}

?>
