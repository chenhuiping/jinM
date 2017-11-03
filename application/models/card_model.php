<?php


class card_model extends CI_Model {
    public function __construct()
    {
        $this->load->database();
    }

    //获取plateInfo
    public function plateInfo()
    {
        $query = $this->db->get_where('jm_plate',array('status'=>0));
        return $query->result_array();
    }


    //获取当前板块信息by plateId
    public function getPlate($plateId)
    {
        $query=$this->db->get_where('jm_plate',array('status'=>0,'id'=>$plateId));
        return $query->row_array();
    }

    //获取当前板块下的帖子信息并计数当前帖子的回帖量（倒序）
    public function cardList($plateId)
    {
        $sql = "SELECT * from jm_card LEFT JOIN (select jm_followcard.cardId as countSid,count(*) from jm_followcard WHERE jm_followcard.`disable` =0 GROUP BY jm_followcard.cardId) as a on jm_card.id=a.countSid  WHERE jm_card.`disable` = 0  AND jm_card.plateId = '".$plateId."' ORDER BY date DESC";
        $query = $this->db->query($sql);
        return $query->result_array();
    }



    //获取当前帖子信息by cardId
    public function getCard($cardId)
    {
        $query=$this->db->get_where('jm_card',array('disable'=>0,'id'=>$cardId));
        return $query->row_array();
    }

    //select 所有followcard by cardId
    public function followCardList($cardId)
    {
        $query = $this->db->get_where('jm_followcard',array('cardId'=>$cardId,'disable'=>0));
        return $query->result_array();
    }
    //删帖子
    public function delCard($cardId)
    {
        $this->db->where('id',$cardId);
        $query1=$this->db->update('jm_card',array('disable'=>1));

        return $query2=$this->db->update('jm_card',array('disable'=>1));
    }




    //删回帖
    public function delFollowCard($followCardId)
    {
        $this->db->where('id',$followCardId);
        return $query=$this->db->update('jm_followCard',array('disable'=>1));

    }


    //获取板块信息by id
    public function getPlateInfo_by_id($plateId)
    {
        $query = $this->db->get_where('jm_plate',array('status'=>0,'id'=>$plateId));
        //var_dump($query->row_array());die;
        return $query->row_array();
    }

    /*修改活动*/
    public function editPlate($plateId,$info)
    {
        $this->db->where('id',$plateId);
        return $this->db->update('jm_plate',$info);
    }


    /*添加plate*/
    public function addPlate($info)
    {
        return $this->db->insert('jm_plate',$info);
    }

    //删除plate 板块
    public function delPlateInfo($plateId)
    {
        $this->db->where('id',$plateId);
        return $this->db->update('jm_plate',array('status'=>1));
    }








}

?>
