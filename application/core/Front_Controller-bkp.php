
<?php
/**
 * Class : Admin (Admin_Controller)
 * Admin Class to control all admin related operations.
 * @author : Arshad Bashir
 * @version : 1.2
 * @since : 17 October 2019
 */
 
class Front_Controller extends MY_Controller
{
  public $admin_id;
   
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
	$this->data['js_files'] = array('custom_scripts');
  }
  
  ///Render view by combining header footer and body content  
  protected function renderView($viewName = "", $data = array(), $include_header_footer = TRUE){
		$this->template_view = 'front'; //Site panel e.g admin, front
        parent::renderView($viewName, $data, $include_header_footer );
    }
	
	
	
	function postRegister($reg_id, $ref_id = 0){
		$this->load->model('users_tree_model');
		$this->load->model('wallet_model');
		/////// add in users referral tree					
		$this->users_tree_model->insert(array('parent_id' => $ref_id,
											'user_id' => $reg_id)
											);
											
		/////// add wallet code for user
		$wallet_code = time().'-'.$reg_id;
		$this->ion_auth->update($reg_id, array('wallet_code' => $wallet_code));
		
		/////// create wallet entry in wallet table
		$this->wallet_model->insert(array('coins' => 0, 'user_id' => $reg_id ));
		
		/////// check parents ranks
		
		}
	
/**
** process tasks of current user
** @param
** @return int - number of tasks assigned to current user
**/	
	public function assigned_tasks($user_id = ''){
		$user_id = (isset($user_id) && $user_id != '') ? $user_id : $this->user_id;
		
		return DEFAULT_TASKS;
		}	
		
/**************************************************
** calculate earnings
** @param int user_id
** @return int - number of coins assigned to given user
**************************************************/				
	function computeUserEarnings($user_id){
		$this->load->model('investment_model');
		$day = date('D');
		
		switch($day){
			case 'Mon':
			case 'Tue':
			case 'Wed':
			case 'Thu':
			$earn_cent = EARN_NORMAL;
			break;
			
			case 'Fri':
			$earn_cent = EARN_FRI;
			break;
			
			case 'Sat':
			$earn_cent = EARN_SAT;
			break;
			
			case 'Sun':
			$earn_cent = EARN_SUN;
			break;		
			}
		$user_inv = $this->investment_model->userInvestment($user_id);
		/** get current investment and days passed ***/
		$cinv = $this->investment_model->currentIvestments($user_id);
		$dayspassed = $this->daysPassed($cinv);
		/******/
		
		$invleft = $user_inv - ($user_inv / INV_BOUND_DAYS * $dayspassed);
		$pdv = ($invleft * $earn_cent) /100;
		$amt = $user_inv / INV_BOUND_DAYS;
		$amtpay = $pdv + $amt;
			
		return $amtpay;
		}
		
		
/**************************************************
** calculate group earnings (daily basis)
** @param int user_id -- parent user_id
** @return int - number of coins assigned to given user
**************************************************/				
	function computeGroupEarnings($user_id){	
	
	}	
		
/******
** calculate refferal commission
** @param float tree member first investment
** @return float calculated commission amount
**/		

	function refCommission($inv_amount){
		$c = GROUP_COMMISSION/100 * $inv_amount;
		return $c; 
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
		
/////// check user rank; user fall in which rank by investment
	function userRankByInv(){
		$this->load->model('investment_model');
		$this->load->model('ranks_model');
		$this->load->model('users_tree_model');
		$this->load->model('users_achievements_model');
		
		$user_id = $this->user_id;
		//$user_id = 31;
		$cur_inv = $this->investment_model->userInvestment();
		$maybe_rank_info = $this->ranks_model->getRankByInv($cur_inv); // current investment rank
		//echo $this->db->last_query();
		$total_ranks = $this->ranks_model->total_records();
		
		//var_dump($maybe_rank_info); exit;
		if(!empty($maybe_rank_info)){
			// if cur rank is 1 then ok
			// if cur rank = 2 
			$cur_rank_num = $maybe_rank_info->rank_number;
			
			$new_rank = $this->_checkRankPlacement($cur_rank_num, $user_id, $cur_inv);
			if($new_rank === FALSE){
				//$old_rank = $this->users_achievements_model->achieved($user_id, 1);
				return $new_rank;
				}
			else{
				return $new_rank;
				}
				
			//var_dump($cur_rank_num);
			}
		else{
			return FALSE;
			}	
		
		}		
		
	function _checkUserRank($cinvrank, $cmembers){
		$records = $this->ranks_model->checkRankForRecursive($cinvrank);
		foreach($records as $record){
			if($cmembers >= $record->total_members){
				return $record->rank_number;
			  }
			}
		return 0;	
		}	
		
/// check current placement. may be used recursively
/**
* @param $cur_rank int
* @param $user_id int
* @param $cur_inv 
* @return int/bool False if not fall in any rank
**/		
	function _checkRankPlacement($cur_rank, $user_id, $cur_inv){
		$child_inv_ok = 0;
		$assign_rank = false;
		$count_members = count($this->users_tree_model->get_child_tree_ids($user_id));//members in tree excluding himself
		$direct_ref_info = $this->users_tree_model->getDirectChildren($user_id);
		$direct_gmembers = count($direct_ref_info);
		if( $cur_rank >= 1 ){
			if($direct_gmembers == 4){
				foreach($direct_ref_info as $chinfo){
					$chinv = $this->investment_model->userInvestment($chinfo->user_id);
					if($chinv >= MIN_USER_INV){
						$child_inv_ok++;
						}
					}
				if($child_inv_ok == 4){ // all 4 group members have required inv
					$assign_rank = $cur_rank + 1;	
					return $assign_rank; 
					}
				else{
					return $assign_rank;
					}	
				}
			}
		elseif($cur_rank == 0){ // Investment is greater than 500 coins			
			//var_dump($direct_gmembers);
			if($direct_gmembers >= 2){
				foreach($direct_ref_info as $chinfo){
					$chinv = $this->investment_model->userInvestment($chinfo->user_id);
					if($chinv >= MIN_DOWNLINK_INV){
						$child_inv_ok++;
						}
					}
				if($child_inv_ok >= 2){ // alteast two group members have required inv
					$assign_rank = 1;	
					return $assign_rank; 
					}
				else{
					return $assign_rank;
					}	
				}
			}	
		}	
		
/// get user current investment status details
/// - 
/// @param $user_id int
/// @return array 

	function userInvStatus($user_id){
		$this->load->model('investment_model');
		$this->load->model('users_model');
		
		$status = array();
		$userdata = $this->users_model->get_by_id($user_id);
		$status['user_reg_date'] = date(DATE_MYSQL,$userdata->created_on);
		$status['noinvestment'] = FALSE;
		$last_inv = $this->investment_model->lastInvestment($user_id);
		$status['inv_end_date'] = (!empty($last_inv)) ? $last_inv->bound_till : FALSE;
		if($status['inv_end_date'] !== FALSE){
		  $status['inv_days_rem'] = days_remaining($last_inv->bound_till);
		}
		else{
			$days_passed = days_remaining(date(DATE_MYSQL,$userdata->created_on));
			$status['inv_days_rem'] = $days_passed;
			$status['noinvestment'] = TRUE;
		}
		
		return $status;
		}		

}