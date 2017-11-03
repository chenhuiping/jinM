<?php


class Collect_model extends CI_Model {
    public function __construct()
    {
        $this->load->database();
    }


    /*收藏店铺*/
    public function collectShop($info)
    {
        return $this->db->insert('jm_shop_collection',$info);
    }

    /*查是否收藏过*/
    public function searchSpCollection($info)
    {
        $query = $this->db->get_where('jm_shop_collection',$info);
        return $query->row_array();
    }

    /*根据用户id查收藏的店铺列表*/
    public function searchSpCollectionByUserId($userId)
    {
        $sql = "select spc.shopId,shp.*,chd.`name` as cate from (jm_shop_collection as spc LEFT JOIN jm_shop as shp ON shp.id = spc.shopId) LEFT JOIN jm_catechild as chd ON chd.id = shp.childId WHERE userId =".$userId;
        $query = $this->db->query($sql);
        return $query->result_array();
    }

}

?>
