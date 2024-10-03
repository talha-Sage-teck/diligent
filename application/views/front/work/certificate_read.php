<div class="container-fluid dashboard-content ">
	<!-- ============================================================== -->
	<!-- pageheader  -->
	<!-- ============================================================== -->
	<div class="row">
		<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
			<div class="page-header">
				<h2 class="pageheader-title">View Work Certificate </h2>
				<div class="page-breadcrumb">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="<?php echo site_url('/')?>" class="breadcrumb-link">Dashboard</a>
							</li>
							<li class="breadcrumb-item"><a href="<?php echo site_url('work/certificate_list')?>" class="breadcrumb-link">Work Certificate</a>
							</li>
							<li class="breadcrumb-item active" aria-current="page">View Work Certificate</li>
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
					<h3 class="text-center">Certificate of Completion</h3>
				</div>
				<div class="card-body">
					<div class="row mb-4">
						<div class="col-sm-6">
							<div>Doc Number:
								<?php echo $id?>
							</div>
							<div>Compiled By:
								<?php echo $compiled_by ?>
							</div>
						</div>
						<div class="col-sm-6">
							<div>Date:
								<?php echo $created_at?>
							</div>
							<div>Job Ref:
								<?php echo $job_ref?>
							</div>
						</div>
					</div>
					<div class="table-responsive-sm">
						<table class="table table-bordered">
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
									<td><strong>Comments:</strong>
										<?php echo $comments?>
									</td>
								</tr>
								<tr>
									<td>
										<table width="100%" class="table">
											<tbody>
												<tr>
													<td>COMPLETED BY:</td>
													<td>SIGNED</td>
													<td>DATE</td>
												</tr>
											</tbody>
										</table>
										<br>
										<br>
										<br>
										<br>

									</td>
								</tr>
								<tr>
									<td><br>

										<?php echo $default_certificate_text?>
									</td>
								</tr>
								<tr>
									<td>
										<table width="100%" class="table">
											<tbody>
												<tr>
													<td>COMPLETED BY:</td>
													<td>SIGNED</td>
													<td>DATE</td>
												</tr>
											</tbody>
										</table><br>
										<br>
										<br>
										<br>

									</td>
								</tr>
							</tbody>
						</table>
					</div>

				</div>
			</div>

			<a href="<?php echo site_url("work/pdfcertificate/".$id)?>" class="btn btn-primary btn-lg btn-block" type="submit">Download PDF</a>

		</div>
	</div>
</div>