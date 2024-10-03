<div class="container-fluid dashboard-content">
	<div class="row">
		<div class="col-xl-10">
			<!-- ============================================================== -->
			<!-- pageheader  -->
			<!-- ============================================================== -->
			<div class="row">
				<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
					<div class="page-header" id="top">
						<h2 class="pageheader-title">Upload Images </h2>
						<div class="page-breadcrumb">
							<nav aria-label="breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="<?php echo site_url()?>" class="breadcrumb-link">Dashboard</a>
									</li>
									<li class="breadcrumb-item active" aria-current="page">Upload images</li>
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
							<h2>Upload Before work images:</h2>
							
							<div class="row">
								<div class="col-sm-6"><input id="beforeworkajaxurl" type="hidden" value="<?php echo site_url('work/upload_work_image')?>" name="beforeworkurl">
							<input id="reportId" type="hidden" value="<?php echo $reportid?>" name="beforeworkurl">							
							
							<div id="beforeWorkUploader">Upload</div></div>
								<div class="col-sm-6"><?php foreach($gallery_before as $image){?>
	<img src="<?php echo base_url('uploads/thumbs/'.$image->image) ?>" width="100">
	<?php }?></div>
							</div>
							

						</div>
					</div>
				</div>
			</div>
				
			<div class="row">
				<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
					<div class="card">
						<div class="card-body">
							<h2>Upload During work images:</h2>							
							<div class="row">
								<div class="col-sm-6">		
							<div id="duringWorkUploader">Upload</div>
</div>
								<div class="col-sm-6"><?php foreach($gallery_during as $image){?>
	<img src="<?php echo base_url('uploads/thumbs/'.$image->image) ?>" width="100">
	<?php }?></div>
							</div>
						</div>
					</div>
				</div>
			</div>
				
			<div class="row">
				<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
					<div class="card">
						<div class="card-body">
							<h2>Upload After work images:</h2>							
							<div class="row">
								<div class="col-sm-6">	
							<div id="afterWorkUploader">Upload</div>
</div>
								<div class="col-sm-6"><?php foreach($gallery_after as $image){?>
	<img src="<?php echo base_url('uploads/thumbs/'.$image->image) ?>" width="100">
	<?php }?></div>
						</div>
					</div>
				</div>
			</div>
		</div>	
			<div class="row">
				<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
					<div class="card">
						<div class="card-body">
							<h2>Broken Glasses images:</h2>							
							<div class="row">
								<div class="col-sm-6">	
							<div id="brokenWorkUploader">Upload</div>
</div>
								<div class="col-sm-6"><?php foreach($gallery_broken as $image){?>
	<img src="<?php echo base_url('uploads/thumbs/'.$image->image) ?>" width="100">
	<?php }?></div>
						</div>
					</div>
				</div>
			</div>
		</div>	
			<div class="row">
				<div class="col">
					<a href="<?php echo site_url("work/reportpdf/".$reportid)?>" class="btn btn-lg btn-primary">Generate & Download PDF</a>
				</div>
			</div>
	</div>
</div>