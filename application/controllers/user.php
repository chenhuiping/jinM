<?php

class User extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('user_model');
//        $this->load->model('handle_model');
    }

    /*功能 获取所有用户类型*/
    public function getUserType()
    {
        $data['typeList'] = $this->user_model->getUserType();
        return $data;
    }

    /*功能 根据传值每次获取10个用户*/
    public function getUser()
    {
        $uId = $this->input->post('uId');
        if(!$uId){$uId=0;}
        $data['userList'] = $this->user_model->getUser($uId);

        $json = json_encode($data);
        print_r($json);
    }

    /*功能 添加用户*/
    public function add()
    {
        $nickName = $this->input->post('nickName');
        $realName = $this->input->post('realName');
        $password = $this->input->post('password');
        $email = $this->input->post('email');
        $radiobtns = $this->input->post('radiobtns');

        $userInfo = array(
            'nickName'=>$nickName,
            'realName'=>$realName,
            'password'=>$password,
            'email'=>$email,
            'roleId'=>$radiobtns,
        );
//        var_dump($userInfo);
        $this->user_model->addUser($userInfo);
        redirect('admin/index');
    }

    /*功能 判断是否存在email*/
    public function checkEmail()
    {
        $email = $this->input->post('email');
        $user = $this->user_model->checkEmail($email);
//        var_dump($user);die;
        if($user){
            $data=1;
        }
        else{$data=0;}
        $json=json_encode($data);
        print_r($json);
    }


}
?>















