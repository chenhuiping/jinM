<?php

class Adimg extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('file');
        $this->load->model('shop_model');
        $this->load->model('adImg_model');
        $this->load->model('user_model');
    }

    //检查是否登陆
    public function login_check()
    {
//        $session_admin = $this->session->userdata('jm_admin');
//        if(!$session_admin){
//            redirect('admin/login');
//        }
    }

    public function addAdimg()
    {
        $this->login_check();
        //$data['communityList']=$this->user_model->getCommunity();
        $this->load->view('addAdimg');
    }


    //获取所有图片
    public function show()
    {
        //$page=1;
        //$data['adImglist']=$this->adImg_model->get_adImglist($page);
        $data['adImglist']=$this->adImg_model->get_adImg_all();
        //print_r($data['adImglist']);
        $this->load->view('showAdimg',$data);

    }

    //完成上传adImg
    public  function finishiAdd()
    {
        $desc=$this->input->post('desc');
        $page=$this->input->post('page');
        $url=$this->input->post('url');
        $fileName=date('YmdHis').rand(1000,9999).$page.".jpg";

        $fileDir='uploads/ad/'.$page."/";
        $filePath='./uploads/ad/'.$page."/";
        if (!file_exists($filePath))
        {
            mkdir ($filePath);
        }
        //上传图片
        $config['upload_path'] =$filePath;
        $config['allowed_types'] = 'gif|jpg|png';
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
            $data = array('upload_data' => $this->upload->data());
        }
        //处理图像,将其宽高最大值设置为100*100
        $config['image_library'] = 'gd2';
        $config['source_image'] = $filePath.$fileName;
        $config['create_thumb'] = false;
        $config['maintain_ratio'] = TRUE;
        $config['width'] = 600;
        $config['height'] = 400;
        $this->load->library('image_lib', $config);
        $this->image_lib->resize();

        $imgInfo=array(
            'page' =>$page,
            'path'=>$fileDir.$fileName,
            'disabled'=>"0",
            'desc'=>$desc,
            'url'=>$url,
        );
        $this->adImg_model->insert_adImg($imgInfo);
        //跳转到查看相册页面
        redirect("adimg/show");
    }

    //删除adImg by id
    public function del()
    {
        $imgId=$this->input->get('id');
        $this->adImg_model->delete_adImg($imgId);

        //跳转到查看相册页面
        redirect("adimg/show");
    }

    /* JX
     * 上传首页广告图页面
     * 2016-01-07
     */
    public function addAdvert()
    {
        $this->load->view('addAdvert');
    }

    /* JX
     * 上传首页广告图
     * 2016-01-07
     */
    public function finishiAddAdvert()
    {
        $url=$this->input->post('url');
        $fileName="jinMIndexAdvert.jpg";
        $fileDir='uploads/indexAdvert/';
        $filePath='./uploads/indexAdvert/';

        if (!file_exists($filePath))
        {
            mkdir ($filePath);
        }

        //上传图片
        $config['upload_path'] =$filePath;
        $config['allowed_types'] = 'gif|jpg|png';
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
            $data = array('upload_data' => $this->upload->data());
        }

        //处理图像,将其宽高最大值设置为100*100
        $config['image_library'] = 'gd2';
        $config['source_image'] = $filePath.$fileName;
        $config['create_thumb'] = false;
        $config['maintain_ratio'] = TRUE;
        $config['width'] = 600;
        $config['height'] = 800;
        $this->load->library('image_lib', $config);
        $this->image_lib->resize();

        $imgInfo=array(
            'url'=>$url,
        );

        $this->adImg_model->updateAdvert($imgInfo);
        echo "<script type='text/javascript'>alert('上传成功！');</script>";
        redirect("adimg/addAdvert");

    }




}
?>

