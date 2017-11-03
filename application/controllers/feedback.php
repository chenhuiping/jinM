<?php

class Feedback extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('file');
        $this->load->model('shop_model');
        $this->load->model('feedback_model');
        $this->load->model('user_model');
    }
    public function login_check()
    {
//        $user_id=$this->session->userdata('user_id');
//        if($user_id!=null)
//        {
//            return $user_id;
//        }else
//        {
//            redirect("/user/login");
//            return null;
//        }
    }

    /**
     * 此方法用于获取所有反馈
     */
    public  function show()
    {
        $data['feedbackList']=$this->feedback_model->get_feedback_all();
       //var_dump($data['shopInfoList']);die;
        $data['userList']=$this->user_model->userName_all();
        $this->load->view('feedback',$data);
    }

    //删除反馈 by id
    public function del()
    {
        $fbid=$this->input->get('id');
        $this->feedback_model->update_feedback_status($fbid);

        redirect("index?meanuId=8");
    }

    //查看历史
    public  function showHistory()
    {
        $data['feedbackList']=$this->feedback_model->get_feedback_history();
        $data['userList']=$this->user_model->userName_all();
        //var_dump($data['shopInfoList']);die;
        $this->load->view('fbHistory',$data);
    }







}
?>

