<!-- Content Wrapper. Contains page content -->
<div class="layout-content">
<div class="container-fluid flex-grow-1 container-p-y">
<h1>Withdraw Log <?php echo ($status == 1) ? '- Pending' : '- Processed'  ?></h1>
        <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="<?php echo admin_url() ?>"><i class="feather icon-home"></i></a></li>
<li class="breadcrumb-item"><?php echo anchor($this->url_prefix.$pslug,$page_title) ?></li>
<li class="breadcrumb-item active"><?php echo $action.' '.$page_title ?></li>
</ol>
</div>
  <!-- Main content -->
    <div class="row">
<div class="col-md-12 text-center">
		  <?php if($this->session->userdata('error')) {?>
          <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <?php echo $this->session->userdata('error') ?>
              </div>
          <?php } if($this->session->userdata('message')){?>
          <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <?php echo $this->session->userdata('message') ?>
              </div>
          <?php }?>
        </div>
</div>

        
<div class="card">

	
<div class="card-datatable table-responsive">
        <table class="table table-striped table-bordered dt-responsive nowrap datatables-demo" id="mytable">
            <thead>
                <tr>
                    <th>No</th>
				    <th>Amount</th>
				    <th>User</th>
				    <th>Type</th>
				    <th>Date</th>
				    <th>Action</th>
				    <th></th>
				    <th>Details</th>
			    </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($withdraw_data as $wdata)
            {
                ?>
                <tr class="<?php if ($wdata->rejected == 1) echo 'bg-warning'; ?>">
		    <td><?php echo ++$start ?></td>
		    <td><?php echo $wdata->withdrawal_amount ?></td>
		    <td><?php echo $wdata->first_name.' '.$wdata->last_name ?></td>
		    <td><?php echo $wdata->type ?></td>
		    <td><?php echo $wdata->date ?></td>
		    <td><a href="<?php echo admin_url('withdraw/approve_withdraw/'.$wdata->id)?>" class="btn btn-primary btn-xs" onclick="javasciprt: return confirm('Are You Sure?')">
					<span class="fa fa-check"></span> Approve</a>
                <a href="<?php echo admin_url('withdraw/reject/'.$wdata->id)?>" class="btn btn-danger  btn-xs"><span class="fa fa-times"></span> Reject</a></td>
		    <td><?php if ($wdata->rejected == 1) echo 'Rejected'; ?></td>
		    <td><a href="<?php echo admin_url('users/read/'.$wdata->user_id)?>" class="btn btn-primary btn-xs"><i class="feather icon-eye"></i> User Details</a></td>
            </tr>
                <?php
            }
            ?>
             </tbody>
        	</table>
		   </div>
		   <!--  ./card-datatable table-responsive -->
</div>
<!--  ./card -->
</div>
<!--  ./container-fluid -->
