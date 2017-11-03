
<?php

class Notice extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('notice_model');
    }

    public function login_check()
    {
//        $session_admin = $this->session->userdata('jm_admin');
//        if(!$session_admin){
//            redirect('admin/login');
//        }

    }
    /*页面 全体通知*/
    public function allNotices()
    {
        $this->login_check();
        $this->load->view('allNotices');
    }


    /*页面 全体通知管理*/
    public function manageNotice()
    {
        $this->login_check();
        $data['noticeList']=$this->notice_model->noticeList_all();
        $this->load->view('manageNotice',$data);
    }
    /*页面 个人通知管理*/
    public function manageMessage()
    {
        $this->login_check();
        $data['messageList']=$this->notice_model->messageList_all();
        $this->load->view('manageMessage',$data);
    }
    /*功能 上传全体通知*/
    public function addNotices()
    {
        $noticeName = $this->input->post('noticeName');
        $noticeTime = $this->input->post('noticeTime');
        $content  = $this->input->post('content');

        $info =array(
            'title'=> $noticeName,
            'date'=>$noticeTime,
            'content'=>$content,
        );

        $data['status']=$this->notice_model->addNotices($info);
        //$data['status']=true;
        $json = json_encode($data);
        print_r($json);
    }

    /*功能 删除全体通知*/
    public function deleteNotice()
    {
        $noticeId = $this->input->post('noticeId');
        $data['status'] = $this->notice_model->delete($noticeId);
        $json=json_encode($data);
        print_r($json);
    }
    /*功能 删除personal通知*/
    public function deleteMessage()
    {
        $messageId = $this->input->post('messageId');
        $data['status'] = $this->notice_model->deleteMessage($messageId);
        $json=json_encode($data);
        print_r($json);
    }
    /*页面 修改全体通知*/
    public function editNotice($noticeId)
    {
        $this->login_check();
        $data['noticeInfo']=$this->notice_model->noticeInfo($noticeId);
        //$data['sortList'] = $this->event_model->getSort();
        //var_dump($data);die;
        $this->load->view('editNotice',$data);
    }
    /*页面 修改personal通知*/
    public function editMessage($messageId)
    {
        $this->login_check();
        $data['messageInfo']=$this->notice_model->messageInfo($messageId);
        //$data['sortList'] = $this->event_model->getSort();
        //var_dump($data);die;
        $this->load->view('editMessage',$data);
    }

    /*功能 保存all修改*/
    public function editNotice_do()
    {
        $noticeId  =$this->input->post('noticeId');
        //var_dump($shopId);die;
        $noticeName = $this->input->post('noticeName');
        $noticeTime = $this->input->post('noticeTime');
        $content  = $this->input->post('content');
        $info =array(
            'title'=> $noticeName,
            'date'=>$noticeTime,
            'content'=>$content,
        );

        $data['status']=$this->notice_model->editNotice($noticeId,$info);
        //$data['status']=true;
        $json = json_encode($data);
        print_r($json);
    }
    /*功能 保存personal修改*/
    public function editMessage_do()
    {
        $messageId  =$this->input->post('noticeId');
        $userId = $this->input->post('userId');
        $noticeName = $this->input->post('noticeName');
        $noticeTime = $this->input->post('noticeTime');
        $content  = $this->input->post('content');
        $info =array(
            'title'=> $noticeName,
            'userId'=> $userId,
            'date'=>$noticeTime,
            'content'=>$content,
        );

        $data['status']=$this->notice_model->editMessage($messageId,$info);
        //$data['status']=true;
        $json = json_encode($data);
        print_r($json);
    }
    /*页面 个人通知*/
    public function personalNotice()
    {
        $this->login_check();
        $data['userList'] = $this->notice_model->getUser();
        $this->load->view('personalNotice',$data);
    }
    /*页面 发送个人通知*/
    public function addPersonalNotice()
    {
        $this->login_check();
        $data['userId'] = $this->input->get("userId");
        $this->load->view('addPersonalNotice',$data);
    }
    /*功能 上传个人通知*/
    public function sendPersonalNotice()
    {
        $userId = $this->input->post('userId');
        $noticeName = $this->input->post('noticeName');
        $noticeTime = $this->input->post('noticeTime');
        $content  = $this->input->post('content');

        $info =array(
            'userId'=>$userId,
            'title'=> $noticeName,
            'date'=>$noticeTime,
            'content'=>$content,
        );

        $data['status']=$this->notice_model->sendPersonalNotice($info);
        //$data['status']=true;
        $json = json_encode($data);
        print_r($json);
    }

    //推送
    public function do_push()
    {
        $title = $this->input->post('noticeName');
        $time = $this->input->post('noticeTime');
        $content = $this->input->post('content');
        $data['tags']= $this->input->post('userId');
        $data['id']= $this->input->post('id');

        //var_dump( $data['tags']);die;

        $data['info']=array(
            'title'=>$title,
            'time'=>$time,
            'content'=>$content,
        );


        //var_dump($data);
        //die;
        $this->load->view('jpush/examples/PushExample',$data);

    }
}
?>