<div class="container-fluid dashboard-content">
	<div class="row">
		<div class="col-xl-10">
			<!-- ============================================================== -->
			<!-- pageheader  -->
			<!-- ============================================================== -->
			<div class="row">
				<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
					<div class="page-header" id="top">
						<h2 class="pageheader-title">Add Quotation </h2>
						<div class="page-breadcrumb">
							<nav aria-label="breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="<?php echo site_url()?>" class="breadcrumb-link">Dashboard</a>
									</li>
									<li class="breadcrumb-item active" aria-current="page">Add Quotation</li>
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
						<p class="lead">Here you can add new Quotation. You can share it later from list.</p>

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
								<label for="qvalidity" class="col-form-label">Quotation Validity</label>
								<select class="form-control form-control-sm" name="validity_days">
									<option value="15 Days">15 Days</option>
									<option value="30 Days">30 Days</option>
									<option value="45 Days">45 Days</option>
									<option value="60 Days">60 Days</option>
									<option value="90 Days">90 Days</option>
								</select>
							</div>
							<div class="form-group">
								<label for="clientname" class="col-form-label">Client Name</label>
								<input id="clientname" name="clientname" type="text" value="<?php echo $clientname; ?>" class="form-control">
							</div>
							<div class="form-group">
								<label for="attention" class="col-form-label">Attention</label>
								<input id="attention" name="attention" type="text" class="form-control" value="<?php echo $attention; ?>">
							</div>
							<div class="form-group">
								<label for="project" class="col-form-label">Project</label>
								<input id="project" name="project" type="text" class="form-control" value="<?php echo $project; ?>">
							</div>
							<div class="form-group">
								<label for="location" class="col-form-label">Location</label>
								<input id="location" name="location" type="text" class="form-control" value="<?php echo $location; ?>">
							</div>
							<div class="services_block">
								<?php if(!empty($services)){
	$i = 1;
								foreach($services as $service){
								?>
								<div class="card">
									<h5 class="card-header">
														Service <?php echo $i?>
													</h5>
								
									<div class="card-body border-top">
										<div class="form-group">
											<textarea class="form-control form-control-sm" name="services[]" rows="1"><?php echo $service->title?></textarea>
										</div>
										<div class="form-group">
											<label for="sfrequency" class="col-form-label">Frequency</label>
											<input id="sfrequency" name="sfrequency[]" type="number" class="form-control" value="<?php echo $service->frequency?>">
										</div>
										<div class="form-group">
											<label for="sprice" class="col-form-label">Price</label>
											<input id="sprice" name="sprice[]" type="number" class="form-control" value="<?php echo $service->price?>">
										</div>
									</div>
								</div>
<?php $i++;
								}
}?>
							</div>
							<div class="form-group">
								<button type="button" class="btn btn-warning" id="addservicesblock" data-ajax_url="<?php echo site_url("quotation/ajax_service_block")?>" data-counter="<?php echo count($services)?>"><i class="fa fa-fw fa-plus text-success"></i> Add More Services</button>
							</div>


							<div class="form-group">
								<label for="mobduration" class="col-form-label">Mobilization Time</label>
								<select class="form-control form-control-sm" name="mobduration">
									<option value="1">1 week</option>
									<option value="2">2 weeks</option>
									<option value="3">3 weeks</option>
									<option value="4">4 weeks</option>
								</select>
							</div>
							<div class="form-group">
								<label for="workduration" class="col-form-label">Duration of Work (in Days)</label>
								<input id="workduration" name="workduration" type="number" class="form-control" value="<?php echo $workduration?>">
							</div>
							<div class="form-group">
								<label for="workduration" class="col-form-label">Extra Content</label>
								<textarea class="form-control" id="summernote" name="quotation_text" rows="6" placeholder="Write Descriptions"><?php echo $quotation_text?></textarea>
							</div>
							<div class="form-group">
								<input type="hidden" name="id" value="<?php echo $id?>">
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