<?php


class Notice_model extends CI_Model {
    public function __construct()
    {
        $this->load->database();
    }
//last全体通知列表
    public function notice()
    {
        $sql = "select * from jm_notice WHERE disabled=0  ORDER BY id desc limit 10";
        $query = $this->db->query($sql);
        //var_dump($this->db->last_query());
        return $query->result_array();
    }
    //全体通知列表
    public function noticeList($info)
    {
        $sql = "select * from jm_notice WHERE id<? AND disabled=0  ORDER BY id desc limit 10";
        $query = $this->db->query($sql,$info);
        //var_dump($this->db->last_query());
        return $query->result_array();
    }
    //oneAll
    public function getOneNotice($noticeId)
    {
        $sql = "select * from jm_notice WHERE id=$noticeId";
        $query = $this->db->query($sql);
        //var_dump($this->db->last_query());
        return $query->result_array();
    }
    //last personal通知列表
    public function message($userId)
    {
        $sql = "select * from jm_message WHERE userId=$userId ORDER BY id desc limit 10";
        $query = $this->db->query($sql);
        //var_dump($this->db->last_query());
        return $query->result_array();
    }
    //个人通知列表
    public function messageList($userId,$info)
    {
        $sql = "select * from jm_message WHERE id<? AND userId=$userId ORDER BY id desc limit 10";
        $query = $this->db->query($sql,$info);
        //var_dump($this->db->last_query());
        return $query->result_array();
    }
    //onePersonal
    public function getOneMessage($messageId)
    {
        $sql = "select * from jm_message WHERE id=$messageId";
        $query = $this->db->query($sql);
        //var_dump($this->db->last_query());
        return $query->result_array();
    }
    //t全体通知详情
    public function noticeInfo($noticeId)
    {
        $query = $this->db->get_where('jm_notice',array('id'=>$noticeId));
        return $query->row_array();
    }
    //personal通知详情
    public function messageInfo($messageId)
    {
        $query = $this->db->get_where('jm_message',array('id'=>$messageId));
        return $query->row_array();
    }

    /*全部通知*/
    public function noticeList_all()
    {
        $query = $this->db->get_where('jm_notice',array('disabled'=>0));
        return $query->result_array();
    }
    /*personal通知*/
    public function messageList_all()
    {
        $query = $this->db->get_where('jm_message',array('disabled'=>0));
        return $query->result_array();
    }

    /*添加全体通知*/
    public function addNotices($info)
    {
        $this->db->insert('jm_notice',$info);
        return $this->db->insert_id();
    }
    /*添加个人通知*/
    public function sendPersonalNotice($info)
    {
        $this->db->insert('jm_message',$info);
        return $this->db->insert_id();
    }
    /*删除全体通知*/
    public function delete($noticeId)
    {
        $this->db->where('id',$noticeId);
        return $this->db->update('jm_notice',array('disabled'=>1));
    }
    /*删除personal通知*/
    public function deleteMessage($messageId)
    {
        $this->db->where('id',$messageId);
        return $this->db->update('jm_message',array('disabled'=>1));
    }
    /*修改全体通知*/
    public function editNotice($noticeId,$info)
    {
        $this->db->where('id',$noticeId);
        return $this->db->update('jm_notice',$info);
    }
    /*修改个人通知*/
    public function editMessage($messageId,$info)
    {
        $this->db->where('id',$messageId);
        $this->db->update('jm_message',$info);
        //return  $this->db->update_id();
        return $messageId;
    }
//获得用户
    public function getUser()
    {
        $query = $this->db->get_where('jm_user');
        return $query->result_array();
    }

}

?>
