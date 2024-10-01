<div class="container-fluid dashboard-content">
	<!-- ============================================================== -->
	<!-- pageheader  -->
	<!-- ============================================================== -->
	<div class="row">
		<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
			<div class="page-header">
				<h3 class="mb-2">Dashboard </h3>
				
			</div>
		</div>
	</div>
	
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
	
	<!-- ============================================================== -->
	<!-- end pageheader  -->
	<!-- ============================================================== -->
	<!-- ============================================================== -->
	<!-- content  -->
	<!-- ============================================================== -->
	
	<!-- ============================================================== -->
	<!-- widgets   -->
	<!-- ============================================================== -->
	<div class="row">
		<!-- ============================================================== -->
		<!-- four widgets   -->
		<!-- ============================================================== -->
		<!-- ============================================================== -->
		<!-- total views   -->
		<!-- ============================================================== -->
		<div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
			<div class="card">
				<div class="card-body">
					<div class="d-inline-block">
						<h5 class="text-muted">Total Inspections</h5>
						<h2 class="mb-0"> <?php echo $total_inspections?></h2>
					</div>
					<div class="float-right icon-circle-medium  icon-box-lg  bg-info-light mt-1">
						<i class="far fa-comments fa-fw fa-sm text-info"></i>
					</div>
					<div class="mt-2"><a href="<?php echo site_url("inspection")?>" class="btn btn-block btn-outline-brand">View</a></div>
				</div>
			</div>
		</div>
		<!-- ============================================================== -->
		<!-- end total views   -->
		<!-- ============================================================== -->
		<!-- ============================================================== -->
		<!-- total followers   -->
		<!-- ============================================================== -->
		<div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12 d-none">
			<div class="card">
				<div class="card-body">
					<div class="d-inline-block">
						<h5 class="text-muted">Accepted Inspections</h5>
						<h2 class="mb-0"> <?php echo $total_accepted?></h2>
					</div>
					<div class="float-right icon-circle-medium  icon-box-lg  bg-success-light mt-1">
						<i class="fas fa-check fa-fw fa-sm text-primary"></i>
					</div>
				</div>
			</div>
		</div>
		<!-- ============================================================== -->
		<!-- end total followers   -->
		<!-- ============================================================== -->
		<!-- ============================================================== -->
		<!-- partnerships   -->
		<!-- ============================================================== -->
		<div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12 d-none">
			<div class="card">
				<div class="card-body">
					<div class="d-inline-block">
						<h5 class="text-muted">Rejected Inspections</h5>
						<h2 class="mb-0"><?php echo $total_rejected?></h2>
					</div>
					<div class="float-right icon-circle-medium  icon-box-lg  bg-secondary-light mt-1">
						<i class="fas fa-times fa-fw fa-sm text-secondary"></i>
					</div>
				</div>
			</div>
		</div>
		<!-- ============================================================== -->
		<!-- end partnerships   -->
		<!-- ============================================================== -->
		<!-- ============================================================== -->
		<!-- total earned   -->
		<!-- ============================================================== -->
		<div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12 d-none">
			<div class="card">
				<div class="card-body">
					<div class="d-inline-block">
						<h5 class="text-muted">Counter Inspections</h5>
						<h2 class="mb-0"> <?php echo $total_reprice?></h2>
					</div>
					<div class="float-right icon-circle-medium  icon-box-lg  bg-brand-light mt-1">
						<i class="fas fa-reply fa-fw fa-sm text-brand"></i>
					</div>
				</div>
			</div>
		</div>
		<!-- ============================================================== -->
		<!-- end total earned   -->
		<!-- ============================================================== -->
	</div>
	<!-- ============================================================== -->
	<!-- end widgets   -->
	<!-- ============================================================== -->
	<!-- ============================================================== -->
	<!-- end content  -->
	<!-- ============================================================== -->
</div>