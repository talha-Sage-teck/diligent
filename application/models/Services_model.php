<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Services_model extends My_Model
{

    public $table = 'services';
    public $primary = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }
}
/* End of file Services_model.php */
/* Location: ./application/models/Services_model.php */