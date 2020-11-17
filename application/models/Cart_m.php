<?php 
if(!defined('BASEPATH')){exit('No direct script access allowed');}

class Cart_m extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function cart_items($user_id){
        return $this->db->select('T.*, C.item_id as cart_item_id')
            ->join('tests as T', 'T.item_id = C.item_id')
            ->get_where('cart as C', array('C.user_id' => $user_id))
            ->result();
    }

    public function add_item_cart($data){
        try{
            $data['created_at'] = date('Y-m-d H:m:s');
            return $this->db->insert('cart', $data);
        }
        catch(Exception $e){
            return false;
        }
    }

    public function remove_item_cart($where){
        return $this->db->where($where)->delete('cart');
    }
}