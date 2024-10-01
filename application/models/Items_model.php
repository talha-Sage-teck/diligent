<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Items_model extends My_Model
{

    public $table = 'items';
    public $primary = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }
}
/* End of file Items_model.php */
/* Location: ./application/models/Items_model.php */