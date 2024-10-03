<!-- Content Wrapper. Contains page content -->
<div class="layout-content">
<div class="container-fluid flex-grow-1 container-p-y">
<h1>Enroll List</h1>
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
        <table class="table table-striped table-bordered dt-responsive nowrap" id="mytable">
            <thead>
                <tr>
                    <th>No</th>
				    <th>User id</th>
				    <th>Scheme id</th>
				    <th>Got gift</th>
				    <th>Paid</th>
				    <th>Paid amount</th>
				    <th>Date</th>
				    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($enroll_data as $enroll)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td><?php echo $enroll->user_id ?></td>
		    <td><?php echo $enroll->scheme_id ?></td>
		    <td><?php echo $enroll->got_gift ?></td>
		    <td><?php echo $enroll->paid ?></td>
		    <td><?php echo $enroll->paid_amount ?></td>
		    <td><?php echo $enroll->date ?></td>
		    <td style="text-align:center">
			<div class="btn-group">
				<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
					<span class="fa fa-cogs"></span>
				</button>
				<ul class="dropdown-menu pull-right">
					<li><?php echo anchor(site_url($this->url_prefix.'enroll/update/'.$enroll->id),'Update');?></li>
					<li><?php echo anchor(site_url($this->url_prefix.'enroll/delete/'.$enroll->id),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); ?></li>
				</ul>
			</div>
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
