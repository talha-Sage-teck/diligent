<div class="container-fluid dashboard-content">
	<div class="row">
		<div class="col-xl-10">
			<!-- ============================================================== -->
			<!-- pageheader  -->
			<!-- ============================================================== -->
			<div class="row">
				<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
					<div class="page-header" id="top">
						<h2 class="pageheader-title">Add <?php echo $page_title?> </h2>
						<div class="page-breadcrumb">
							<nav aria-label="breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="<?php echo site_url()?>" class="breadcrumb-link">Dashboard</a>
									</li>
									<li class="breadcrumb-item">
										<?php echo anchor($pslug,$page_title) ?>
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
			<!-- basic form  -->
			<!-- ============================================================== -->

			<div class="row">
				<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
					<?php $attributes = array("class" => "form-horizontal",
		  						"role" => "form",
								"enctype" => "multipart/form-data");
								  echo form_open($frm_action, $attributes) ?>
					<div class="card">
						<div class="card-body">

							<div class="form-group">
								<label for="clientname" class=" form-label">Clientname </label>
								<div class="">
									<input type="text" class="form-control" name="clientname" id="clientname" placeholder="clientname" value="<?php echo $clientname; ?>"/>
									<div class="help-block">
										<?php echo form_error('clientname') ?>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="project" class="form-label">Project </label>
								<div class="">
									<input type="text" class="form-control" name="project" id="project" placeholder="project" value="<?php echo $project; ?>"/>
									<div class="help-block">
										<?php echo form_error('project') ?>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="location" class="form-label">Location </label>
								<div class="">
									<input type="text" class="form-control" name="location" id="location" placeholder="location" value="<?php echo $location; ?>"/>
									<div class="help-block">
										<?php echo form_error('location') ?>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="service_details" class="form-label">Service details </label>
								<div class="">
									<input type="text" class="form-control" name="service_details" id="service_details" placeholder="service details" value="<?php echo $service_details; ?>"/>
									<div class="help-block">
										<?php echo form_error('service_details') ?>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="workduration" class="col-form-label">Notes</label>
								<textarea class="form-control" id="notes" name="notes" rows="6" placeholder="notes"><?php echo $notes ?></textarea>
								<div class="help-block">
									<?php echo form_error("$notes") ?>
								</div>
							</div>
						</div>
						<!-- /.card-body -->
						<div class="card-footer d-flex text-muted">
							<input type="hidden" name="id" value="<?php echo $id; ?>"/>
							<button type="submit" class="btn btn-primary">
								<?php echo $button ?>
							</button>
							<a href="<?php echo site_url('maintenanceinspections') ?>" class="btn btn-default">Cancel</a>
						</div>
						<!-- /.box-footer -->
					</div>
					<!-- /.card -->
					</form>
				</div>
			</div>

		</div>
	</div>
</div>