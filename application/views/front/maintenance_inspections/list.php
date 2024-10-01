
<div class="container-fluid  dashboard-content">
	<!-- ============================================================== -->
	<!-- pageheader -->
	<!-- ============================================================== -->
	<div class="row">
		<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
			<div class="page-header">
				<h2 class="pageheader-title"><?php echo ucfirst("maintenance_inspections")?> List</h2>
				<div class="page-breadcrumb">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="<?php echo admin_url() ?>" class="breadcrumb-link">Dashboard</a></li>
							<li class="breadcrumb-item"><?php echo anchor($pslug, $page_title, array("class=" => "breadcrumb-link")) ?></li>
							<li class="breadcrumb-item active" aria-current="page"><?php echo $action." ".$page_title ?></li>
						</ol>
					</nav>
				</div>
			</div>
		</div>
	</div>
	<!-- ============================================================== -->
	<!-- end pageheader -->
	<!-- ============================================================== -->

	<div class="row">
		<div class="col-md-12 text-center">
			<?php if(validation_errors() != ""){?>
			<div class="alert alert-danger alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<?php echo validation_errors(); ?>
			</div>
			<?php }?>
			<?php if($this->session->userdata("error")) {?>
			<div class="alert alert-danger alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<?php echo $this->session->userdata("error") ?> </div>
			<?php } if($this->session->userdata("message")){?>
			<div class="alert alert-success alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<?php echo $this->session->userdata("message") ?> </div>
			<?php }?>
		</div>
	</div>
	
	<?php if ( $this->ion_auth->in_group( ['inspector'] ) ) {?>
	<a href="<?php echo site_url($pslug."/create") ?>" type="button" class="btn  btn-primary"><i class="fa fa-plus"></i> Add <?php echo $page_title ?></a>
	<?php }?>
	<div class="row">
		<!-- ============================================================== -->
		<!-- data table  -->
		<!-- ============================================================== -->
		<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
			<div class="card">
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-striped table-bordered first" style="width:100%">
							<thead>
								<tr>
									<th>Sr. No.</th>
									<th>Clientname</th>
									<th>Project</th>
									<th>Location</th>
									<th>Created at</th>
									<th>Prepared by</th>
							    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($maintenanceinspections_data as $maintenanceinspections)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td><?php echo $maintenanceinspections->clientname ?></td>
		    <td><?php echo $maintenanceinspections->project ?></td>
		    <td><?php echo $maintenanceinspections->location ?></td>
		    <td><?php echo $maintenanceinspections->updated_at ?></td>
		    <td><?php echo $maintenanceinspections->first_name.' '.$maintenanceinspections->last_name ?></td>						
				<td style="text-align:center">
					<div class="dropdown ml-auto">
						<a class="toolbar" href="#" role="button" id="dropdownMenuLink5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-cogs"></i>  </a>
						<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink5">
							<?php echo anchor(site_url("maintenanceinspections/update/".$maintenanceinspections->mid),"Update", array("class" => "dropdown-item"));?>
							<?php echo anchor(site_url("maintenanceinspections/read/".$maintenanceinspections->mid),"View Details", array("class" => "dropdown-item"));?>
							<?php if ( $this->ion_auth->in_group( "admin" ) ) {?>
							<?php echo anchor(site_url("maintenanceinspections/delete/".$maintenanceinspections->mid),"Delete", array("onclick" => "javasciprt: return confirm('Are You Sure ?')", "class" => "dropdown-item")); ?>
							<?php }?>
						</div>
					</div>
				</td>
	        </tr>
                <?php
            }
            ?>
             </tbody>
        	</table>
					</div>
				</div>
			</div>
		</div>
		<!-- ============================================================== -->
		<!-- end data table  -->
		<!-- ============================================================== -->
	</div>
</div>
