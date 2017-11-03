<?php


class Shop_model extends CI_Model {
    public function __construct()
    {
        $this->load->database();
    }

    /**************  店铺信息 begin  ******************/
    /*10个店铺*/
    public function shopList($info)
    {
        $sql = "select * from jm_shop WHERE typeId=? and id>? AND disable=0 ORDER BY id limit 10";
        $query = $this->db->query($sql,$info);
        //var_dump($this->db->last_query());
        return $query->result_array();
    }

//    新版按行号分页
    public function getShopList($info)
    {
        $sql = " select shp.*,chd.`name` as cate from jm_shop as shp LEFT JOIN jm_catechild as chd ON chd.id = shp.childId WHERE typeId=? AND disable=0 limit ?,10";
        $query = $this->db->query($sql,$info);
        return $query->result_array();
    }

//    获取店铺平均分
    public function avgStar($shopId)
    {
        $sql = "SELECT AVG(star) as star from jm_comment WHERE shopId =".$shopId;
        $query = $this->db->query($sql);
        return $query->row_array();
    }

    /*全部商店*/
    public function shopList_all()
    {
        $sql = "select * from jm_shop WHERE disable =0  ORDER BY stick";
        $query = $this->db->query($sql);
//        $query = $this->db->get_where('jm_shop',array('disable'=>0));
        return $query->result_array();
    }
    public function shopList_all_typeId($typeId)
    {
        $sql = "select shp.*,chd.`name` as cate from jm_shop as shp LEFT JOIN jm_catechild as chd ON chd.id = shp.childId WHERE shp.`disable`=0 and shp.typeId=".$typeId." ORDER BY stick ";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    /*店铺详情*/
    public function shopInfo($shopId)
    {
       $query = $this->db->get_where('jm_shop',array('id'=>$shopId));
        return $query->row_array();
    }
    /*comm详情*/
    public function commInfo($shopId)
    {
        $sql = "select jm_user.nickName,jm_comment.* from jm_user,jm_comment WHERE jm_user.id=jm_comment.userId AND jm_comment.shopId=$shopId ORDER BY id DESC";
        //$query = $this->db->get_where('jm_comment',array('shopId'=>$shopId));
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    /*星星数*/
    public function avg_comments($shopId)
    {
        $sql="select avg(star) as star from jm_comment where shopid=?";
        $query=$this->db->query($sql,array($shopId));
        return $query->row_array();
    }

    /*添加店铺*/
    public function addShop($info)
    {
        return $this->db->insert('jm_shop',$info);
    }

    /*修改店铺*/
    public function editShop($shopId,$info)
    {
        $this->db->where('id',$shopId);
        return $this->db->update('jm_shop',$info);
    }

    /*删除店铺*/
    public function delete($shopId)
    {
        $this->db->where('id',$shopId);
        return $this->db->update('jm_shop',array('disable'=>1));
    }
    /*删除comm*/
    public function deleteComm($commId)
    {
        $this->db->where('id',$commId);
        return $this->db->delete('jm_comment');
    }
    /*15-09-09 查找店铺各种情况*/
    /*只根据分类筛选*/
    public function shopListBySort($childId)
    {
        $sql = "SELECT shp.*,chd.`name` as cate FROM `jm_shop` AS shp LEFT JOIN jm_catechild as chd ON chd.id = shp.childId WHERE shp.`childId` = ".$childId." AND shp.`disable` =0";
        $query = $this->db->query($sql);
//        $query = $this->db->get_where('jm_shop',array('childId'=>$childId,'disable'=>0));
        //var_dump($this->db->last_query());
        return $query->result_array();
    }


    /*只按距离筛选*/
    public function shopListByDistance($typeId)
    {
        $query = $this->db->get_where('jm_shop',array('typeId'=>$typeId,'disable'=>0));
        return $query->result_array();
    }

    /*置顶店铺*/
    public function stickShop($shopId)
    {
        $sql = "select MAX(stick) FROM jm_shop";
        $query = $this->db->query($sql);
        $max_stick = $query->row_array();
//        var_dump($max_stick);
//        $sql2 = "UPDATE jm_shop SET stick = ".$max_stick['MAX(stick)']."+1 WHERE id =".$shopId;
//        $query2 = $this->db->query($sql2);
        $stickNen = $max_stick['MAX(stick)']+1;
        $this->db->where('id',$shopId);
        return $this->db->update('jm_shop',array('stick'=>$stickNen));


    }

    /*搜索店铺*/
    public function SearchShop($like,$row,$num)
    {
        $sql = "select shp.*,chd.`name` as cate from jm_shop as shp LEFT JOIN jm_catechild as chd ON chd.id = shp.childId WHERE disable=0 and shp.`name` LIKE '%".$like."%' limit ".$row.",".$num;
        $query = $this->db->query($sql);
        return $query->result_array();
    }



    /**************  店铺信息 end  ******************/



    /**************  优惠信息 begin  ******************/
    /*优惠信息*/
    public function discountInfo($shopId)
    {
        $query = $this->db->get_where('jm_discount',array('shopId'=>$shopId));
        return $query->result_array();
    }

    /*评论10条*/
    public function commentList($info)
    {
        $sql = "select jm_user.nickName,jm_comment.* from jm_user,jm_comment WHERE jm_user.id=jm_comment.userId AND jm_comment.shopId=? AND  jm_comment.id<? ORDER BY id DESC limit 10";
        $query=$this->db->query($sql,$info);
        return $query->result_array();
    }

    /**************  优惠信息 end  ******************/



    /**************  评论信息 begin  ******************/
    /*提交评论*/
    public function insert_comment($commentInfo)
    {
        return $this->db->insert('jm_comment',$commentInfo);
    }

    /**************  评论信息 end  ******************/

    /**************  分类信息 begin  ******************/

    /*获得分类*/
    public function getCategory()
    {
        $query = $this->db->get_where('jm_category',array('disable'=>0));
        return $query->result_array();
    }

    /*获得子类*/
    public function getChild($categoryId)
    {
        $query = $this->db->get_where('jm_catechild',array('categoryId'=>$categoryId));
        return $query->result_array();
    }

    /*添加分类*/
    public function addCategory($info)
    {
        return $this->db->insert('jm_category',$info);
    }

    /*获取分类信息*/
    public function categoryInfo($categoryId)
    {
        $query = $this->db->get_where('jm_category',array('id'=>$categoryId));
        return $query->row_array();
    }

    /*修改分类*/
    public function editCategory($categoryId,$info)
    {
        $this->db->where('id',$categoryId);
        return $this->db->update('jm_category',$info);
        //var_dump($this->db->last_query());die;
    }

    /*删除分类*/
    public function deleteCategory($categoryId)
    {
        $this->db->where('id',$categoryId);
        return $this->db->update('jm_category',array('disable'=>1));
    }

    /*last insert category*/
    public function lastCategory()
    {
        $sql = "select max(id) as mid from jm_category";
        $query = $this->db->query($sql);
        return $query->row_array();
    }

    /*添加子类*/
    public function addChild($info)
    {
        return $this->db->insert('jm_catechild',$info);
    }

    /*查询子类*/
    public function childList($categoryId)
    {
        $query = $this->db->get_where('jm_catechild',array('categoryId'=>$categoryId));
        return $query->result_array();
    }

    /*获取全部子类*/
    public function childAll()
    {
        $query = $this->db->get_where('jm_catechild');
        return $query->result_array();
    }

    /*修改子类*/
    public function editChild($childId,$childName)
    {
        $this->db->where('id',$childId);
        return $this->db->update('jm_catechild',array('name'=>$childName));
    }

    /**************  分类信息 end  ******************/


    /**************  相册 begin  ******************/

    /*查看相册*/
    public function photoList($shopId)
    {
        $query = $this->db->get_where('jm_album',array('shopId'=>$shopId,'disable'=>0));
        return $query->result_array();
    }

    /*添加图片*/
    public function addPhoto($info)
    {
        return $this->db->insert('jm_album',$info);
    }

    /*删除图片*/
    public function delPhoto($photoId)
    {
        $this->db->where('id',$photoId);
        return $this->db->update('jm_album',array('disable'=>1));
    }
    /**************  相册 end  ******************/





}

?>
