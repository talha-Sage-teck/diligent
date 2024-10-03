<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Invoice_services_model extends My_Model
{

    public $table = 'invoice_services';
    public $primary = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }
	
	
	function getByInvId($invoice_id){
		$this->db->where('invoice_id', $invoice_id);
		$rs = $this->db->get($this->table);
		return $rs->result();
	}
	
	
}
/* End of file News_model.php */
/* Location: ./application/models/News_model.php */