<div class="container-fluid dashboard-content ">
	<!-- ============================================================== -->
	<!-- pageheader  -->
	<!-- ============================================================== -->
	<div class="row">
		<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
			<div class="page-header">
				<h2 class="pageheader-title">View Work Report </h2>
				<div class="page-breadcrumb">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="<?php echo site_url('/')?>" class="breadcrumb-link">Dashboard</a>
							</li>
							<li class="breadcrumb-item"><a href="<?php echo site_url('work/report_list')?>" class="breadcrumb-link">Work report list</a>
							</li>
							<li class="breadcrumb-item active" aria-current="page">View Work Report</li>
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
		<div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12">
			<div class="card">
				<div class="card-header p-4">
					<h3 class="text-center">Work Completion Report</h3>
				</div>
				<div class="card-body">
					<div class="table-responsive-sm">
						<table width="100%">
							<tbody>
								<tr>
									<td>
										<table width="100%" border="0" cellpadding="0">
											<tr>
												<td width="55%">
													<table width="100%" border="0" cellpadding="5" cellspacing="0">
														<tr>
															<th><strong>Doc Number:</strong>
															</th>
															<td>
																<?php echo $id?>
															</td>
														</tr>
														<tr>
															<th><strong>Completed By:</strong>
															</th>
															<td>
																<?php echo $completed_by ?>
															</td>
														</tr>
													</table>
												</td>
												<td>
													<table width="100%" border="0" cellpadding="5" cellspacing="0">
														<tbody>
															<tr>
																<th align="right"><strong>Date:</strong>
																</th>
																<td>
																	<?php echo date(DATE_SHORT_DASH, strtotime($created_at));?>
																</td>
															</tr>
															<tr>
																<th align="right"><strong>Job Ref:</strong>
																</th>
																<td>
																	<?php echo $job_ref?>
																</td>
															</tr>
														</tbody>
													</table>

												</td>
											</tr>
										</table>
									</td>
								</tr>
								<tr>
									<td>
										<div style="height:100px"></div>
										<table class="table table-bordered" border="1" cellpadding="5">
											<tbody>
												<tr>
													<td><strong>Job Number:</strong>
														<?php echo $job_number?>
													</td>
												</tr>
												<tr>
													<td><strong>Client Name:</strong>
														<?php echo $clientname?>
													</td>
												</tr>
												<tr>
													<td><strong>Project Name:</strong>
														<?php echo $project?>
													</td>
												</tr>
												<tr>
													<td><strong>Location:</strong>
														<?php echo $location?>
													</td>
												</tr>
												<tr>
													<td><strong>Work Description:</strong><br>

														<?php echo $description?>
													</td>
												</tr>
												<tr>
													<td><strong>Comments:</strong><br>
														<?php echo $comments?>
													</td>
												</tr>
												<tr>
													<td>
														<table width="100%" class="table" border="1" cellpadding="2">
															<tbody>
																<tr>
																	<td>COMPLETED BY:</td>
																	<td>SIGNED:</td>
																	<td>DATE:</td>
																</tr>
															</tbody>
														</table>
														<br>
														<br>
														<br>
														<br><br>
														<br>


													</td>
												</tr>
												<tr>
													<td>

														<?php echo $default_certificate_text?>


													</td>
												</tr>
												<tr>
													<td>
														<table width="100%" class="table" border="1" cellpadding="2">
															<tbody>
																<tr>
																	<td>COMPLETED BY:</td>
																	<td>SIGNED:</td>
																	<td>DATE:</td>
																</tr>
															</tbody>
														</table><br>
														<br>
														<br>
														<br><br>
														<br>


													</td>
												</tr>
											</tbody>
										</table>
										<div style="height:100px"></div>
									</td>
								</tr>

							</tbody>
						</table>
					</div>

				</div>
			</div>

			<div class="card">
				<div class="card-header p-4">
					<h3 class="text-center">Before Work Images</h3>
				</div>
				<div class="card-body">

					<div class="row">
						<?php foreach($gallery_before as $image){?>
						<div class="col-sm-3"><img src="<?php echo base_url('uploads/thumbs/'.$image->image) ?>" class="img-thumbnail mr-3">
						</div>
						<?php }?>
					</div>

				</div>
			</div>
			<div class="card">
				<div class="card-header p-4">
					<h3 class="text-center">During Work Images</h3>
				</div>
				<div class="card-body">

					<div class="row">
						<?php foreach($gallery_during as $image){?>
						<div class="col-sm-3"><img src="<?php echo base_url('uploads/thumbs/'.$image->image) ?>" class="img-thumbnail mr-3">
						</div>
						<?php }?>
					</div>

				</div>
			</div>
			<div class="card">
				<div class="card-header p-4">
					<h3 class="text-center">After Work Images</h3>
				</div>
				<div class="card-body">

					<div class="row">
						<?php foreach($gallery_after as $image){?>
						<div class="col-sm-3"><img src="<?php echo base_url('uploads/thumbs/'.$image->image) ?>" class="img-thumbnail mr-3">
						</div>
						<?php }?>
					</div>

				</div>
			</div>
			<div class="card">
				<div class="card-header p-4">
					<h3 class="text-center">Broken window Images</h3>
				</div>
				<div class="card-body">
					<div class="row">
						<?php foreach($gallery_broken as $image){?>
						<div class="col-sm-3"><img src="<?php echo base_url('uploads/thumbs/'.$image->image) ?>" class="img-thumbnail mr-3">
						</div>
						<?php }?>
					</div>
				</div>
			</div>


			<a href="<?php echo site_url("work/reportpdf/".$id)?>" class="btn btn-primary btn-lg btn-block" type="submit">Download PDF</a>

		</div>
	</div>
</div>