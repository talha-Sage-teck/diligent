<div class="container-fluid dashboard-content ">
	<!-- ============================================================== -->
	<!-- pageheader  -->
	<!-- ============================================================== -->
	<div class="row">
		<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
			<div class="page-header">
				<h2 class="pageheader-title">View <?php echo $page_title?> </h2>
				<div class="page-breadcrumb">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="<?php echo site_url('/')?>" class="breadcrumb-link">Dashboard</a>
							</li>
							<li class="breadcrumb-item">
								<?php echo anchor($pslug,$page_title) ?>
							</li>
							<li class="breadcrumb-item active" aria-current="page">View
								<?php echo $page_title?>
							</li>
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
				<div class="card-header p-4">Client Name:

					<div class="float-right">
						<h3 class="mb-0">
							<?php echo $clientname?>
						</h3>
						Date:
						<?php echo $created_at?>
					</div>
				</div>
				<div class="card-body">
					<table class="table table-striped table-clear">
						<tbody>
							<tr>
								<td>clientname</td>
								<td>
									<?php echo $clientname; ?>
								</td>
							</tr>
							<tr>
								<td>project</td>
								<td>
									<?php echo $project; ?>
								</td>
							</tr>
							<tr>
								<td>location</td>
								<td>
									<?php echo $location; ?>
								</td>
							</tr>
							<tr>
								<td>prepared_by</td>
								<td>
									<?php echo $prepared_by; ?>
								</td>
							</tr>
							<tr>
								<td>service_details</td>
								<td>
									<?php echo $service_details; ?>
								</td>
							</tr>
							<tr>
								<td>notes</td>
								<td>
									<?php echo $notes; ?>
								</td>
							</tr>
						</tbody>
					</table>

				</div>
				<div class="card-footer bg-white">
					<a href="<?php echo site_url('maintenanceinspections') ?>" class="btn btn-warning">Cancel</a>
				</div>
			</div>
		</div>
	</div>
</div>