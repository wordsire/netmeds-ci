<?php 
if(!defined('BASEPATH')){exit('No direct script access allowed');}

class LabTest_m extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function test_list($search = null, $offset = 0, $user_id){
        $this->db->select('T.*, C.item_id as cart_item_id')->from('tests as T')
        ->join('cart as C', 'T.item_id = C.item_id AND C.user_id = '.$user_id, 'left');
        if($search != null){
            $this->db->like('T.item_name', $search);
        }
        return $this->db->limit(25, $offset)->get()->result();
    }

    public function insert_data($data){
        return $this->db->insert_batch('tests', $data);
    }
}