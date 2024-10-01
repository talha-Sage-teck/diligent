<div class="container-fluid dashboard-content">
	<div class="row">
		<div class="col-xl-10">
			<!-- ============================================================== -->
			<!-- pageheader  -->
			<!-- ============================================================== -->
			<div class="row">
				<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
					<div class="page-header" id="top">
						<h2 class="pageheader-title">Expense </h2>
						<div class="page-breadcrumb">
							<nav aria-label="breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="<?php echo site_url()?>" class="breadcrumb-link">Dashboard</a>
									</li>
									<li class="breadcrumb-item active" aria-current="page">Expense view</li>
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
							<h2>Expenses Details:</h2>

							<table class="table">
								<tr>
									<td>title</td>
									<td>
										<?php echo $title; ?>
									</td>
								</tr>
								<tr>
									<td>description</td>
									<td>
										<?php echo $description; ?>
									</td>
								</tr>
								<tr>
									<td colspan="2">
										<img src="<?php echo base_url("uploads/expenses/$image")?>" alt="expense image" class="img-fluid " />
									</td>
								</tr>
								<tr>
									<td>created_at</td>
									<td>
										<?php echo $created_at; ?>
									</td>
								</tr>
								<tr>
									<td>price</td>
									<td>
										<?php echo $price; ?>
									</td>
								</tr>
								<tr>
									<td>updated_at</td>
									<td>
										<?php echo $updated_at; ?>
									</td>
								</tr>
								<tr>
									<td></td>
									<td><a href="<?php echo site_url('expenses') ?>" class="btn btn-default">Cancel</button></td></tr>
	</table>

						</div>
					</div>
				</div>
			</div>
			
		</div>
	</div>
</div>