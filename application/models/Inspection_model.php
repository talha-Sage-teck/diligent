<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Inspection_model extends My_Model
{

    public $table = 'inspections';
    public $primary = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }
	
	function get_list($condition = []){
		$this->db->select("*, inspections.id AS inspid, users.id AS userid");
		$this->db->where($condition);
		$this->db->join("users", "inspections.prepared_by = users.id", "inner");
		$this->db->order_by('inspid', $this->order);
		$rs = $this->db->get($this->table);
		return $rs->result();
	}
	
	
}
/* End of file News_model.php */
/* Location: ./application/models/News_model.php */