<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Quotation_model extends My_Model
{

    public $table = 'quotations';
    public $primary = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }
	
	function getlist($condition){
		$this->db->select("quotations.id AS quotation_id,
							quotations.clientname,
							quotations.attention,
							quotations.project,
							quotations.location,
							quotations.validity_days,
							quotations.created_at,
							quotations.updated_at,
							quotations.mobduration,
							quotations.workduration,
							quotations.prepared_by,
							quotations.inspection_id,
							quotations.quotation_text,
							quotations.`status`,
							invoices.id AS invoice_id");
		$this->db->join("invoices", "quotations.id = invoices.quotation_id", "LEFT");
		$this->db->where($condition);
		$this->db->order_by("quotations.id", $this->order);
		$rs = $this->db->get($this->table);
		return $rs->result();
		
	}
}
/* End of file News_model.php */
/* Location: ./application/models/News_model.php */