
<?php

class Shop extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('shop_model');
    }

    public function login_check()
    {
//        $session_admin = $this->session->userdata('jm_admin');
//        if(!$session_admin){
//            redirect('admin/login');
//        }

    }

    /*页面 添加店铺*/
    public function addShop()
    {
        $this->login_check();
        $data['categoryList'] = $this->shop_model->getCategory();
        $this->load->view('addShop',$data);
    }

    /*页面 店铺管理*/
    public function manage()
    {
        $this->login_check();
        $data['shopList']=$this->shop_model->shopList_all();
        $this->session->set_userdata(array('shopId'=>''));
        $this->load->view('manageShop',$data);
    }

    /*功能 上传店铺*/
    public function addShop_do()
    {
        $imagePath =$this->input->post('imagePath');
        $imgPath =$this->input->post('imgPath');
        $location = $this->input->post('location');
        $childId = $this->input->post('childId');

        $shopName = $this->input->post('shopName');
        $tel = $this->input->post('tel');
        $address = $this->input->post('address');
        $intro = $this->input->post('intro');
        $desc = $this->input->post('desc');
        $discount = $this->input->post('discount');
        $disTitle = $this->input->post('disTitle');
        $category  = $this->input->post('category');
        $date = date('Y-m-d H:i:s');

        $info = array(
            'name'=>$shopName,
            'tel'=>$tel,
            'address'=>$address,
            'intro'=>$intro,
            'desc'=>$desc,
            'typeId'=>$category,
            'childId'=>$childId,
            'img'=>$imgPath,
            'image'=>$imagePath,
            'location'=>$location,
            'updateTime'=>$date,
            'discount'=>$discount,
            'disTitle'=>$disTitle,
        );

        $data['status']=$this->shop_model->addShop($info);
        //$data['status']=true;
        $json = json_encode($data);
        print_r($json);
    }


    /*功能 上传图片*/
    public function uploadSpPhoto()
    {
        $fileDir='uploads/shop/';
        $filePath='./uploads/shop/';

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
            $config['width'] = 150;
            $config['height'] = 150;
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

    /*功能 上传图片*/
    public function uploadCgPhoto()
    {
        $fileDir='uploads/category/';
        $filePath='./uploads/category/';

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
            $config['width'] = 150;
            $config['height'] = 150;
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


    /*功能 删除店铺*/
    public function delete()
    {
        $shopId = $this->input->post('shopId');
        $data['status'] = $this->shop_model->delete($shopId);
        $json=json_encode($data);
        print_r($json);
    }
    /*功能 删除店铺comm*/
    public function deleteComm()
    {
        $commId = $this->input->post('commId');
        $data['status'] = $this->shop_model->deleteComm($commId);
        $json=json_encode($data);
        print_r($json);
    }
    /*页面 manageComm*/
    public function editComm($shopId)
    {
        $this->login_check();
        $data['commInfo']=$this->shop_model->commInfo($shopId);
        //$data['categoryList'] = $this->shop_model->getCategory();
       // $data['childAll']=$this->shop_model->childAll();
        //var_dump($data);die;
        $this->load->view('manageComm',$data);
    }
    /*页面 修改店铺*/
    public function editShop($shopId)
    {
        $this->login_check();
        $data['shopInfo']=$this->shop_model->shopInfo($shopId);
        $data['categoryList'] = $this->shop_model->getCategory();
        $data['childAll']=$this->shop_model->childAll();
        //var_dump($data);die;
        $this->load->view('editShop',$data);
    }

    /*功能 保存修改*/
    public function editShop_do()
    {
        $shopId  =$this->input->post('shopId');
        $imagePath =$this->input->post('imagePath');
        $imgPath =$this->input->post('imgPath');
        $childId = $this->input->post('childId');

        $shopName = $this->input->post('shopName');
        $tel = $this->input->post('tel');
        $address = $this->input->post('address');
        $intro = $this->input->post('intro');
        $desc = $this->input->post('desc');
        $discount = $this->input->post('discount');
        $disTitle = $this->input->post('disTitle');
        $category  = $this->input->post('category');
        $location = $this->input->post('location');
        $date = date('Y-m-d H:i:s');

        $info =array(
            'name'=>$shopName,
            'tel'=>$tel,
            'address'=>$address,
            'intro'=>$intro,
            'desc'=>$desc,
            'typeId'=>$category,
            'childId'=>$childId,
            'img'=>$imgPath,
            'location'=>$location,
            'image'=>$imagePath,
            'updateTime'=>$date,
            'discount'=>$discount,
            'disTitle'=>$disTitle,

        );

        $data['status']=$this->shop_model->editShop($shopId,$info);
        //$data['status']=true;
        $json = json_encode($data);
        print_r($json);
    }


    /*页面 管理分类*/
    public function manageCategory()
    {
        $this->login_check();
        $data['categoryList'] = $this->shop_model->getCategory();
        $this->load->view('manageCategory',$data);
    }

    /*页面 添加分类*/
    public function addCategory()
    {
        $this->login_check();
        $this->load->view('addCategory');
    }

    /*功能 添加分类*/
    public function addCategory_do()
    {

        $imagePath =$this->input->post('imagePath');
        $imgPath =$this->input->post('imgPath');

        $categoryName = $this->input->post('categoryName');
        $info =array(
            'name'=>$categoryName,
            'img'=>$imgPath,
        );

        $data['status']=$this->shop_model->addCategory($info);
        if($data['status']==true)
        {
            $maxId=$this->shop_model->lastCategory();
            $data['pid'] = $maxId['mid'];
        }
        else{$data['error']="添加失败";}

        $json = json_encode($data);
        print_r($json);
    }

    /*功能 添加子类*/
    public function addChild_do()
    {
        $pid =$this->input->post('pid');
        $childName =$this->input->post('childName');

        $info=array(
            'categoryId'=>$pid,
            'name'=>$childName
        );
        $data['status'] =$this->shop_model->addChild($info);
    }

    /*页面 修改分类*/
    public function editCategory($categoryId)
    {
        $this->login_check();
        $data['category']=$this->shop_model->categoryInfo($categoryId);
        $data['childList']=$this->shop_model->childList($categoryId);
//        var_dump($data);die;
        $this->load->view('editCategory',$data);
    }

    /*功能 修改分类信息*/
    public function editCategory_do()
    {
        $categoryId  = $this->input->post('categoryId');
        $imagePath = $this->input->post('imagePath');
        $imgPath = $this->input->post('imgPath');
        $categoryName = $this->input->post('categoryName');

        $info =array(
            'name'=>$categoryName,
            'img'=>$imgPath,
        );

        $data['status']=$this->shop_model->editCategory($categoryId,$info);
        $json = json_encode($data);
        print_r($json);
    }

    /*功能 修改子类*/
    public function editChild_do()
    {
        $childId  = $this->input->post('childId');
        $childName = $this->input->post('childName');

        $data['status']= $this->shop_model->editChild($childId,$childName);
        $json = json_encode($data);
        print_r($json);
    }

    /*功能 查询子类*/
    public function getChild()
    {
        $categoryId  = $this->input->post('categoryId');
        $data['childList']=$this->shop_model->childList($categoryId);
        $json = json_encode($data);
        print_r($json);
    }

    /*功能 删除店铺*/
    public function deleteCategory()
    {
        $categoryId = $this->input->post('categoryId');
        $data['status'] = $this->shop_model->deleteCategory($categoryId);
        $json=json_encode($data);
        print_r($json);
    }

    /*页面 添加相册*/
    public function addPhoto()
    {
        $this->login_check();
        $this->load->view('addPhoto');
    }


    /*页面 添加相册*/
    public function addPhoto1()
    {
        $this->login_check();
        $this->load->view('addPhoto1');
    }

    /*页面 相册*/
    public function album($shopId)
    {
        $this->login_check();
        $data['photoList']=$this->shop_model->photoList($shopId);
//        $data['shopId']=$shopId;
        $this->session->set_userdata(array('shopId'=>$shopId));
//        var_dump($data);die;
        $this->load->view('album',$data);
    }

    /*功能 上传相册*/
    public function uploadAlbum()
    {
        //载入所需类库
        $shopId=$this->session->userdata('shopId');
        //var_dump("shopid:   ".$shopId);die;
        $this->load->library('upload');

        $fileDir='uploads/album/';
        $filePath='./uploads/album/';

        $randTemp=date('YmdHis').rand(1000,9999);
        $fileName=$randTemp.".jpg";
        $fileThuName=$randTemp."_thumb.jpg";

        //配置上传参数
        $upload_config = array(
        'upload_path'  => './uploads/album/',
        'allowed_types' => 'jpg|png|gif|bmp|jpeg',
        'max_size'   => '20480',
        'max_width'   => '10240',
        'max_height'  => '7680',
        'overwrite'  => true,
        'file_name' =>$fileName,
        );
        $this->upload->initialize($upload_config);
        //循环处理上传文件
        foreach ($_FILES as $key =>$value) {
            if (!empty($_FILES['fileList']['name'])) {
//                $aa = pathinfo($_FILES['fileList']['name'], PATHINFO_EXTENSION);
//                echo $aa;
//                echo "<br />";
//                $randTemp = date('YmdHis').rand(1000,9999);
//
//                //配置上传参数
//                $upload_config = array(
//                    'upload_path'  => './uploads/album/',
//                    'allowed_types' => 'jpg|png|gif',
//                    'max_size'   => '20480',
//                    'max_width'   => '1024',
//                    'max_height'  => '768',
//                    'file_name'=>$randTemp.$aa,
//                );
//                $this->upload->initialize($upload_config);

                if ($this->upload->do_upload($key)) {
                    //处理图像,将其宽高最大值设置为100*100
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = $filePath.$fileName;
                    $config['create_thumb'] = TRUE;
                    $config['maintain_ratio'] = true;
                    $config['width'] = 400;
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();
                    //上传成功
//                    print_r($this->upload->data());
//                    echo $_FILES['fileList']['name'];
                    $path = $fileDir.$fileName;
                    $thumb_path=$fileDir.$fileThuName;
                    //$image = "/uploads/album/".$_FILES['fileList']['name'];
                    $image=$path;
                    $img = $thumb_path;
                    $info=array(
                        'shopId'=>$shopId,
                        'image'=>$image,
                        'img'=>$img,
                    );
                    $this->shop_model->addPhoto($info);
                } else {
                    //上传失败
                    echo $this->upload->display_errors();
//                    echo "failed";
                }
            }

        }
    }


    /*功能 删除图片*/
    public function delPhoto()
    {
        $photoId = $this->input->post('photoId');
        $data['status']= $this->shop_model->delPhoto($photoId);
        $json = json_encode($data);
        print_r($json);
    }

    /*功能 置顶店铺*/
    public function stickShop()
    {
        $shopId = $this->input->post('shopId');
        $data['status']= $this->shop_model->stickShop($shopId);
//        var_dump($data);die;
        $json = json_encode($data);
        print_r($json);
    }

    public function centerPoint()
    {
        $data['shopId'] = $_GET['shopId'];
        $data['shopInfo']=$this->shop_model->shopInfo($data['shopId']);
        $data['u_lng'] = $_GET['lng'];
        $data['u_lat'] = $_GET['lat'];
//        var_dump($data);die;

        $this->load->view('phone/centerPoint',$data);
    }




}
?>










