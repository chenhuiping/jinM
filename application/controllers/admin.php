<?php

class Admin extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('admin_model');
    }

    /*页面 主页*/
    public function index()
    {
//        $this->login_check();
        $this->load->view('index');
//        $meanuid=$this->input->get('meanuId');
//        $data['meanuId']= ($meanuid)?$meanuid:1;
//        //  var_dump( $data['meanuId']);
//        $this->login_check();
//        $data['username']= $this->session->userdata('admin_user_name');
//        $this->load->view('admin/indexframe',$data);

    }

    /*页面 登录*/
    public function login()
    {
        $this->load->view('login');
    }

    public function login_check()
    {
//        $session_admin = $this->session->userdata('jm_admin');
//        if(!$session_admin){
//            redirect('admin/login');
//        }

    }

    /*功能 登录*/
    public function login_do()
    {
        $email =  $this->input->post('email');
        $password = $this->input->post('password');

//        $userId=2;
//        $password ="5245201175";

        $loginInfo = array(
            'email'=>$email,
            'password'=> md5($password),
        );
        $user = $this->admin_model->login_do($loginInfo);
        if(!count($user)){
            //false
            $data['status']=false;
//            redirect('admin/login');
        }
        else{
            //success
            $data['status']=true;
            //var_dump($user['nickName']);die;
            $this->session->set_userdata(array('jm_admin'=>$user['nickName'],'jm_admin_id'=>$user['id']));
//            redirect('admin/index');
        }
        $json = json_encode($data);
        print_r($json);
    }
    public function logout()
    {
        $this->session->sess_destroy();



            if(!empty($_COOKIE['jm_admin_id']) || !empty($_COOKIE['jm_admin'])){
                setcookie("jm_admin_id", null, time()-3600*24*365);
                setcookie("jm_admin", null, time()-3600*24*365);
            }

        redirect('/admin/login');
        return;
    }



}
?>
















