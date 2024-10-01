<div class="container-fluid dashboard-content">
	<div class="row">
		<div class="col-xl-10">
			<!-- ============================================================== -->
			<!-- pageheader  -->
			<!-- ============================================================== -->
			<div class="row">
				<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
					<div class="page-header" id="top">
						<h2 class="pageheader-title">Add Inspection </h2>
						<div class="page-breadcrumb">
							<nav aria-label="breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="<?php echo site_url()?>" class="breadcrumb-link">Dashboard</a>
									</li>
									<li class="breadcrumb-item active" aria-current="page">Add Inspection</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
			</div>
			<!-- ============================================================== -->
			<!-- end pageheader  -->
			<!-- ============================================================== -->
			<div class="page-section" id="overview">
				<!-- ============================================================== -->
				<!-- overview  -->
				<!-- ============================================================== -->
				<div class="row">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
						<h2>Details</h2>

					</div>
				</div>
				<!-- ============================================================== -->
				<!-- end overview  -->
				<!-- ============================================================== -->
			</div>
			<!-- ============================================================== -->
			<!-- basic form  -->
			<!-- ============================================================== -->
			<div class="row">
				<div class="col-md-12 text-center">
					<?php if(validation_errors() != ''){?>
					<div class="alert alert-danger alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						<?php echo validation_errors(); ?>
					</div>
					<?php }?>
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
			<div class="row">
				<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
					<div class="card">
						<div class="card-body">
							<?php $attributes = array('class' => 'form-horizontal',
		  						'role' => 'form',
								'enctype' => 'multipart/form-data');
		  echo form_open($frm_action, $attributes) ?>
							<div class="form-group">
								<label for="project" class="col-form-label">Building</label>
								<input id="project" name="project" type="text" class="form-control" value="<?php echo $project?>">
							</div>
							<div class="form-group">
								<label for="location" class="col-form-label">Location</label>
								<input id="location" name="location" type="text" class="form-control" value="<?php echo $project?>">
							</div>

							<div class="form-group">
								<label for="clientname" class="col-form-label">Client Name</label>
								<input id="clientname" name="clientname" type="text" class="form-control" value="<?php echo $clientname?>">
							</div>

							<div class="card bg-light mb-3">
								<div class="card-header">Cleaning Drops</div>
								<div class="card-body">
									<div class="form-group">
										<label for="cleaningdrops" class="col-form-label">Cleaning Drops</label>
										<input id="cleaningdrops" name="cleaning_drops" type="text" class="form-control" value="<?php echo $cleaning_drops?>">
									</div>
									<div class="form-group">
										<label for="cleaningTargetDrops" class="col-form-label">Cleaning Target Drops</label>
										<input id="cleaningTargetDrops" name="cleaning_target_drops" type="text" class="form-control" value="<?php echo $cleaning_target_drops?>">
									</div>
									<div class="form-group">
										<label for="TotalcleaningDrops" class="col-form-label">Total Cleaning Drops</label>
										<input id="TotalcleaningDrops" name="cleaning_total_drops" type="text" class="form-control" value="<?php echo (int)$cleaning_drops + (int)$cleaning_target_drops ?>">
										<p class="help-block">Workers required to complete</p>
									</div>
								</div>
							</div>
							<div class="dropdown-divider"></div>
							<div class="card bg-light mb-3">
								<div class="card-header">Washing Drops</div>
								<div class="card-body">
									<div class="form-group">
										<label for="washingdrops" class="col-form-label">Washing Drops</label>
										<input id="washingdrops" name="washing_drops" type="text" class="form-control" value="<?php echo $washing_drops?>">
									</div>
									<div class="form-group">
										<label for="washingTargetDrops" class="col-form-label">Washing Target Drops</label>
										<input id="washingTargetDrops" name="washing_target_drops" type="text" class="form-control" value="<?php echo $cleaning_drops?>">
									</div>
									<div class="form-group">
										<label for="TotalWashingDrops" class="col-form-label">Total Washing Drops</label>
										<input id="TotalWashingDrops" name="washing_total_drops" type="text" class="form-control" value="<?php echo $washing_drops?>">
										<p class="help-block">Workers required to complete</p>
									</div>
								</div>
							</div>
							<div class="form-group">
										<label for="TotalWashingDrops" class="col-form-label">Inspector Comments</label>
								<textarea class="form-control" name="comments" placeholder="Your addiotion notes and suggestions"></textarea>
									</div>
							<div class="form-group">
								<button class="btn btn-primary btn-block">Submit</button>
							</div>

							</form>
						</div>
					</div>
				</div>
			</div>



		</div>
	</div>
</div>