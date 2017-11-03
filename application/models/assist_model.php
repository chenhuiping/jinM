<?php


class Assist_model extends CI_Model {
    public function __construct()
    {
        $this->load->database();
    }

//    帮助列表
    public function assistList($aid)
    {
        $sql = "select jm_assist.*,jm_user.nickName as nickName from jm_assist,jm_user WHERE jm_user.id = jm_assist.userId AND jm_assist.id<".$aid." AND jm_assist.`disable` = 0  ORDER BY id DESC limit 10";
        $query = $this->db->query($sql);
        //var_dump($this->db->last_query());
        return $query->result_array();
    }

//    回复列表
    public function followAssistList($info)
    {
        $sql = "select jm_followAssist.*,jm_user.nickName AS nickName from jm_followAssist,jm_user WHERE jm_user.id = jm_followAssist.userId AND jm_followAssist.`disable`=0 AND jm_followAssist.id<? AND jm_followAssist.assistId=? ORDER BY id DESC limit 10";
        $query = $this->db->query($sql,$info);
        //var_dump($this->db->last_query());
        return $query->result_array();
    }

//    发求助
    public function setAssist($info)
    {
        return $this->db->insert('jm_assist',$info);
    }

//    回复
    public function setFollowAssist($info)
    {
        return $this->db->insert('jm_followAssist',$info);
    }

//    public function plateList()
//    {
//        $sql = "";
//        $query = $this->db->query($sql);
//        return $query->result_array();
//    }


}

?>
