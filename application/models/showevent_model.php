<?php

/**
 *
 *  DESC   : 设备获取
 *  AUTHOR : yyj.tom@hotmail.com
 *  DATE   : 2014/10/25
 *
 **/

class Showevent_model extends CI_Model {
    public function __construct()
    {
        $this->load->database();
    }




    //获取adImg by page
    public function get_event($id)
    {
        $query = $this->db->get_where('jm_event',array('id'=>$id,'disable'=>0));
        return $query->row_array();
    }


}

?>
