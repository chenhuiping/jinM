
<?php

class Card extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('card_model');
    }

    public function login_check()
    {
//        $session_admin = $this->session->userdata('jm_admin');
//        if(!$session_admin){
//            redirect('admin/login');
//        }

    }

    /*页面 帖子管理*/
    public function manageCard()
    {
        $this->login_check();
        $data['plateList']=$this->card_model->plateInfo();
//        $data['communityList']=$this->user_model->getCommunity();
        $this->load->view('manageCard',$data);
    }

    //访问论坛
    public function cardList($plateId)
    {
        $this->login_check();
        $data['plateInfo']=$this->card_model->getPlate($plateId);
        $data['cardListInfo']=$this->card_model->cardList($plateId);
        //$data['userInfo']=$this->info_model->getUserInfo();

        //var_dump($data);die;
        //redirect("index/index.php");
        $this->load->view('cardlistInfo',$data);
    }

    //帖子内容显示
    public function card($cardId)
    {
        $this->login_check();
//        $this->viewAdd($cardId);
        $data['cardInfo']=$this->card_model->getCard($cardId);
        $data['followCardList']=$this->card_model->followCardList($cardId);
//        $data['userInfo']=$this->info_model->getUserInfo();
        //$data['IconInfo']=$this->bbs_model->getUserIcon();
        //var_dump( $data['followCardList']);die;

        $this->load->view('cardInfo',$data);
    }


    //删除整个帖子
    public function deleteCard($plateId,$cardId)
    {
        $data['status']=$this->card_model->delCard($cardId);
        if($data['status']==true){
            //            echo("<script type='text/javascript'>alert('删除成功！');</script>");
            redirect('/admin/cardlist/'.$plateId);
        }else{
            echo("<script type='text/javascript'>alert('删除失败！');history.back();</script>");
        }


    }



    //删除回帖
    public function deleteFollowCard($cardId,$followCardId)
    {
        $data['status']=$this->card_model->delFollowCard($followCardId);
        if($data['status']==true){
                        echo("<script type='text/javascript'>alert('删除成功！');</script>");
            redirect('/card/card/'.$cardId);
        }else{
                       echo("<script type='text/javascript'>alert('删除失败！');history.back();</script>");
        }

    }

    //修改板块信息界面
    public function editPlateInfo($plateId)
    {
        $this->login_check();
        $data['plateInfo'] = $this->card_model->getPlateInfo_by_id($plateId);

        $this->load->view('editPlateInfo',$data);
    }


    /*功能 保存修改*/
    public function editPlate_do()
    {
        $eventId  =$this->input->post('plateId');
        $imagePath =$this->input->post('imagePath');
        $imgPath =$this->input->post('imgPath');


        $plateName = $this->input->post('plateName');


        $info =array(
            'name'=>$plateName,

            'image'=>$imgPath

        );

        $data['status']=$this->card_model->editPlate($eventId,$info);
        //$data['status']=true;
        $json = json_encode($data);
        print_r($json);
    }

    /*页面 addPlate*/
    public function addPlate()
    {
        $this->login_check();
        //$data['sortList'] = $this->event_model->getSort();
        $this->load->view('addPlate');
    }
    //删除板块 ok
    public function delPlateInfo($plateId)
    {
        //$userId = $this->input->post('userId');
        //$userId = 1;
        $data['status']=$this->card_model->delPlateInfo($plateId);
        //var_dump($data['status']);die;
        redirect('card/manageCard');
    }

    /*功能 上传图片*/
    public function uploadPtPhoto()
    {
        $fileDir='uploads/plate/';
        $filePath='./uploads/plate/';

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

    /*功能 上传plate*/
    public function addPlate_do()
    {

        $imagePath =$this->input->post('imagePath');
        $imgPath =$this->input->post('imgPath');


        $plateName = $this->input->post('plateName');


        $info =array(
            'name'=>$plateName,

            'image'=>$imgPath
        );

        $data['status']=$this->card_model->addPlate($info);
        //$data['status']=true;
        $json = json_encode($data);
        print_r($json);
    }








}
?>










