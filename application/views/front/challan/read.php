<div class="container-fluid dashboard-content ">
                    <!-- ============================================================== -->
                    <!-- pageheader  -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <h2 class="pageheader-title">View Challan </h2>
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
											<li class="breadcrumb-item"><a href="<?php echo site_url('/')?>" class="breadcrumb-link">Dashboard</a></li>
											<li class="breadcrumb-item"><a href="<?php echo site_url('challan')?>" class="breadcrumb-link">Challan</a></li>
											<li class="breadcrumb-item active" aria-current="page">View Challan</li>
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
                                <div class="card-header p-4">Challan
                                   
                                    <div class="float-right"> <h3 class="mb-0">Challan #<?php echo $id?></h3>
                                    Date: <?php echo $created_at?></div>
                                </div>
                                <div class="card-body">
                                    <div class="row mb-4">
                                        <div class="col-sm-6">
                                            <table width="100%" border="0" cellpadding="1">
											<tbody>
														<tr>
															<td>DILIGENT ENERGY</td>
														</tr>
														<tr>
															<td>House # 595, Block J</td>
														</tr>
														<tr>
															<td>Johar Town</td>
														</tr>
														<tr>
															<td>Lahore - Pakistan.</td>
														</tr>
														<tr>
															<td>P.O.BOX: 54782</td>
														</tr>
														<tr>
															<td>Email Address: info@diligentgroups.com</td>
														</tr>
													</tbody>
												</table>
                                        </div>
                                        <div class="col-sm-6">
                                            <table width="100%" border="0" cellpadding="1">
													<tbody>
														<tr>
															<td>CHALLAN NO.:</td>
															<td>CHA/BAC/1</td>
														</tr>
														<tr>
															<td>DATE:</td>
															<td>
																<?php echo date(DATE_SHORT_DASH, strtotime($created_at))?>
															</td>
														</tr>
														<tr>
															<td>CHALLAN FOR:</td>
															<td>
																<?php echo $month."-".$year?>
															</td>
														</tr>
														<tr>
															<td>Ref. Number:</td>
															<td>
																<?php echo $ref_number?>
															</td>
														</tr>
													</tbody>
												</table>
                                        </div>
                                    </div>
                                    <div class="table-responsive-sm">
                                        <table class="table" width="100%" border="0" cellpadding="0">

					<tr>
						<td>
							<?php echo $clientname?>
						</td>
					</tr>
					<tr>
						<td scope="row">For:-
							<?php echo $for_building?>
						</td>
					</tr>
					<tr>
						<td>Office:-
							<?php echo $office?>
						</td>
					</tr>
					<tr>
						<td scope="row">Phone:
							<?php echo $phone?>
						</td>
					</tr>
					<tr>
						<td scope="row">TRN:
							<?php echo $trn_number?>
						</td>
					</tr>
				</table>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 col-sm-12 ml-auto">
                                            <table width="100%" border="1" cellpadding="1">
					<thead>
						<tr>
							<td width="20%"><strong>Sr</strong>
							</td>
							<td width="50%"><strong>DESCRIPTION</strong>
							</td>
							<td width="30%"><strong>QUANTITY</strong>
							</td>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td colspan="6">
								<table width="100%" border="0" cellpadding="1">
									<tbody>
										<?php if($items){
	$i = 1;
										foreach($items as $item){
										?>
										<tr>
											<td width="20%" style="border-right: 1px solid #000000"><?php echo $i?></td>
											<td width="50%" style="border-right: 1px solid #000000"><?php echo $item->title ?></td>
											<td width="30%" style="border-right: 1px solid #000000"><?php echo $item->qty ?></td>
										<?php $i++; 
										}
										}?>
									</tbody>
								</table>

							</td>
						</tr>
					</tbody>
				</table>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer bg-white">
                                    <table width="100%" border="1" cellpadding="1">
				</table>
				
                                </div>
                            </div>
							
							<a href="<?php echo site_url("challan/update/".$id)?>" class="btn btn-primary btn-lg btn-block" type="submit">Edit Challan</a>
							
                        </div>
                    </div>
                </div>

                