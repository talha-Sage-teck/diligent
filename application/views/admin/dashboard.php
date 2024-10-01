<div class="container-fluid flex-grow-1 container-p-y">
  <h4 class="font-weight-bold py-3 mb-0">DASHBOARD</h4>
  <div class="row">
    <div class="col-xl-6 col-md-12">
      <div class="card d-flex w-100 mb-4">
        <div class="row no-gutters row-bordered row-border-light h-100">
          <div class="d-flex col-sm-6 align-items-center">
            <div class="card-body media align-items-center text-dark"> <i class="lnr lnr-users display-4 d-block text-danger"></i> <span class="media-body d-block ml-3"> <span class="text-big"><span class="mr-1 text-danger"><?php echo count($reg_users);?></span>Users</span> <br>
              <small class="text-muted">Total Registered Users </small> </span> </div>
          </div>
          <div class="d-flex col-sm-6 align-items-center">
            <div class="card-body media align-items-center text-dark"> <i class="feather icon-user-check display-4 d-block text-danger"></i> <span class="media-body d-block ml-3"> <span class="text-big"><span class="mr-1 text-danger">
              <?php echo $total_with_investments ?>
              </span>Users</span> <br>
              <small class="text-muted">With Investment</small> </span> </div>
          </div>
          <div class="d-flex col-sm-6 align-items-center">
            <div class="card-body media align-items-center text-dark"> <i class="fas fa-user-slash fa-2x d-block text-danger"></i> <span class="media-body d-block ml-3"> <span class="text-big"><span class="mr-1 text-danger">
              <?php echo $total_without_investments ?>
              </span> Users</span> <br>
              <small class="text-muted">No Investment</small> </span> </div>
          </div>
          
        </div>
      </div>
    </div>
    <div class="col-xl-6 col-md-12">
      <div class="card d-flex w-100 mb-4">
        <div class="row no-gutters row-bordered row-border-light h-100">
          <div class="d-flex col-sm-6 align-items-center">
            <div class="card-body media align-items-center text-dark"> <i class="lnr lnr-diamond display-4 d-block text-primary"></i> <span class="media-body d-block ml-3"> <span class="text-big mr-1 text-primary"><?php show_amount( $sum_active_investments )?></span> <br>
              <small class="text-muted">Active Investments</small> </span> </div>
          </div>
          <div class="d-flex col-sm-6 align-items-center">
            <div class="card-body media align-items-center text-dark"> <i class="lnr lnr-clock display-4 d-block text-warning"></i> <span class="media-body d-block ml-3"> <span class="text-big"><span class="mr-1 text-warning"><?php echo $pending_withdrawals ?></span>Pending Withdrawals</span> <br>
              <small class="text-muted">Need Admin approvals</small> </span> </div>
          </div>
          <div class="d-flex col-sm-6 align-items-center">
            <div class="card-body media align-items-center text-dark"> <i class="lnr lnr-hourglass display-4 d-block text-danger"></i> <span class="media-body d-block ml-3"> <span class="text-big"><span class="mr-1 text-danger"><?php echo (int)$paid_withdrawals ?></span>  Payouts</span> <br>
              <small class="text-muted">Total request paid</small> </span> </div>
          </div>
          <div class="d-flex col-sm-6 align-items-center">
            <div class="card-body media align-items-center text-dark"> <i class="lnr lnr-license display-4 d-block text-success"></i> <span class="media-body d-block ml-3"> <span class="text-big"><span class="mr-1 text-success"><?php echo $total_packages ?></span> Packages</span> <br>
              <small class="text-muted">Total packages</small> </span> </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
           
</div>
