<div class="container-fluid  dashboard-content">
	<!-- ============================================================== -->
	<!-- pageheader -->
	<!-- ============================================================== -->
	<div class="row">
		<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
			<div class="page-header">
				<h2 class="pageheader-title">Work Certificate List</h2>
				<div class="page-breadcrumb">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="<?php echo site_url('/')?>" class="breadcrumb-link">Dashboard</a></li>
							<li class="breadcrumb-item active" aria-current="page">List Work Certificate</li>
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
									<th>Client Name</th>
									<th>Location</th>
									<th>Ref</th>
									<th>Date</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$start = 1;
								foreach ( $list_data as $cert ) {
									?>
								<tr>
									<td>
										<?php echo $start?>
									</td>
									<td>
										<?php echo $cert->clientname ?>
									</td>
									<td>
										<strong>Project:</strong> <?php echo $cert->project ?><br>
										<strong>Location:</strong> <?php echo $cert->location ?>
									</td>
									<td>
										<strong>Job Ref:</strong> <?php echo $cert->job_ref ?><br>
										<strong>Job Number:</strong> <?php echo $cert->job_ref ?>
									</td>
									<td>
										<?php echo $cert->created_at ?>
									</td>
									<td style="text-transform: capitalize">
										
										<div class="dropdown ml-auto">
											<a class="toolbar" href="#" role="button" id="dropdownMenuLink5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-cogs"></i>  </a>
											<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink5">
												<?php echo anchor(site_url("work/pdfcertificate/".$cert->id),'<i class="fas fa-file-pdf"></i> Download PDF', array('class' => 'dropdown-item'));?>
												<?php echo anchor(site_url("work/updatecertificate/".$cert->id),'<i class="fas fa-edit"></i> Update', array('class' => 'dropdown-item'));
												echo anchor(site_url("work/readcertificate/".$cert->id),'<i class="fas fa-eye"></i> View', array('class' => 'dropdown-item'));
												?>
												<?php if ( $this->ion_auth->in_group( 'admin' ) ) {?>
												<?php echo anchor(site_url('work/deletecertificate/'.$cert->id),'<i class="fas fa-trash-alt"></i> Delete', array('onclick' => "javasciprt: return confirm('It will not be recovered. Are You Sure to Delete?')", 'class' => 'dropdown-item')); ?>
												<?php }?>
												
											</div>
										</div>
									</td>
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