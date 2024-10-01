<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Expenses_model extends My_Model
{

    public $table = 'expenses';
    public $primary = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }
	
	function get_list($start_date = "", $end_date = "", $condition = []){
		$this->db->where("DATE(created_at) BETWEEN '$start_date' AND '$end_date'");
		$this->db->order_by($this->primary, $this->order);
		$rs = $this->db->get($this->table);
//		echo $this->db->last_query();
		return $rs->result();
	}
	
	function summary($start_date = "", $end_date = "", $condition = []){
		$this->db->select("Sum(expenses.price) AS sum");
		$this->db->where("DATE(created_at) BETWEEN '$start_date' AND '$end_date'");
		$this->db->order_by($this->primary, $this->order);
		$rs = $this->db->get($this->table);
//		echo $this->db->last_query();
		$sum = $rs->row();
		return $sum->sum;
	}
}
/* End of file Expenses_model.php */
/* Location: ./application/models/Expenses_model.php */