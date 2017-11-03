<?php


class User_model extends CI_Model {
    public function __construct()
    {
        $this->load->database();
    }

//    添加用户
    public function addUser($userInfo)
    {
        return $this->db->insert('jm_user',$userInfo);
    }

//    查找是否存在email
    public function checkEmail($email)
    {
        $query = $this->db->get_where('jm_user',array('email'=>$email));
        return $query->row_array();
    }
//    查找是否存在tel
    public function checkTel($tel)
    {
        $query = $this->db->get_where('jm_user',array('tel'=>$tel));
        return $query->row_array();
    }
//    登录
    public function login_do($loginInfo)
    {
        $query = $this->db->get_where('jm_user',$loginInfo);
        return $query->row_array();
    }

//    更新个人信息
    public function updateUserInfo($userInfo,$userId)
    {
        $this->db->where('id',$userId);
        return $this->db->update('jm_user',$userInfo);
    }

//    更新密码
    public function changePwd($password,$userId)
    {
        $this->db->where('id',$userId);
        return $this->db->update('jm_user',array('password'=>$password));
    }

//    获取头像
    public function getAvatar($userId)
    {
        $sql = "select image,img from jm_user WHERE id =".$userId;
        $query = $this->db->query($sql);
        return $query->row_array();
    }

//    获取用户名
    public function userName_all()
    {
        $dbUser=$this->load->database('default', TRUE);
        $sql="select nickName,id,tel from jm_user";
        $query=$dbUser->query($sql);
        //var_dump($query->result_array());die;
        return $query->result_array();
    }

//    根据userId，日期查找签到记录
    public function CheckSign($logInfo)
    {
        $query = $this->db->get_where('jm_signlog',$logInfo);
        return $query->row_array();
    }

//    添加签到记录
    public function InsertSignLog($logInfo)
    {
        return $this->db->insert('jm_signlog',$logInfo);
    }

//    获得当前用户积分
    public function userInte($userId)
    {
        $sql="select integral from jm_user WHERE `id`=".$userId;
        $query=$this->db->query($sql);
        return $query->row_array();
    }

//    获取用户名和头像
    public function nameAndAvaById($userId)
    {
        $sql="select nickName,image,img from jm_user WHERE `id`=".$userId;
        $query=$this->db->query($sql);
        return $query->row_array();
    }

}

?>
