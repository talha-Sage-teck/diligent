<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Maintenance_inspections_model extends My_Model
{

    public $table = 'maintenance_inspections';
    public $primary = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }
	
	function get_list($condition = [], $limit = 9999){
		$this->db->select("*, users.id AS userid, maintenance_inspections.id AS mid");
		$this->db->where($condition);
		$this->db->join("users", "maintenance_inspections.prepared_by = users.id", "inner");
		$this->db->order_by($this->table.'.'.$this->primary, $this->order);
		$this->db->limit($limit);
		$rs = $this->db->get($this->table);
// 		echo $this->db->last_query();
		return $rs->result();
	}
}
/* End of file Maintenance_inspections_model.php */
/* Location: ./application/models/Maintenance_inspections_model.php */