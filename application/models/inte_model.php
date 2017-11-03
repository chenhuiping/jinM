<?php

/**
 *
 *  DESC   : 设备获取
 *  AUTHOR : yyj.tom@hotmail.com
 *  DATE   : 2014/10/25
 *
**/

class Inte_model extends CI_Model {
	public function __construct()
	{
		$this->load->database();
	}

//    获取积分操作类型
    public function GetInteType($typeInfo)
    {
        $query = $this->db->get_where('jm_intetype',$typeInfo);
        return $query->row_array();
    }

//    增加积分
    public function IncreaseInte($userId,$inte)
    {
        $sql = "update jm_user set integral= integral+".$inte." where id=".$userId;
        $query = $this->db->query($sql);
    }
}

?>
