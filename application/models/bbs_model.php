<?php


class Bbs_model extends CI_Model {
    public function __construct()
    {
        $this->load->database();
    }

//    板块列表

    public function plateList($pid)
    {
        $sql = "select * from jm_plate WHERE  id>".$pid." and status=0 ORDER BY id limit 10";
        $query = $this->db->query($sql);
        //var_dump($this->db->last_query());
        return $query->result_array();
    }

//    帖子列表
    public function cardList($info)
    {
        $sql = "select jm_card.*,jm_user.nickName as nickName from jm_card,jm_user WHERE jm_user.id = jm_card.userId AND jm_card.id<? AND jm_card.plateId=? AND jm_card.`disable` = 0  ORDER BY id DESC limit 10";
//        $sql = "select jm_card.*,jm_user.nickName as nickName from jm_card,jm_user WHERE jm_user.id = jm_card.userId AND jm_card.plateId=1 AND jm_card.`disable` = 1  ORDER BY `order` DESC limit 0,10";
        $query = $this->db->query($sql,$info);
        return $query->result_array();
    }
//    回帖列表
    public function followCardList($info)
    {
        $sql = "select jm_followCard.*,jm_user.nickName AS nickName from jm_followCard,jm_user WHERE jm_user.id = jm_followcard.userId AND jm_followcard.`disable`=0 AND jm_followCard.id>? AND jm_followCard.cardId=? ORDER BY id  limit 10";
        $query = $this->db->query($sql,$info);
        //var_dump($this->db->last_query());
        return $query->result_array();
    }

//    帖子详情
    public function cardInfo($cardId)
    {
        $query = $this->db->get_where('jm_card',array('id'=>$cardId));
        return $query->row_array();
    }


//    发帖
    public function sendCard($cardInfo)
    {
        return $this->db->insert('jm_card',$cardInfo);
    }

//    回帖
    public function reply($replyInfo)
    {
        return $this->db->insert('jm_followCard',$replyInfo);
    }

//    public function plateList()
//    {
//        $sql = "";
//        $query = $this->db->query($sql);
//        return $query->result_array();
//    }


}

?>
