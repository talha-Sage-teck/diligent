<div class="container-fluid  dashboard-content">
	<!-- ============================================================== -->
	<!-- pageheader -->
	<!-- ============================================================== -->
	<div class="row">
		<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
			<div class="page-header">
				<h2 class="pageheader-title">Quotation List</h2>
				<div class="page-breadcrumb">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="<?php echo site_url('/')?>" class="breadcrumb-link">Dashboard</a></li>
							<li class="breadcrumb-item active" aria-current="page">List Quotations</li>
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
		<div class="col mb-2">
			<form class="form-inline">
				<label class="sr-only" for="selectfilter">Choose Filter</label>
				<div class="form-group mt-2">
					<select id="selectfilter" class="form-control mr-sm-2" name="filter">
						<option value="">Select filter</option>
						<option value="accepted" <?php echo ($filter == "accepted") ? "selected" : "" ?>>Accepted</option>
						<option value="rejected" <?php echo ($filter == "rejected") ? "selected" : "" ?>>Rejected</option>
						<option value="reprice" <?php echo ($filter == "reprice") ? "selected" : "" ?>>Counter Offers</option>
						<option value="new" <?php echo ($filter == "new") ? "selected" : "" ?>>New</option>
						
					</select>
					
					
				</div>
				<button type="submit" class="btn btn-primary mt-2">Submit</button>
			</form>
		</div>
	</div>
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
									<th>Price</th>
									<th>Date</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$start = 1;
								foreach ( $quotation_data as $quotation ) {

									switch ( $quotation->status ) {
										case 'new':
											$statuscolor = "badge-primary";
											break;
										case 'accepted':
											$statuscolor = "badge-success";
											break;
										case 'rejected':
											$statuscolor = "badge-danger";
											break;
										case 'reprice':
											$statuscolor = "badge-warning";
											break;

									}
									?>
								<tr>
									<td>
										<?php echo $start?>
									</td>
									<td>
										<?php echo $quotation->clientname ?>
									</td>
									<td>
										Project: <?php echo $quotation->project ?>
										Location: <?php echo $quotation->location ?>
									</td>
									<td>
										<?php $services = $this->quotation_services_model->getByQuoteId($quotation->quotation_id);
										$subtotal = 0;
												foreach($services as $service){
													$subtotal = $subtotal + $service->price;
												}
									echo show_price($subtotal);
										?>
									</td>
									<td>
										<?php echo $quotation->created_at ?>
									</td>
									<td style="text-transform: capitalize">
										<div class="badge <?php echo $statuscolor?>">
											<?php echo $quotation->status ?>
										</div>
										<?php if($quotation->status == "reprice"){
										$rs = $this->quotation_status_model->get_all(["quotation_id" => $quotation->quotation_id, "status" => "reprice"], false);
										echo show_price($rs->counter_price);
										?>
										<?php }?>
									</td>
									<td>
										<?php if($quotation->status == "accepted" ) {?>									
										
										<div class="dropdown ml-auto">
											<a class="toolbar" href="#" role="button" id="dropdownMenuLink5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-cogs"></i>  </a>
											<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink5">
												<?php if($quotation->invoice_id){
												echo anchor(site_url("invoice/view/".$quotation->invoice_id),'<i class="fas fa-eye"></i> View Invoice', array('class' => 'dropdown-item'));
												echo anchor(site_url("quotation/view/".$quotation->quotation_id),'<i class="fas fa-eye"></i> View Quotation', array('class' => 'dropdown-item'));
												echo anchor(site_url("clientquotation/viewquotation/".$quotation->quotation_id),'<i class="fas fa-file-pdf"></i> Download PDF', array('class' => 'dropdown-item', 'target' => '_blank'));
												
										}else{
												echo anchor(site_url("invoice/addinvoice/".$quotation->quotation_id),'<i class="fas fa-file-pdf"></i> Generate Invoice', array('class' => 'dropdown-item'));
										
										}?>
											</div>
										</div>
										
										<?php }else{?>
										<div class="dropdown ml-auto">
											<a class="toolbar" href="#" role="button" id="dropdownMenuLink5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-cogs"></i>  </a>
											<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink5">
												<?php echo anchor(site_url('quotation/update/'.$quotation->quotation_id),'<i class="fas fa-edit"></i> Update', array('class' => 'dropdown-item'));?>
												<?php echo anchor(site_url('quotation/view/'.$quotation->quotation_id),'<i class="fas fa-eye"></i> View Details', array('class' => 'dropdown-item'));?>
												<?php if ( $this->ion_auth->in_group( 'admin' ) ) {?>
												<?php echo anchor(site_url('quotation/delete/'.$quotation->quotation_id),'<i class="fas fa-trash-alt"></i> Delete', array('onclick' => "javasciprt: return confirm('Are You Sure ?')", 'class' => 'dropdown-item')); ?>
												<?php }?>
											</div>
										</div>
										<?php }?>
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