<div class="container-fluid dashboard-content ">
                    <!-- ============================================================== -->
                    <!-- pageheader  -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <h2 class="pageheader-title">View Inspection </h2>
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
											<li class="breadcrumb-item"><a href="<?php echo site_url('/')?>" class="breadcrumb-link">Dashboard</a></li>
											<li class="breadcrumb-item"><a href="<?php echo site_url('inspection')?>" class="breadcrumb-link">Inspections</a></li>
											<li class="breadcrumb-item active" aria-current="page">View Inspection</li>
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
                                   
                                    <div class="float-right"> <h3 class="mb-0"> <?php echo $info->clientname?></h3>
                                    Date: <?php echo $info->created_at?><br>
<strong>Total workers required:</strong> <?php echo $info->total_target_workers?>
									</div>
                                </div>
                                <div class="card-body">
                                    <table class="table table-clear">
                                                <tbody>
                                                    <tr>
														<td>Attention:</td>
														<td><?php echo $info->attention ?></td>
													</tr>
                                                    <tr>
														<td>Project:</td>
														<td><?php echo $info->project ?></td>
													</tr>
                                                    <tr>
														<td>Location:</td>
														<td><?php echo $info->location ?></td>
													</tr>
                                                    <tr>
														<td>Cleaning Drops:</td>
														<td><?php echo $info->cleaning_drops ?></td>
													</tr>
                                                    <tr>
														<td>Cleaning target drops:</td>
														<td><?php echo $info->cleaning_target_drops ?></td>
													</tr>
                                                    <tr  class="table-secondary">
														<td><strong>Cleaning Total drops:</strong></td>
														<td><?php echo $info->cleaning_total_drops ?></td>
													</tr>
                                                    <tr>
														<td>Washing Drops:</td>
														<td><?php echo $info->washing_drops ?></td>
													</tr>
                                                    <tr>
														<td>Washing target drops:</td>
														<td><?php echo $info->washing_target_drops ?></td>
													</tr>
                                                    <tr class="table-secondary">
														<td><strong>Washing Total Drops:</strong></td>
														<td><?php echo $info->washing_total_drops ?></td>
													</tr>
													<tr>
														<td colspan="2"><div class="card bg-light">
															<div class="card-body"><?php echo $info->comments ?>
															</div>
															</div></td></tr>
										</tbody>
									</table>
                                    
                                </div>
                                <div class="card-footer bg-white">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                