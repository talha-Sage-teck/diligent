<!-- Content Wrapper. Contains page content -->
<div class="layout-content">
<div class="container-fluid flex-grow-1 container-p-y">
<h1>Page_home List</h1>
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
<h6 class="card-header"></h6>
	
<div class="card-datatable table-responsive">
        <table class="table table-striped table-bordered dt-responsive nowrap datatables-demo" id="mytable">
            <thead>
                <tr>
                    <th>No</th>
				    <th>Header heading</th>
				    <th>Header text</th>
				    <th>Service1 heading</th>
				    <th>Service1 text</th>
				    <th>Updated on</th>
				    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($page_home_data as $page_home)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td><?php echo $page_home->header_heading ?></td>
		    <td><?php echo $page_home->header_text ?></td>
		    <td><?php echo $page_home->service1_heading ?></td>
		    <td><?php echo $page_home->service1_text ?></td>
		    <td><?php echo $page_home->updated_on ?></td>
		    <td style="text-align:center">
			<div class="btn-group">
				<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
					<span class="fa fa-cogs"></span>
				</button>
				<ul class="dropdown-menu pull-right">
					<li><?php echo anchor(site_url($this->url_prefix.'page_home/update/'.$page_home->id),'Update');?></li>
					
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
