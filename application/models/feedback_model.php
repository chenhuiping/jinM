<?php


class Feedback_model extends CI_Model {
    public function __construct()
    {
        $this->load->database();
    }

//  反馈列表
    public function feedbackList($info)
    {
        $sql = "select * from jm_feedback WHERE id>0 ORDER BY id limit 10";
        $query = $this->db->query($sql,$info);
        //var_dump($this->db->last_query());
        return $query->result_array();
    }

	//活动详情
	public function feedbackInfo($feedbackId)
	{
		$query = $this->db->get_where('jm_feedback',array('id'=>$feedbackId));
		return $query->row_array();
	}

//    发反馈
    public function setFeedback($info)
    {
        return $this->db->insert('jm_feedback',$info);
    }
    //获取所有反馈
    public function get_feedback_all()
    {
        $query = $this->db->get_where('jm_feedback', array('disable' => '0'));
        return $query->result_array();
    }

    public function get_feedback_history()
    {
        $query = $this->db->get_where('jm_feedback', array('disable' => '1'));
        return $query->result_array();
    }
    //删除（update）反馈
    public function update_feedback_status($fbid)
    {
        $this->db->where('id', $fbid);
        return $this->db->update('jm_feedback', array('disable' => '1'));
    }




}

?>
