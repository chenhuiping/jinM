<?php

class Api extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('user_model');
        $this->load->model('shop_model');
        $this->load->model('event_model');
        $this->load->model('bbs_model');
        $this->load->model('assist_model');
        $this->load->model('feedback_model');
        $this->load->model('notice_model');
        $this->load->model('adImg_model');
        $this->load->model('photo_model');
        $this->load->model('inte_model');
        $this->load->model('version_model');
        $this->load->model('collect_model');
    }

    /****************  个人信息 begin ******************/

    /*用户注册*/
    public function register()
    {
        $email = $this->input->post('email');
        $nickName = $this->input->post('nickName');
       // $tel = $this->input->post('tel');
        $password = $this->input->post('password');
        $date = date('Y-m-d H:i:s');

//        $nickName = "JX";
//        $password = "111111";
//        $email = "123456@qq.com";
//        $tel = "15620743987";

        $userInfo = array(
            'email'=>$email,
            'nickName'=>$nickName,
            'password'=>md5($password),
            'regtime'=>$date
        );

        $user = $this->checkUser($email);           //检查是否有用户
        if(!$user || !count($user)){
           // insert
            $data['status'] = $this->user_model->addUser($userInfo);
        }
        else{
            //error
            $data['status']= false;
        }
        $json = json_encode($data);
        print_r($json);
    }
    //check tel
    public  function checkTel()
    {
        $tel = $this->input->post('tel');
        //$tel="15620694649";
        $user = $this->user_model->checkTel($tel);
        if(!$user || !count($user)){
            $data['status'] = true;
        }else{
            $data['status'] = false;
        }
        $json = json_encode($data);
        print_r($json);
    }

    /*登录*/
    public function login()
    {
        $email =  $this->input->post('email');
        $password = $this->input->post('password');

//        $email="791219922@qq.com";
//        $password ="5245201175";

        $loginInfo = array(
            'email'=>$email,
            'password'=> md5($password),
			//'password'=>$password,
        );
        $user = $this->user_model->login_do($loginInfo);
//        var_dump($admin['loginName']);die;
        if(!count($user)){
            //error
            $data['status']= false;
        }
        else{
            //success
            $data['status']= true;
            $data['userInfo']=$user;
        }
        $json = json_encode($data);
        print_r($json);
    }

    /*修改个人信息*/
    public function updateUserInfo()
    {
        $userId = $this->input->post('userId');
        $nickName = $this->input->post('nickName');
        $tel = $this->input->post('tel');
        $email = $this->input->post('email');
        $image = $this->input->post('image');
        $img = $this->input->post('img');

//        $userId =2;
//        $nickName = "yuki";
//        $email = "791219922@qq.com";
//        $tel = "15620520035";

        $userInfo = array(
            'nickName'=>$nickName,
            'tel'=>$tel,
            'email'=>$email,
            'image'=>$image,
            'img'=>$img,
        );
        $data['status']=$this->user_model->updateUserInfo($userInfo,$userId);
        $json = json_encode($data);
        print_r($json);
    }

    /*修改密码*/
    public function changePwd()
    {
        $userId = $this->input->post('userId');
        $password = $this->input->post('password');
//        $userId =1;
//        $password = "111";

        $data['status']=$this->user_model->changePwd(md5($password),$userId);
        $json = json_encode($data);
        print_r($json);
    }

    //
    public function getAvatar()
    {
        $userId = $this->input->post('userId');
//        $userId =12;
        $data['avatar']= $this->user_model->getAvatar($userId);
        $json = json_encode($data);
        print_r($json);
    }

    /* JX
     * 邮件找回密码
     * 2016-01-06
     * */
    public function findBackPwd()
    {
        $email = $this->input->post('email');
//        $email = "844197589@qq.com";
        $user = $this->checkUser($email);
        if(!count($user) || !$user || !$email)
        {
            $data['message'] = "Unmatched email address, please input correct email address";
        }
        else{
            $auth = "";                                         //验证码
            for ($i = 0; $i < 4; $i++)
            {
                $str = "ABCDEFGHIJKLMNPQRSTUVWXYZ123456789abcdefghijklmnpqrstuvwxyz";
                //            1.获取字符串的长度
                $length = strlen($str) - 1;
                //            2.字符串截取开始位置
                $start = rand(0, $length);
                //            3.随机截取字符串，取其中的一部分字符串
                $fontcontent = substr($str, $start, 1);
                $auth .= $fontcontent;
            }
            $diy_subject = "Get back my password";                          //标题
            $diy_msg = "Your verification code is ".$auth;                    //内容
            $this->email($email,$diy_subject,$diy_msg);
            $data['auth'] = $auth;
            $data['message'] = "Unmatched email address, please input correct email address";
            $data['userId'] = $user['id'];
        }

        $json = json_encode($data);
        print_r($json);
    }

    /* JX
     * 检查是否有用户
     * 2016-01-06
     * */
    private function checkUser($email)
    {
        $user = $this->user_model->checkEmail($email);
        return $user;
    }



    /****************  个人信息 end ******************/

    /*获取adImg by page*/
    public function getAdImg()
    {
        $page=$this->input->post('page');
       // $page=1;
        $data['adImg']=$this->adImg_model->get_adImg($page);
        $result=json_encode($data);
        print_r($result);
    }
    /****************  店铺 begin ******************/

    /*功能 获得分类(店铺)*/
    public function getCategory()
    {
        $data['cateGoryList'] = $this->shop_model->getCategory();
        $json = json_encode($data);
        print_r($json);
    }

    /*功能 获取子类*/
    public function getChild()
    {
        $categoryId = $this->input->post('categoryId');
//        $categoryId = 1;
        $data['childList'] = $this->shop_model->getChild($categoryId);
        $json = json_encode($data);
        print_r($json);
    }
    /*10条全体通知*/
    public function getNotice()
    {
        //$typeId = $this->input->post('typeId');
        $nid = $this->input->post('nid');
        //$nid=31;
        if($nid==""){
            $data['noticeList']=$this->notice_model->notice();
        }else{
            $info=array($nid);
            $data['noticeList']=$this->notice_model->noticeList($info);
        }
        //var_dump($sid);
//		$typeId =1;

        $json = json_encode($data);
        print_r($json);
    }
    /*一条全体通知*/
    public function getOneNotice()
    {
        $noticeId = $this->input->post('noticeId');
        $data['notice']=$this->notice_model->getOneNotice($noticeId);
        $json = json_encode($data);
        print_r($json);
    }
    /*10条个人通知*/
    public function getMessage()
    {
        $userId = $this->input->post('userId');
        $mid = $this->input->post('mid');
        //$userId = 12;
        if($mid==""){
            $data['messageList']=$this->notice_model->message($userId);
        }else{
            $info=array($mid);
            $data['messageList']=$this->notice_model->messageList($userId,$info);
        }
        //var_dump($sid);
//		$typeId =1;

        $json = json_encode($data);
        print_r($json);
    }
    /*一条personal通知*/
    public function getOneMessage()
    {
        $messageId = $this->input->post('messageId');
        $data['message']=$this->notice_model->getOneMessage($messageId);
        $json = json_encode($data);
        print_r($json);
    }

    /*10条店铺
     *旧版本
     */
    public function shopList()
    {
		$typeId = $this->input->post('typeId');
        $sid = $this->input->post('sid');
        if($sid==""){$sid=0;}
        //var_dump($sid);
		//$typeId =5;
		$info=array($typeId,$sid);

        $data['status']=$this->shop_model->shopList($info);
        $json = json_encode($data);
        print_r($json);
    }

    /*JX
     *新版本 店铺列表 新分页 + 返回距离
     * 2016-01-07
     * */
    public function getShopList()
    {
        $typeId = $this->input->post('typeId');                     //类型Id
        $row = intval($this->input->post('row'));                   //行号
        $a_lng = $this->input->post('a_lng');
        $a_lat = $this->input->post('a_lat');
//        $typeId = 1;
//        $row = 0;
//        $a_lng = 117.215772;
//        $a_lat = 39.06917;
        if(!$typeId || !$a_lng || !$a_lat)
        {
            $data['shopList'] = array();
            $data['message'] = "Incomplete variables";
        }
        else
        {
            $info=array($typeId,$row);
            $shopList=$this->shop_model->getShopList($info);
            if($shopList)
            {
                foreach($shopList as $shop)
                {
                    $pointB=explode(',',$shop['location']);
                    $shop['star'] = $this->avgStar($shop['id']);
                    if(isset($pointB[0]) && isset($pointB[1]))
                    {
                        $b_lng = $pointB[0];
                        $b_lat = $pointB[1];

                        $dis = $this->distance($a_lng, $a_lat, $b_lng, $b_lat);
                        $shop['dist'] = intval($dis);
                    }
                    else
                    {
                        $shop['dist'] = "";
                    }
                    $data['shopList'][] = $shop;
                }
            }
            $data['message'] = "success";
        }
        $json = json_encode($data);
        print_r($json);
    }


    /*JX
     *获取店铺平均分
     * 2016-01-07
     * */
    private function avgStar($shopId)
    {
        $star = $this->shop_model->avgStar($shopId);
        return $star['star'];
    }


    /*店铺详情
    * 旧版本
     * */
    public function webShop($shopId)
    {
        $data['shopInfo']=$this->shop_model->shopInfo($shopId);
        $data['star'] = $this->shop_model->avg_comments($shopId);
        $data['discount'] = $this->shop_model->discountInfo($shopId);
        $data['shopId']=$shopId;

        $this->load->view('phone/index',$data);
    }

    public function discount($shopId)
    {
        $data['shopInfo']=$this->shop_model->shopInfo($shopId);
        $data['star'] = $this->shop_model->avg_comments($shopId);
        $data['discount'] = $this->shop_model->discountInfo($shopId);

        $this->load->view('phone/discount',$data);
    }


    /*JX
     *新版网页店铺
     * 2016-01-07
     * */
    public function webShopNew()
    {
        $shopId = $this->input->get('shopId');
        $a_lng = $this->input->get('a_lng');
        $a_lat = $this->input->get('a_lat');
//        $a_lng = 117.215772;
//        $a_lat = 39.06917;
        $data['shopInfo']=$this->shop_model->shopInfo($shopId);
        $data['shopId']=$shopId;
        $array = $data['shopInfo']['location'];
        $pointB=explode(',',$array);
        if(isset($pointB[0]) && isset($pointB[1]))
        {
            $b_lng = $pointB[0];
            $b_lat = $pointB[1];

            $dis = $this->distance($a_lng, $a_lat, $b_lng, $b_lat);
            $data['distance'] = (ceil($dis)/1000);
            if((ceil($dis)/1000)>1000){
                $data['distance'] = " ";
            }
            else{
                $data['distance'] = number_format((ceil($dis)/1000),1)."km";
            }
        }
        else
        {
            $data['distance'] = "";
        }

        $data['star'] = $this->shop_model->avg_comments($shopId);
        $data['discount'] = $this->shop_model->discountInfo($shopId);
        //var_dump($data);die;
        $this->load->view('phone/webShop',$data);
    }

    //shopAlbum
    public function shopAlbum($shopId)
    {
        //$shopId = 125;
        $data['photoList']=$this->photo_model->get_photolist_by_shopid($shopId);
        //var_dump($data['photoList']);die;
        $this->load->view('phone/album',$data);
    }
    /*查看某个店铺的详细信息 评论*/
    public function getCom()
    {
        $shopId=$this->input->post('shopId');
        $cId=$this->input->post('cId');
        if($cId==""){$cId=2147483647;}

//        $shopId=1;

        $info = array($shopId,$cId);
        $data['commentList'] = $this->shop_model->commentList($info);

        $result=json_encode($data);
        print_r($result);
    }

    /*提交评论*/
    public function setComment()
    {
        $userId=$this->input->post('userId');
        $shopId=$this->input->post('shopId');
        $content=$this->input->post('content');
        $star=$this->input->post('star');

//        $userId =1;
//        $shopId=2;
//        $content="good";
//        $star=5;

        $commentInfo=array(
            'userId'=>$userId,
            'shopid'=>$shopId,
            'content'=>$content,
            'star'=>$star,
            'date'=>date('Y-m-d H:i:s'),
        );
        $data['status']=$this->shop_model->insert_comment($commentInfo);
        $result=json_encode($data);
        print_r($result);
    }

    /*15-09-08
     * 店铺排序
     * 旧版本
     */
    public function shopListByConditions()
    {
        $distance = $this->input->post('distance');             //距离;
        $childId = $this->input->post('childId');                 //类型
        $typeId = $this->input->post('typeId');
        $a_lng = $this->input->post('a_lng');
        $a_lat = $this->input->post('a_lat');                   //用户的经纬度

//        $distance = "10000";
//        $childId = 1;
//        $a_lng = 117.215772;
//        $a_lat = 39.06917;

        /*无条件 全部店铺*/
        if($childId=="" && $distance=="" && $a_lng=="" && $a_lat=="" )
        {
            $data['shopList'] = $this->shop_model->shopList_all_typeId($typeId);
        }

        /*只根据分类筛选*/
        else if($childId && $distance=="")
        {
            $data['shopList'] = $this->shop_model->shopListBySort($childId);
        }


        /*只按距离筛选*/
        else if($childId=="" && $distance && $a_lng && $a_lat )
        {
            $shopList = $this->shop_model->shopListByDistance($typeId);
            $L = count($shopList);
            $data['shopList']=array();
            for($i=0;$i<$L;$i++)
            {
                $array = $shopList[$i]['location'];
                $pointB=explode(',',$array);

                if(isset($pointB[0]) && isset($pointB[1]))
                {
                    $b_lng = $pointB[0];
                    $b_lat = $pointB[1];

                    $dis = $this->distance($a_lng,$a_lat,$b_lng,$b_lat);

                    if($dis <= $distance)
                    {
                        $local = $shopList[$i];
                        $local['dist'] = intval($dis);
                        array_push($data['shopList'],$local);
                    }
                }
            }
        }

        /*根据距离+分类筛选*/
        else if($childId && $distance && $a_lng && $a_lat)
        {
            $shopList = $this->shop_model->shopListBySort($childId);
            $L = count($shopList);
            $data['shopList']=array();
            for($i=0;$i<$L;$i++)
            {
                $array = $shopList[$i]['location'];
                $pointB=explode(',',$array);

                if(isset($pointB[0]) && isset($pointB[1]))
                {
                    $b_lng = $pointB[0];
                    $b_lat = $pointB[1];

                    $dis = $this->distance($a_lng,$a_lat,$b_lng,$b_lat);

                    if($dis <= $distance)
                    {
                        $local = $shopList[$i];
                        $local['dist'] = intval($dis);
                        array_push($data['shopList'],$local);
                    }
                }
            }
        }
        else
        {
            $data['error'] = "Incomplete variables";
        }
        $json = json_encode($data);
        print_r($json);
    }


    /* JX
     * 根据条件筛选店铺
     * 2016-01-06
     */
    public function shopListByConditionsNew()
    {
        $distan = $this->input->post('distance');             //距离;
        $childId = $this->input->post('childId');                 //类型
        $typeId = $this->input->post('typeId');
        $a_lng = $this->input->post('a_lng');
        $a_lat = $this->input->post('a_lat');                   //用户的经纬度

		$distance=intval($distan);
		
//        $distance = "10000";                     //根据距离筛选的条件
//        $childId = 1;                           //根据分类筛选的条件
//        $a_lng = 117.215772;
//        $a_lat = 39.06917;                      //用户坐标
//        $typeId =1;

		$data['shopList'] = array();
        if(!$a_lng || !$a_lat || !$typeId)
        {
            $data['shopList'] = array();
            $data['message'] = "Incomplete variables";
        }
        else
        {
//            无条件 || 按距离
//            都没有分类条件，先把所有的查出来，后面遍历再筛选距离
            if(!$childId)
            {
                $shopList = $this->shop_model->shopList_all_typeId($typeId);
            }
//            按分类 || 按分类+距离
//            都有分类条件，按分类条件先查出来，后面遍历再筛选距离
            else if($childId){
                $shopList = $this->shop_model->shopListBySort($childId);
            }

            if($shopList)				//如果能查出店铺列表
            {
                foreach($shopList as $shop)             //遍历每个店铺
                {
                    $array = $shop['location'];
                    $pointB=explode(',',$array);

                    if(isset($pointB[0]) && isset($pointB[1]))
                    {
                        $b_lng = $pointB[0];
                        $b_lat = $pointB[1];

                        $dis = $this->distance($a_lng,$a_lat,$b_lng,$b_lat);            //算出距离
                        $shop['dist'] = intval($dis);
                        $shop['star'] = $this->avgStar($shop['id']);
                        if($distance)              //如果有距离判断条件
                        {   
                            if($dis < $distance || $dis == $distance)					//如果有符合条件的shop放入list
                            {
							
                                $data['shopList'][]=$shop;
                            }
							else{										//如果没有符合条件的shop放入list
								//$data['shopList']=array();
							}
                        }
                        else{                                           //如果没有筛选条件
                            $data['shopList'][]=$shop;                  //遍历的每一个shop都放入list
                        }
                    }
                }
				
            }
            else{				//如果不能查出店铺列表
                $data['shopList']=array();
            }
            $data['message'] = "success";
        }
		
        $json = json_encode($data);
        print_r($json);
    }

    /* JX
     * 计算距离
     * */
    private function distance($a_lng,$a_lat,$b_lng,$b_lat)
    {
        $pk = 180 / 3.14169;
        $a1 = $a_lat / $pk;
        $a2 = $a_lng / $pk;
        $b1 = $b_lat / $pk;
        $b2 = $b_lng / $pk;
        $t1 = cos($a1) * cos($a2) * cos($b1) * cos($b2);
        $t2 = cos($a1) * sin($a2) * cos($b1) * sin($b2);
        $t3 = sin($a1) * sin($b1);
        $tt = acos($t1 + $t2 + $t3);
        $dis = 6366000 * $tt;
//        var_dump(6366000 * $tt);die;
        return $dis;
    }


    /* JX
     * 店铺搜索  分页
     * 2016-01-06
     */
    public function SearchShop()
    {
        $like = $this->input->post('like');                 //关键字
        $row = intval($this->input->post('row'));                 //行号
        $a_lng = $this->input->post('a_lng');
        $a_lat = $this->input->post('a_lat');
//        $a_lng = 117.215772;
//        $a_lat = 39.06917;
//        $like = "a";
        $num = 10;              //每页条数
        if(!$like ||  !$a_lat || !$a_lat)
        {
            $data['message'] = "Incomplete variables";
            $data['shopList'] = array();
        }
        else
        {
            $shopList = $this->shop_model->SearchShop($like,$row,$num);
            if($shopList)
            {
                foreach($shopList as $shop)
                {
                    $pointB=explode(',',$shop['location']);
                    $shop['star'] = $this->avgStar($shop['id']);
                    if(isset($pointB[0]) && isset($pointB[1]))
                    {
                        $b_lng = $pointB[0];
                        $b_lat = $pointB[1];

                        $dis = $this->distance($a_lng, $a_lat, $b_lng, $b_lat);
                        $shop['dist'] = intval($dis);
                    }
                    else
                    {
                        $shop['dist'] = "";
                    }
                    $data['shopList'][] = $shop;
                }
                $data['message'] = "success";
            }
            else
            {
                $data['shopList'] = array();
                $data['message'] = "false";
            }
        }
        $json = json_encode($data);
        print_r($json);
    }

    /* JX
     * 随机店铺
     * 2016-01-06
     * */
    public function RandShop()
    {
        $list = $this->shop_model->shopList_all();          //获取所有店铺
        $count = count($list);
        $row = rand(0,$count-1);
        $data['shopInfo'] = $list[$row];
        $json = json_encode($data);
        print_r($json);
    }

    /* JX
     * 收藏店铺
     * 2016-01-06
     * */
    public function collectShop()
    {
        $userId = $this->input->post('userId');
        $shopId = $this->input->post('shopId');
//        $userId =1;
//        $shopId =1;
        $info = array(
            'shopId'=>$shopId,
            'userId'=>$userId
        );
        $log = $this->collect_model->searchSpCollection($info);
        if(count($log))
        {
            $data['status'] = false;
            $data['message'] = "Already in your favorite";
        }
        else
        {
            $data['status'] = $this->collect_model->collectShop($info);
            if($data['status'])
            {
                $data['message'] = "Add to favorite successful";
            }
            else
            {
                $data['message'] = "Adding to favorite failed";
            }
        }

        $json = json_encode($data);
        print_r($json);
    }


    /* JX
     * 店铺收藏列表
     * 2016-01-06
     * */
    public function getSpCollectionList()
    {
        $userId = $this->input->post('userId');
//        $userId = 1;
        if(!$userId)
        {
            $data['shopList'] = array();
            $data['message'] = "Incomplete variables";
        }
        else
        {
            $shopCollection = $this->collect_model->searchSpCollectionByUserId($userId);
            if($shopCollection)
            {
                foreach($shopCollection as $shop)
                {
                    $shop['star'] = $this->avgStar($shop['id']);
                    $data['shopCollection'][] = $shop;
                    $data['message'] = "success";
                }
            }
            else{
                $data['shopCollection'] = array();
                $data['message'] = "false";
            }

        }
        $json = json_encode($data);
        print_r($json);
    }


    /****************  店铺 end ******************/
	
	/****************  活动 begin ******************/

    /*功能 获得分类(活动)*/
    public function getSort()
    {
        $data['cateGoryList'] = $this->event_model->getSort();
        $json = json_encode($data);
        print_r($json);
    }


    /*10条活动*/
    public function eventList()
    {
		//$typeId = $this->input->post('typeId');
        $eid = $this->input->post('eid');
        $tag = $this->input->post('tag');
        //if($eid==""){$eid=0;}
        //if($typeId==""){$typeId=0;}
        //var_dump($sid);
		//$tag =5;
		$info=array($eid);
        if($tag==0){				//0为活动,活动分类型
            if($eid==""){
                $data['status']=$this->event_model->event($tag);
            }else{
                $data['status']=$this->event_model->eventList($tag,$info);
            }
            //var_dump($data['status']);die;
        }else{						//其他不分类型
            if($eid==""){
                $data['status']=$this->event_model->all($tag);
            }else{
                $data['status']=$this->event_model->allList($tag,$info);
            }

        }

        $json = json_encode($data);
        print_r($json);
    }
	
	/*活动详情*/
	public function eventInfo()
	{
		$eventId = $this->input->post('eventId');
//		$eventId = 1;
		$data['eventInfo'] = $this->event_model->eventInfo($eventId);
		$json = json_encode($data);
        print_r($json);
	}

    /* JX
   * 活动点赞
   * 2016-01-06
   * */
    public function likeEvent()
    {
        $eventId = $this->input->post('eventId');
        $userId = $this->input->post('userId');

//        $eventId = 1;
//        $userId = 1;
        if(!$userId || !$eventId)
        {
            $data['status'] = false;
            $data['message'] = "Incomplete variables";
        }
        else
        {
            $info = array(
                'userId'=>$userId,
                'eventId' =>$eventId
            );
            $likeLog = $this->event_model->searchLikeEventLog($info);
            if(!$likeLog)
            {
                $data['status'] = $this->event_model->insertLikeEventLog($info);
                $data['message'] = "Praise sent success";
            }
            else
            {
                $data['status'] = false;
                $data['message'] = "You already praised";
            }
        }

        $json = json_encode($data);
        print_r($json);
    }

    /* JX
    * 发活动评论
    * 2016-01-06
    * */
    public function insertEventComment()
    {
        $userId = $this->input->post('userId');
        $eventId = $this->input->post('eventId');
        $content = $this->input->post('content');

//        $userId = 1;
//        $eventId = 1;
//        $content = "aa";

        if(!$userId || !$eventId || !$content)
        {
            $data['status'] = false;
            $data['message'] = "Incomplete variables";
        }
        else
        {
            $info = array(
                'userId'=>$userId,
                'eventId'=>$eventId,
                'content'=>$content,
                'date'=>date('Y-m-d H:i:s')
            );
            $data['status'] = $this->event_model->insertEventComment($info);
            $data['message'] = "Comments sent success";
        }
        $json = json_encode($data);
        print_r($json);
    }


    /* JX
    * 获取活动评论
    * 2016-01-06
    * */
    public function getEventComment()
    {
        $eventId=$this->input->post('eventId');
        $row=intval($this->input->post('row'));

//        $eventId =1;
//        $row =0;

        if(!$eventId)
        {
            $data['status'] = false;
            $data['message'] = "Incomplete variables";
        }
        else
        {
            $info = array($eventId,$row);
            $commentList = $this->event_model->getEventComment($info);
            if($commentList)
            {
                foreach($commentList as $comment)
                {
                    $user = $this->user_model->nameAndAvaById($comment['userId']);
                    $comment['user'] = $user;
                    $data['commentList'][] = $comment;
                }
            }
            else
            {
                $data['commentList'] = array();
            }
            $data['message'] = "success";
            $data['message'] = "success";
        }

        $result=json_encode($data);
        print_r($result);
    }

	/****************  活动 end ******************/


    /****************  圈子 begin ******************/

    /*板块列表*/
    public function plateList()
    {
        $pid = $this->input->post('pid');
        if($pid==""){$pid=0;}
        $data['plateList']=$this->bbs_model->plateList($pid);
        $json = json_encode($data);
        print_r($json);
    }

    /*帖子列表*/
    public function cardList()
    {
        $cid=$this->input->post('cid');
        $plateId=$this->input->post('plateId');
        if($cid==""){$cid=2147483647;}
//        $plateId=1;
        $info =array($cid,$plateId);
        $data['cardList']=$this->bbs_model->cardList($info);
        $json = json_encode($data);
        print_r($json);
    }

    /*回帖列表*/
    public function followCardList()
    {
        $fid=$this->input->post('fid');
        $cardId=$this->input->post('cardId');
        if($fid==""){$fid=0;}
//        $cardId=1;

        $info =array($fid,$cardId);
        $data['cardList']=$this->bbs_model->followCardList($info);
        $json = json_encode($data);
        print_r($json);
    }

    /*帖子详情*/
    public function cardInfo()
    {
        $cardId = $this->input->post('cardId');
//        $cardId =1;
        $data['cardInfo']=$this->bbs_model->cardInfo($cardId);
        $json = json_encode($data);
        print_r($json);
    }

    /*发帖*/
    public function sendCard()
    {
        $userId = $this->input->post('userId');
        $plateId = $this->input->post('plateId');
        $title = $this->input->post('title');
        $content = $this->input->post('content');
        $image = $this->input->post('image');
        $img = $this->input->post('img');
        $date = date('Y-m-d H:i:s');

//        $userId = 1;
//        $plateId = 4;
//        $title = "梅江有什么好吃的小店推荐吗?";
//        $content = "周末来梅江这边办事，顺便逛逛，求推荐";

        $cardInfo = array(
            'userId'=>$userId,
            'plateId'=>$plateId,
            'title'=>$title,
            'content'=>$content,
            'image'=>$image,
            'img'=>$img,
            'date'=>$date,
        );
        $data['status'] = $this->bbs_model->sendCard($cardInfo);
        $json = json_encode($data);
        print_r($json);
    }

    /*回帖*/
    public function reply()
    {
        $userId = $this->input->post('userId');
        $cardId = $this->input->post('cardId');
        $content = $this->input->post('content');
        $image = $this->input->post('image');
        $img = $this->input->post('img');
        $date = date('Y-m-d H:i:s');

//        $userId = 1;
//        $cardId = 3;
//        $content = "谁来推荐下啊";

        $replyInfo = array(
            'userId'=>$userId,
            'cardId'=>$cardId,
            'content'=>$content,
            'image'=>$image,
            'img'=>$img,
            'date'=>$date,
        );
        $data['status'] = $this->bbs_model->reply($replyInfo);
        $json = json_encode($data);
        print_r($json);
    }

    /****************  圈子 end  ******************/

    /****************  帮助 begin  ******************/

    /*发求助*/
    public function setAssist()
    {
        $userId = $this->input->post('userId');
        $title = $this->input->post('title');
        $content = $this->input->post('content');
        $image = $this->input->post('image');
        $img = $this->input->post('img');
        $date = date('Y-m-d H:i:s');

//        $userId = 1;
//        $title = "5只小奶猫求领养，坐标天津";
//        $content = "要求定期检查身体，驱虫，做绝育。接受定期回访。";
//        $image = "201508271412338561,jpg";
//        $img = "201508271412338561_thumb.jpg";

        $info = array(
            'userId'=>$userId,
            'date'=>$date,
            'title'=>$title,
            'content'=>$content,
            'image'=>$image,
            'img'=>$img,
        );
        $data['status'] = $this->assist_model->setAssist($info);
        $json = json_encode($data);
        print_r($json);
    }

    /*回复*/
    public function setFollowAssist()
    {
        $userId = $this->input->post('userId');
        $assistId = $this->input->post('assistId');
        $content = $this->input->post('content');
        $image = $this->input->post('image');
        $img = $this->input->post('img');
        $date = date('Y-m-d H:i:s');

//        $userId = 1;
//        $assistId = 1;
//        $content = "补充：联系电话15698545632。";
//        $image = "201508271412338561,jpg";
//        $img = "201508271412338561_thumb.jpg";

        $info = array(
            'userId'=>$userId,
            'assistId'=>$assistId,
            'date'=>$date,
            'content'=>$content,
            'image'=>$image,
            'img'=>$img,
        );
        $data['status'] = $this->assist_model->setFollowAssist($info);
        $json = json_encode($data);
        print_r($json);
    }

    /*求助列表*/
    public function assistList()
    {
        $aid = $this->input->post('aid');
        if($aid==""){$aid=2147483647;}

        $data['assistList'] = $this->assist_model->assistList($aid);
        $json = json_encode($data);
        print_r($json);
    }

    /*回复列表*/
    public function followAssistList()
    {
        $assistId = $this->input->post('assistId');
        $fid = $this->input->post('fid');
        if($fid==""){$fid=2147483647;}

//        $assistId = 1;

        $info = array($fid,$assistId);

        $data['followAssistList'] = $this->assist_model->followAssistList($info);
        $json = json_encode($data);
        print_r($json);

    }

    /****************  帮助 end  ******************/



    /****************  上传图片 begin ******************/

    //上传帖子图片
    public function uploadTpPhoto(){
        $fileDir='uploads/Tp/';
        $filePath='./uploads/Tp/';

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
            $config['maintain_ratio'] = false;
            $config['width'] = 100;
            $config['height'] = 100;
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();

            //$data = array('upload_data' => $this->upload->data());

            $path=$fileDir.$fileName;
            $thumb_path=$fileDir.$fileThuName;
            $data['path']=$path;
            $data['thumb_path']=$thumb_path;
            $json=json_encode($data);
            print_r($json);
        }
    }

    //上传回帖图片
    public function uploadCmPhoto(){
        $fileDir='uploads/Cm/';
        $filePath='./uploads/Cm/';
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
            $config['maintain_ratio'] = false;
            $config['width'] = 100;
            $config['height'] = 100;
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();

            //$data = array('upload_data' => $this->upload->data());

            $path=$fileDir.$fileName;
            $thumb_path=$fileDir.$fileThuName;
            $data['path']=$path;
            $data['thumb_path']=$thumb_path;
            $json=json_encode($data);
            print_r($json);
        }
    }


    //上传互助图片
    public function uploadAtPhoto(){
        $fileDir='uploads/At/';
        $filePath='./uploads/At/';

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
            $config['maintain_ratio'] = false;
            $config['width'] = 100;
            $config['height'] = 100;
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();

            //$data = array('upload_data' => $this->upload->data());

            $path=$fileDir.$fileName;
            $thumb_path=$fileDir.$fileThuName;
            $data['path']=$path;
            $data['thumb_path']=$thumb_path;
            $json=json_encode($data);
            print_r($json);
        }
    }

    //上传互助回复图片
    public function uploadFatPhoto(){
        $fileDir='uploads/Fat/';
        $filePath='./uploads/Fat/';
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
            $config['maintain_ratio'] = false;
            $config['width'] = 100;
            $config['height'] = 100;
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();

            //$data = array('upload_data' => $this->upload->data());

            $path=$fileDir.$fileName;
            $thumb_path=$fileDir.$fileThuName;
            $data['path']=$path;
            $data['thumb_path']=$thumb_path;
            $json=json_encode($data);
            print_r($json);
        }
    }

    //上传反馈图片
    public function uploadFbPhoto(){
        $fileDir='uploads/Fb/';
        $filePath='./uploads/Fb/';

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
            $config['maintain_ratio'] = false;
            $config['width'] = 100;
            $config['height'] = 100;
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();

            //$data = array('upload_data' => $this->upload->data());

            $path=$fileDir.$fileName;
            $thumb_path=$fileDir.$fileThuName;
            $data['path']=$path;
            $data['thumb_path']=$thumb_path;
            $json=json_encode($data);
            print_r($json);
        }
    }

    //上传头像图片
    public function uploadAvatar(){
        $fileDir='uploads/UserAva/';
        $filePath='./uploads/UserAva/';
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
            $config['maintain_ratio'] = false;
            $config['width'] = 100;
            $config['height'] = 100;
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();

            //$data = array('upload_data' => $this->upload->data());

            $path=$fileDir.$fileName;
            $thumb_path=$fileDir.$fileThuName;
            $data['path']=$path;
            $data['thumb_path']=$thumb_path;
            $json=json_encode($data);
            print_r($json);
        }
    }

    /****************  上传图片 end ******************/


    /****************  反馈 begin ******************/
    public function setFeedback()
    {
        $userId = $this->input->post('userId');
        $content = $this->input->post('content');
        $image = $this->input->post('image');
        $img = $this->input->post('img');
        $date = date('Y-m-d H:i:s');

//        $userId = 1;
//        $content ="软件不错。就是内容有点少，继续加油";

        $info = array(
            'userId'=>$userId,
            'content'=>$content,
            'image'=>$image,
            'img'=>$img,
            'date'=>$date,
        );
        $data['status']=$this->feedback_model->setFeedback($info);
        $json=json_encode($data);
        print_r($json);
    }

    /****************  反馈 end ******************/


    /****************  积分 begin ******************/

    /* JX
     * 获得积分
     * 2016-01-06
     * */
    public function GetInte()
    {
        $typeId = $this->input->post('typeId');             //操作类型
        $userId = $this->input->post('userId');             //用户id
//        $typeId = 1;
//        $userId = 5;
        if(!$userId || !$typeId)
        {
            $data['status'] = false;
            $data['message'] = "Incomplete variables";
        }
        else
        {
            $typeInfo = array(
                'disabled'=>0,
                'id'=>$typeId
            );
            $type = $this->inte_model->GetInteType($typeInfo);            //类型详情
            $data = $this->$type['name']($userId,$type);          //调用对应接口
        }
        $json=json_encode($data);
        print_r($json);
    }

    /* JX
     * 签到
     * 2016-01-06
     * */
    private function Sign($userId,$type)
    {
        $date = date('Y-m-d');
        $logInfo = array(
            'userId'=>$userId,
            'date'=>$date
        );
        $log = $this->user_model->CheckSign($logInfo);                       //根据userId，日期查找签到记录
        if(count($log))
        {                                                     //签过了
            $data['status'] = false;
            $data['message'] = "Already checked in today";
        }
        else
        {                                                               //签到
            $data['status'] = $this->user_model->InsertSignLog($logInfo);    //添加签到记录
            $this->inte_model->IncreaseInte($userId,$type['inte']);          //添加积分
//            var_dump($this->db->last_query());
            if($data['status']){
                $data['message'] = "Check in success";
                $userInte = $this->user_model->userInte($userId);           //当前总积分
                $data['userInte'] = $userInte['integral'];
                $data['addInte'] = $type['inte'];                                   //本次操作增加的积分
            }
            else if(!$data['status']){
                $data['message'] = "Check in failed";
            }
        }
        return $data;
    }


    /* JX
     * 用户当前总积分
     * 2016-01-07
     * */
    public function userInteInfo()
    {
        $userId = $this->input->post('userId');
//        $userId = 1;
        $userInte = $this->user_model->userInte($userId);           //当前总积分
        $data['userInte'] = $userInte['integral'];
        $json=json_encode($data);
        print_r($json);
    }

    /****************  积分 end ******************/

    /******** 2016-01-05 新增 ***********/

    /* JX
     * 统计安装量
     * 2016-01-06
     * */
    public function countInstalled()
    {
        $IEMI = $this->input->post('IMEI');
//        $IEMI = "11";
        $equipment = $this->version_model->searchInstalledLog($IEMI);
        if(!$equipment)
        {
            $this->version_model->insertInstalledLog($IEMI);
        }
    }

    /* JX
     * 首页广告图  返回一个网址
     * 2016-01-06
     * */
    public function advertImage()
    {
        $data['advert'] = $this->adImg_model->advertImage();
        $json = json_encode($data);
        print_r($json);
    }


    //id，版本号，下载地址，时间
    public function getVersion()
    {
        $platform = $this->input->post('platform');
//        $platform = "android";
        $plate=strtolower($platform);
        //var_dump($plate);die;
        $data['version']=$this->version_model->getVersion($plate);
        $json=json_encode($data);
        print_r($json);
    }

    /* JX
     * 外部调用发邮件接口
     * 2016-01-06
     * */
	public function sendEmail()   // 写在 Controller 里边。
    {
        $email = $this->input->get("email");
        $diy_subject = $this->input->get("diy_sub");            //主题
        $diy_msg = $this->input->get("diy_msg");                //内容
        $this->email($email,$diy_subject,$diy_msg);
    }

    /* JX
     *2016-01-06
     * 发邮件功能
     */
    private function email($email,$diy_subject,$diy_msg)
    {
        $this->load->library('email');
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'smtp.qq.com'; // given server
        $config['smtp_user'] = 'jinadvisor@uinnovation-networks.com';
        $config['smtp_pass'] = 'jin123Advisor';
        $config['smtp_port'] = '465'; // given port.
        $config['smtp_timeout'] = '50';
        $config['crlf']="\r\n";
        $config['newline']="\r\n";
        $config['smtp_crypto']='ssl';
        $config['charset']='utf-8';  // Encoding type

        //$email = "931772814@qq.com";
        //$auth = "1234";
        $this->email->initialize($config);  //initialize the config
        $this->email->from('jinadvisor@uinnovation-networks.com', 'Jin Advisor');  // show in the reciever email box
        $this->email->to($email);
        //$this->email->cc('another@another-example.com');
        //$this->email->bcc('them@their-example.com');

        $this->email->subject($diy_subject);
        $this->email->message($diy_msg);
        $this->email->send();   //Send out the email.
//        return $this->email->print_debugger();
    }


    public function test()
    {
        $this->load->view('test');
    }
	
	/*10条活动*/
    public function indexList()
    {
        $tag = 0;
		$data['event0'] = $this->event_model->getFiveEvent($tag);
		$tag = 2;
		$data['event2'] = $this->event_model->getFiveALl($tag);
       // var_dump($this->db->last_query());
        $json = json_encode($data);
        print_r($json);
    }



}





?>
















