<div class="container-fluid dashboard-content">
	<div class="row">
		<div class="col-xl-10">
			<!-- ============================================================== -->
			<!-- pageheader  -->
			<!-- ============================================================== -->
			<div class="row">
				<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
					<div class="page-header" id="top">
						<h2 class="pageheader-title"><?php echo $action?> Certificate </h2>
						<div class="page-breadcrumb">
							<nav aria-label="breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="<?php echo site_url()?>" class="breadcrumb-link">Dashboard</a>
									</li>
									<li class="breadcrumb-item active" aria-current="page"><?php echo $action?> Certificate</li>
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
				<div class="row d-none">
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
								<label for="compiled_by" class="col-form-label">Compiled By</label>
								<input id="compiled_by" name="compiled_by" type="text" class="form-control" value="<?=$compiled_by?>">
							</div>
							<div class="form-group">
								<label for="job_ref" class="col-form-label">Job Reference</label>
								<input id="job_ref" name="job_ref" type="text" class="form-control" value="<?=$job_ref?>">
							</div>
							<div class="form-group">
								<label for="job_number" class="col-form-label">Job Number</label>
								<input id="job_number" name="job_number" type="text" class="form-control" value="<?=$job_number?>">
							</div>
							<div class="form-group">
								<label for="clientname" class="col-form-label">Client Name</label>
								<input id="clientname" name="clientname" type="text" class="form-control" value="<?=$clientname?>">
							</div>
							<div class="form-group">
								<label for="project" class="col-form-label">Project</label>
								<input id="project" name="project" type="text" class="form-control" value="<?=$project?>">
							</div>
							<div class="form-group">
								<label for="location" class="col-form-label">Location</label>
								<input id="location" name="location" type="text" class="form-control" value="<?=$location?>">
							</div>
							<div class="form-group">
								<label for="description" class="col-form-label">Descriptions</label>
								<textarea id="description" class="form-control" name="description" rows="6" placeholder="Write "><?=$description?></textarea>
							</div>
							<div class="form-group">
								<label for="comments" class="col-form-label">Comments</label>
								<textarea id="comments" class="form-control" name="comments" rows="6" placeholder="Comments "><?=$comments?></textarea>
							</div>
							<div class="form-group">
								<input type="hidden" name="id" value="<?php echo $id; ?>" /> 
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