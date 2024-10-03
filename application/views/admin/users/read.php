<div class="container-fluid flex-grow-1 container-p-y">
  <h4 class="font-weight-bold py-3 mb-0">Users view</h4>
  <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo admin_url() ?>"><i class="feather icon-home"></i></a></li>
      <li class="breadcrumb-item"><a href="<?php echo admin_url('users') ?>">Users</a></li>
      <li class="breadcrumb-item active">Users view</li>
    </ol>
  </div>
  <div class="media align-items-center py-3 mb-3">
    <?php if (isset($user_additional->avatar)){ ?>
    <img src="<?php echo base_url('uploads/userdoc/thumbs/').$user_additional->avatar ?>" alt="Image not uploaded" class="d-block ui-w-100 rounded-circle">
    <?php }?>
    <div class="media-body ml-4">
      <h4 class="font-weight-bold mb-0"><?php echo $user_info->first_name.' '.$user_info->last_name ?></h4>
      <div class="text-muted mb-2">Referral Code: <?php echo $user_info->refcode ?></div>
    </div>
  </div>
  <div class="card mb-4">
    <div class="card-body">
    <div class="table-responsive">
      <table class="table user-view-table m-0">
        <tbody>
          <tr>
            <td>Registered:</td>
            <td><?php echo date(DATE_SHORT, $user_info->created_on); ?></td>
          </tr>
          <tr>
            <td>Last login:</td>
            <td><?php echo date(DATETIME_LONG, $user_info->last_login); ?></td>
          </tr>
          
          <tr>
            <td>Account Approved:</td>
            <td><?php if ($user_info->approve_status == 1) {?>
              <span class="ion ion-ios-checkbox text-success"></span>&nbsp; Approved
              &nbsp;&nbsp; <button type="button" class="btn btn-default btn-xs" id="approve-user" data-ajaxurl="<?php echo admin_url('users/ajax_approve_user') ?>" data-approve="0" data-userid="<?php echo $user_info->id ?>">Disapprove User</button>
              <?php }else{?>
              <span class="badge badge-outline-danger"><span class="ion ion-ios-close-circle-outline text-danger"></span>&nbsp; Not Approved</span>
              &nbsp;&nbsp; <button type="button" class="btn btn-primary btn-xs" id="approve-user" data-ajaxurl="<?php echo admin_url('users/ajax_approve_user') ?>" data-approve="1" data-userid="<?php echo $user_info->id ?>">Approve User</button>
              <?php }?>
             
              
             </td>
          </tr>
          <tr>
            <td>Status:</td>
            <td><?php if ($user_info->active == 1) {?>
              <span class="badge badge-outline-success">Active</span> &nbsp; <span class="text-muted">(This status is for auto email verification)</span>
              <?php } else {?>
              <span class="badge badge-outline-danger">Not active (Email is not verified or not logged in any time)</span>
              <?php }?></td>
          </tr>
          <tr>
          <td>Bitcoin Address:</td>
          <td><?php echo isset($user_additional->bitcoin) ? $user_additional->bitcoin : '- Not given -' ?></td>
          </tr>
        </tbody>
      </table>
      </div>
    </div>
    <hr class="border-light m-0">
  </div>
  <div class="card mb-4">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table user-view-table m-0">
          <tbody>
            <tr>
              <td>Eamil:</td>
              <td><?php echo $user_info->email ?></td>
            </tr>
            <tr>
              <td>Name:</td>
              <td><?php echo $user_info->first_name.' '.$user_info->last_name ?></td>
            </tr>
            <tr>
              <td>Company:</td>
              <td><?php echo $user_info->company ?></td>
            </tr>
          </tbody>
        </table>
      </div>
      <h6 class="mt-4 mb-3">Personal info</h6>
      <div class="table-responsive">
        <table class="table user-view-table m-0">
          <tbody>
            <tr>
              <td>Phone:</td>
              <td><?php echo $user_info->phone ?></td>
            </tr>
            <tr>
              <td>Ref. Code:</td>
              <td><?php echo site_url('login/register') ?>?refcode=<?php echo $user_info->refcode ?></td>
            </tr>
            <?php 
			  if($user_info->referrer_id){
			  $ref_info = $this->users_model->get_by_id($user_info->referrer_id);?>
            <tr class="bg-info">
              <td>Referral (Uplink/Team Lead):</td>
              <td><?php echo $ref_info->first_name.' '.$ref_info->last_name;
?></td>
            </tr>
            <?php }?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  
  <div class="card mb-4">
    <div class="row no-gutters row-bordered">
      <div class="d-flex col-md align-items-center">
        <div class="card-body d-block text-dark">
          <div class="text-muted small line-height-1">Total Downlinks</div>
          <div class="text-xlarge">
            <?php echo count($referred_users) ?>
          </div>
        </div>
      </div>
      <div class="d-flex col-md align-items-center"> <div class="card-body d-block text-dark">
        <div class="text-muted small line-height-1">Current Packages</div>
        <?php if(!empty($cur_packages)) {
			foreach($cur_packages as $pkg){
			?>
        <div class="text-xlarge"><?php echo $pkg->title ?></div><?php } }?>
        </div> </div>
        <div class="d-flex col-md align-items-center"> <a href="javascript:void(0)" class="card-body d-block text-dark">
        <div class="text-muted small line-height-1">Current Earnings</div>
        <div class="text-xlarge"><?php show_amount($cur_earnings) ?></div>
        </a> </div>
      <div class="d-flex col-md align-items-center"> <a href="javascript:void(0)" class="card-body d-block text-dark">
        <div class="text-muted small line-height-1">Current Bonuses</div>
        <div class="text-xlarge"><?php show_amount($cur_bonus) ?></div>
        </a> </div>
    </div>
    <hr class="border-light m-0">
    <div class="card-body"> <h3><?php echo $user_info->first_name.' '.$user_info->last_name ?> - Referrered Users List</h3>
      <?php 
 		if(!empty($referred_users)){?>       
        <table class="table table-bordered table-striped">
        <thead><tr><th>Name</th><th>Email</th></tr></thead>
        <tbody>
        <?php foreach($referred_users as $ref_usr){?>
        <tr><td><?php echo $ref_usr->first_name.' '.$ref_usr->last_name ?></td><td><?php echo $ref_usr->email ?></td><tr>
        <?php }?>
        </tbody>
        </table>
        <?php }else{?>
        <div class="text-center">
        <i class="fa fa-times-circle fa-5x text-danger"></i>
        <h3 class="display-4 text-danger">No tree members found!</h3>
        </div>
        <?php }?>
    </div>
  </div>
  
  
  <div class="card mb-4">
  <div class="card-header card-head">
  <strong>Deposit History</strong>
  </div>
    <div class="card-body">
      <div class="table-responsive">
      <?php if ($deposit_history) {?>
      
        <table class="table table-bordered table-striped m-0">
        <thead>
        <tr>
        <td>Amount</td>
        <td>Date</td>
        </tr>
        </thead>
          <tbody>
          <?php foreach($deposit_history as $dhistory){?>
            <tr>
              <td><?php show_amount($dhistory->amount) ?></td>
              <td><?php echo date(DATE_SHORT, strtotime($dhistory->date)) ?></td>
            </tr>
            <?php }?>
          </tbody>
        </table>
        <?php }else{?>
        <div class="alert alert-danger">No record found</div>
        <?php }?>
      </div>
      
    </div>
  </div>
  
  <div class="card mb-4">
  <div class="card-header card-head">
  <strong>Withdrawal History (Approved)</strong>
  </div>
    <div class="card-body">
      <div class="table-responsive">
      <?php if ($withdraw_history) {?>
      
        <table class="table table-bordered table-striped m-0">
        <thead>
        <tr>
        <td>Amount</td>
        <td>Date</td>
        <td>Type</td>
        </tr>
        </thead>
          <tbody>
          <?php foreach($withdraw_history as $whistory){?>
            <tr>
              <td><?php show_amount($whistory->amount) ?></td>
              <td><?php echo date(DATE_SHORT, strtotime($whistory->date)) ?></td>
              <td><?php echo $whistory->type ?></td>
            </tr>
            <?php }?>
          </tbody>
        </table>
        <?php } else{?>
        <div class="alert alert-danger">No record found</div>
        <?php }?>
      </div>
      
    </div>
  </div>
</div>
