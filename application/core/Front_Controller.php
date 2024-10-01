<?php
/**
 * Class : Front (Front_Controller)
 * Front Class to control all front related operations.
 * @author : Arshad Bashir
 * @version : 1.2.1
 * @since : 17 October 2019
 * @released :  18 September 2020
 */
 
class Front_Controller extends MY_Controller
{
  protected $loopcount;
  protected $repeatloop = TRUE;
  public $loopreturn = TRUE;
  public $loopuserinfo = array();
   
  function __construct()
  {
    parent::__construct();
	
	$this->load->library('ion_auth');
	
	$this->load->model('notification_model');
	$this->user_id = $this->ion_auth->get_user_id();
	$this->user_info = $this->ion_auth->user()->row();
	$this->data['page_title'] = get_option('site_title');
	$this->data['meta_keywords'] = get_option('meta_keywords');
	$this->data['meta_description'] = get_option('meta_description');
	$this->data['js_files'] = array();
	$this->data['css_files'] = array();
  }
  
  ///Render view by combining header footer and body content  
  protected function renderView($viewName = "", $data = array(), $include_header_footer = TRUE){
		$this->template_view = 'front'; //Site panel e.g admin, front
        parent::renderView($viewName, $data, $include_header_footer );
    }
	
	
	
	
	function postRegister($reg_id, $ref_id = 0){
		$this->load->model('wallet_model');
													
		/////// create wallet entry in wallet table
		$this->wallet_model->insert(array('amount' => 0, 'user_id' => $reg_id ));
		
		/////// check parents ranks
		
		}
		
	
	/************   daily earnings    ************/		
	function process_package_earnings($package_id){
		$result = array();
		$this->load->model('investment_packages_model');
		
		$package_info = $this->investment_packages_model->get_by_id($package_id);
		$result['daily_profit'] = $daily_cent_earnings = $package_info->daily_percentage_earnings; // in percent
		$result['daily_earnings'] = ($daily_cent_earnings / 100) * $package_info->min_deposit; // in amount
		$result['total_profit'] = $package_info->contract_duration * $daily_cent_earnings;
		$result['contract_duration'] = $package_info->contract_duration;
		$result['min_deposit'] = $package_info->min_deposit;
		
		return $result;
		}

		
		
/********
days passed for investment
@param $records object - mysql result object
********/		
	function daysPassed($records){
		$now = time(); // or your date as well
		$your_date = strtotime($records[0]->date);
		$datediff = $now - $your_date;
		
		$rdays = round($datediff / (60 * 60 * 24));
		return ($rdays > 0) ? $rdays : 1;
		}	
	
	

}