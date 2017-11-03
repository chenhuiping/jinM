<?php

/**
 *
 *  DESC   : 设备获取
 *  AUTHOR : yyj.tom@hotmail.com
 *  DATE   : 2014/10/25
 *
**/

class Version_model extends CI_Model {
	public function __construct()
	{
		$this->load->database();
	}

    public function getVersion($plate)
    {
        //$plate = "ios";
        $sql = "SELECT * FROM jm_version WHERE platform='".$plate."' ORDER BY date DESC LIMIT 1";
        //$query = $this->db->get_where('egj_version', array('platform' =>$platform));
        $query = $this->db->query($sql);
        return $query->row_array();
    }

//    查设备号是否存过
    public function searchInstalledLog($IEMI)
    {
        $query = $this->db->get_where('jm_installed',array('IMEI'=>$IEMI));
        return $query->row_array();
    }

//    插入新设备号
    public function insertInstalledLog($IEMI)
    {
        return $this->db->insert('jm_installed',array('IMEI'=>$IEMI));
    }
}

?>
