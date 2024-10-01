<!-- Content Wrapper. Contains page content -->
<div class="layout-content">
<div class="container-fluid flex-grow-1 container-p-y">
<h1>Inbox List</h1>
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
<h6 class="card-header"><a href="<?php echo site_url($this->url_prefix.$pslug.'/create') ?>" type="button" class="btn  btn-primary"><i class="fa fa-plus"></i> Add <?php echo $page_title ?></a></h6>
	
<div class="card-datatable table-responsive">
        <table class="table table-striped table-bordered dt-responsive nowrap datatables-demo" id="mytable">
            <thead>
                <tr>
                    <th>No</th>
				    <th>Detail</th>
				    <th>User</th>
				    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
			
            foreach ($inbox_data as $inbox)
            {
				$notify = '';
				$delete_id = 0;
				if($inbox->user_id > 1){
					$total_notify = $this->inbox_model->notify_admin_ind_chat($inbox->user_id);
					if($total_notify > 0){
						$notify = '<span class="badge badge-pill badge-danger">'.$total_notify.'</span>';
					}
				}
				
				if($inbox->user_id > 1){
					$delete_id = $inbox->user_id;
				}elseif($inbox->to_user_id > 1){
					$delete_id = $inbox->to_user_id;
				}
                ?>
                <tr>
		    <td><?php echo $notify ?></td>
		    <td><?php echo word_limiter($inbox->detail, 10) ?></td>
		    <td><?php echo $inbox->from_first_name.' '.$inbox->from_last_name.' / '.$inbox->to_first_name.' '.$inbox->to_last_name ?></td>
		    <td style="text-align:center">
			<a href="<?php echo admin_url('inbox/read/'.$delete_id) ?>" class="btn btn-primary">Details</a> &nbsp; 
				<?php //if($inbox->user_id > 1){
					echo anchor(admin_url('inbox/delete_chat/'.$delete_id),'Delete','onclick="javasciprt: return confirm(\'Whole chat will be deleted. Are You Sure ?\')"');
				//} ?>
		    </td>
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
