<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Delievery_items_model extends My_Model
{

    public $table = 'delievery_items';
    public $primary = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }
	
	
	function getByInvId($challan_id){
		$this->db->where('challan_id', $challan_id);
		$rs = $this->db->get($this->table);
		return $rs->result();
	}
	
	
}
/* End of file News_model.php */
/* Location: ./application/models/News_model.php */