<?php

/**
 *
 *  DESC   : 设备获取
 *  AUTHOR : yyj.tom@hotmail.com
 *  DATE   : 2014/10/25
 *
 **/

class AdImg_model extends CI_Model {
    public function __construct()
    {
        $this->load->database();
    }


    //获取所有adImg
    public function get_adImg_all()
    {
        $query = $this->db->get_where('jm_adimg',array('disabled'=>0));
        return $query->result_array();
    }

    //获取adImg by page
    public function get_adImg($page)
    {
        $query = $this->db->get_where('jm_adimg',array('page'=>$page,'disabled'=>0));
        return $query->result_array();
    }

    //insert adImg by page
    public function insert_adImg($page)
    {
        return $this->db->insert('jm_adimg', $page);
    }

    //删除adImg   update
    public function delete_adImg($imgId)
    {
        $this->db->where('id',$imgId);
        return $this->db->update("jm_adimg",array("disabled"=>1));
    }

//    获取图片 分小区
    public function get_adImg_New($page,$communityId)
    {
        $sql = "SELECT * FROM egj_adimg WHERE page=".$page." and (communityId=".$communityId." OR communityId=0) and disabled=0";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

//    获取首页广告图
    public function advertImage()
    {
        $query = $this->db->get_where('jm_advert');
        return $query->row_array();
    }

//    更新首页广告图
    public function updateAdvert($imgInfo)
    {
        $this->db->where('id',1);
        return $this->db->update("jm_advert",$imgInfo);
    }
}

?>
