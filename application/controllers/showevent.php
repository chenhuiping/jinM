<?php

class Showevent extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('showevent_model');
    }

    /*页面 主页*/
    public function index($id)
    {
//        $this->login_check();
        $data['eventList']=$this->showevent_model->get_event($id);
        $this->load->view('eventview',$data);

    }






}
?>
















