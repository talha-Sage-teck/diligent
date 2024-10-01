<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Quotation_services_model extends My_Model
{

    public $table = 'quotation_services';
    public $primary = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }
	
	function getByQuoteId($quotation_id){
		$this->db->select("quotation_services.id,
							quotation_services.title,
							quotation_services.frequency,
							quotation_services.price,
							quotation_services.quotation_id");
		$this->db->where('quotation_id', $quotation_id);
		$rs = $this->db->get($this->table);
		return $rs->result();
	}
	
}
/* End of file News_model.php */
/* Location: ./application/models/News_model.php */