<div class="container-fluid  dashboard-content">
	<!-- ============================================================== -->
	<!-- pageheader -->
	<!-- ============================================================== -->
	<div class="row">
		<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
			<div class="page-header">
				<h2 class="pageheader-title">Inspection List</h2>
				<div class="page-breadcrumb">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="<?php echo site_url('/')?>" class="breadcrumb-link">Dashboard</a></li>
							<li class="breadcrumb-item active" aria-current="page">List Inspection</li>
						</ol>
					</nav>
				</div>
			</div>
		</div>
	</div>
	
	<div class="row">
			<div class="col-md-12 text-center">
				<?php if($this->session->userdata('error')) {?>
				<div class="alert alert-danger alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<?php echo $this->session->userdata('error') ?> </div>
				<?php } if($this->session->userdata('message')){?>
				<div class="alert alert-success alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<?php echo $this->session->userdata('message') ?> </div>
				<?php }?>
			</div>
		</div>
	<!-- ============================================================== -->
	<!-- end pageheader -->
	<!-- ============================================================== -->
	<?php if ( $this->ion_auth->in_group( 'inspector' ) ) {?>
	<div class="row">
		<div class="col mb-2">
			<a href="<?php echo site_url($pslug."/addinspection") ?>" type="button" class="btn  btn-primary"><i class="fa fa-plus"></i> Add <?php echo $page_title ?></a>
		</div>
	</div>
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
									<th>Building Name</th>
									<th>Location</th>
									<th>Total workers</th>
									<th>Date</th>
									<th>Prepared By</th>
									<?php if ( $this->ion_auth->in_group( 'admin' ) ) {?>
									<th>Quotation</th>
									<?php }?>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$start = 1;
								foreach ( $data_list as $listsingle ) {									
									?>
								<tr>
									<td>
										<?php echo $start?>
									</td>
									<td>
										<?php echo $listsingle->project ?>
									</td>
									<td>
										<?php echo $listsingle->location ?>
									</td>
									<td>
										<?php echo $listsingle->total_target_workers ?>
									</td>
									<td>
										<?php echo $listsingle->created_at ?>
									</td>
									<td style="text-transform: capitalize">
										<strong><?php echo $listsingle->username ?></strong><br>
										<?php echo $listsingle->first_name.' '.$listsingle->last_name ?>
										
									</td>
									<?php if ( $this->ion_auth->in_group( 'admin' ) ) {?>
									<td>
										<a href="<?php echo site_url("quotation/addquotation/".$listsingle->inspid)?>" class="btn btn-xs btn-primary"><i class="fas fa-th-list"></i> Generate Quotation</a>
										<?php if($listsingle->quotation_generated === 1) echo "Generated";?>
									</td>
									<?php }?>
									<td><a href="<?php echo site_url("inspection/view/".$listsingle->inspid)?>" class="btn btn-secondary btn-xs"><i class="fas fa-eye"></i> View</a></td>
								</tr>
								<?php
								$start++;
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