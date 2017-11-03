
<?php

class Event extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('event_model');
    }

    public function login_check()
    {
//        $session_admin = $this->session->userdata('jm_admin');
//        if(!$session_admin){
//            redirect('admin/login');
//        }

    }
    /*页面 添加活动*/
    public function addEvent()
    {
        $this->login_check();
        $data['sortList'] = $this->event_model->getSort();
        $this->load->view('addEvent',$data);
    }
    /*页面 添加工作*/
    public function addJob()
    {
        $this->login_check();
        //$data['sortList'] = $this->event_model->getSort();
        $this->load->view('addJob');
    }
    /*页面 添加issue*/
    public function addIssue()
    {
        $this->login_check();
        //$data['sortList'] = $this->event_model->getSort();
        $this->load->view('addIssue');
    }
    /*页面 工作管理*/
    public function manageJob()
    {
        $this->login_check();
        $data['jobList']=$this->event_model->jobList_all();
        $this->load->view('manageJob',$data);
    }

    /*页面 投票管理*/
    public function manageVote()
    {
        $this->login_check();
        $data['voteList']=$this->event_model->voteList_all();
     //   var_dump($data['voteList']);die;
        $this->load->view('manageVote',$data);
    }

    /*页面 issue管理*/
    public function manageIssue()
    {
        $this->login_check();
        $data['issueList']=$this->event_model->issueList_all();
        $this->load->view('manageIssue',$data);
    }
    /*页面 添加活动*/
    public function addEvent1()
    {
        $this->login_check();
        $this->load->view('addEvent1');
    }

    /*页面 活动管理*/
    public function manage()
    {
        $this->login_check();
        $data['eventList']=$this->event_model->eventList_all();
        $this->load->view('manageEvent',$data);
    }

    /*功能 上传活动*/
    public function addEvent_do()
    {

        $imagePath =$this->input->post('imagePath');
        $imgPath =$this->input->post('imgPath');


        $eventName = $this->input->post('eventName');
        $eventTime = $this->input->post('eventTime');
        $address = $this->input->post('address');
        $category  = $this->input->post('category');
        $content  = $this->input->post('content');
        $tag  = $this->input->post('tag');

        $info =array(
            'name'=>$eventName,
            'date'=>$eventTime,
            'address'=>$address,
            'typeId'=>$category,
            'image'=>$imgPath,
            'content'=>$content,
            'tag'=>$tag,
        );

        $data['status']=$this->event_model->addEvent($info);
        //$data['status']=true;
        $json = json_encode($data);
        print_r($json);
    }


    /*功能 上传图片*/
    public function uploadEtPhoto()
    {
        $fileDir='uploads/event/';
        $filePath='./uploads/event/';

        $randTemp=date('YmdHis').rand(1000,9999);
        $fileName=$randTemp.".jpg";
        $fileThuName=$randTemp."_thumb.jpg";

        if (!file_exists($filePath))
        {
            mkdir ($filePath);
        }

        //上传图片
        $config['upload_path'] =$filePath;
        $config['allowed_types'] = '*';
        $config['max_size'] = '20000';
        $config['max_width']  = '10240';
        $config['max_height']  = '7680';
        $config['overwrite']=true;
        $config['file_name']=$fileName;

        // $config['file_name']=date('YmdHis').rand(100,999).$userid;
        $this->load->library('upload', $config);



        if ( ! $this->upload->do_upload())
        {
            $error = array('error' => $this->upload->display_errors());
            var_dump($error);die;
        }
        else
        {
            //处理图像,将其宽高最大值设置为100*100
            $config['image_library'] = 'gd2';
            $config['source_image'] = $filePath.$fileName;
            $config['create_thumb'] = TRUE;
            $config['maintain_ratio'] = true;
            $config['width'] = 600;
//            $config['height'] = 100;
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();

            //$data = array('upload_data' => $this->upload->data());
            $path = $fileDir.$fileName;
            $thumb_path=$fileDir.$fileThuName;
            $data['path']=$path;
            $data['thumb_path']=$thumb_path;

            $json=json_encode($data);
            print_r($json);
        }
    }


    /*功能 删除活动*/
    public function delete()
    {
        $eventId = $this->input->post('eventId');
        $data['status'] = $this->event_model->delete($eventId);
        $json=json_encode($data);
        print_r($json);
    }

    /*页面 修改活动*/
    public function editEvent($eventId)
    {
        $this->login_check();
        $data['eventInfo']=$this->event_model->eventInfo($eventId);
        $data['sortList'] = $this->event_model->getSort();
        //var_dump($data);die;
        $this->load->view('editEvent',$data);
    }
    /*页面 修改job*/
    public function editJob($jobId)
    {
        $this->login_check();
        $data['jobInfo']=$this->event_model->eventInfo($jobId);
       // $data['sortList'] = $this->event_model->getSort();
        //var_dump($data);die;
        $this->load->view('editJob',$data);
    }

    /*页面 修改vote*/
    public function editVote($voteId,$aId)
    {
        $this->login_check();
        $data['voteInfo']=$this->event_model->voteInfo($voteId,$aId);
//        var_dump($data['voteInfo']);

        // $data['sortList'] = $this->event_model->getSort();
        $this->load->view('editVote',$data);
    }
    /*页面 修改issue*/
    public function editIssue($issueId)
    {
        $this->login_check();
        $data['issueInfo']=$this->event_model->eventInfo($issueId);
        // $data['sortList'] = $this->event_model->getSort();
        //var_dump($data);die;
        $this->load->view('editIssue',$data);
    }

    /*功能 保存修改*/
    public function editEvent_do()
    {
        $eventId  =$this->input->post('eventId');
        $imagePath =$this->input->post('imagePath');
        $imgPath =$this->input->post('imgPath');
        $eventName = $this->input->post('eventName');
        $eventTime = $this->input->post('eventTime');
        $address = $this->input->post('address');
        $category  = $this->input->post('category');
        $content  = $this->input->post('content');
        $tag  = $this->input->post('tag');
        $info =array(
            'name'=>$eventName,
            'date'=>$eventTime,
            'address'=>$address,
            'typeId'=>$category,
            'image'=>$imgPath,
            'content'=>$content,
            'tag'=>$tag,
        );

        $data['status']=$this->event_model->editEvent($eventId,$info);
        //$data['status']=true;
        $json = json_encode($data);
        print_r($json);
    }
    /*功能 vote保存修改*/
    public function editVote_do($voteQid,$voteAid)
    {
//        $voteQid  = $this->input->post('voteQid');
//        $voteAid = $this->input->post('voteAid');
//        var_dump($voteQid);
//        var_dump($voteAid);die;
        $voteContent =$this->input->post('voteContent');
        $voteNum =$this->input->post('voteNum');


        $info =array(
            'qid'=>$voteQid,
            'value'=>$voteAid,
            'acontent'=>$voteContent,
            'num'=>$voteNum


        );
        $data['status']=$this->event_model->editVote($voteQid,$voteAid,$voteNum);

        //$data['status']=true;
        $json = json_encode($data);
        print_r($json);
    }


    /*功能 获得分类*/
    public function getSort()
    {
        $data['cateGoryList'] = $this->event_model->getSort();
    }

}
?>










