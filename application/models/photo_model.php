<?php

/**
 *
 *  DESC   : 设备获取
 *  AUTHOR : yyj.tom@hotmail.com
 *  DATE   : 2014/10/25
 *
**/

class Photo_model extends CI_Model {
	public function __construct()
	{
		$this->load->database();
	}

    public function insert_photoInfo($photoInfo)
    {
        return $this->db->insert('egj_photo', $photoInfo);
    }


    public function get_photolist_by_shopid($shopid)
    {
//        $query=$this->db->get_where('egj_photo',array('shopid'=>$shopid));
//        return $query->result_array();
        $query=$this->db->query("SELECT * from jm_album where shopId='".$shopid."' order by id desc");
        return $query->result_array();
    }

    public function delete_photo($photoid)
    {
        return $this->db->delete("egj_photo",array("id"=>$photoid));
    }
}

?>
