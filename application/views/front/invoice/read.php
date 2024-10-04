<div class="container-fluid dashboard-content ">
                    <!-- ============================================================== -->
                    <!-- pageheader  -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <h2 class="pageheader-title">View Invoice </h2>
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
											<li class="breadcrumb-item"><a href="<?php echo site_url('/')?>" class="breadcrumb-link">Dashboard</a></li>
											<li class="breadcrumb-item"><a href="<?php echo site_url('Invoice')?>" class="breadcrumb-link">Invoice</a></li>
											<li class="breadcrumb-item active" aria-current="page">View Invoice</li>
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
                                <div class="card-header p-4">Invoice
                                   
                                    <div class="float-right"> <h3 class="mb-0">Invoice #<?php echo $id?></h3>
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
															<td>INVOICE NO.:</td>
															<td>INV/BAC/1</td>
														</tr>
														<tr>
															<td>DATE:</td>
															<td>
																<?php echo date(DATE_SHORT_DASH, strtotime($created_at))?>
															</td>
														</tr>
														<tr>
															<td>INVOICE FOR:</td>
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
							<td width="4%"><strong>Sr</strong>
							</td>
							<td width="41%"><strong>DESCRIPTION</strong>
							</td>
							<td width="12%"><strong>AMOUNT</strong>
							</td>
							<td width="13%"><strong>TAX RATE</strong>
							</td>
							<td width="13%"><strong>TAX AMOUNT</strong>
							</td>
							<td width="17%"><strong>TOTAL AMOUNT AED</strong>
							</td>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td colspan="6">
								<table width="100%" border="0" cellpadding="1">
									<tbody>
										<?php if($items){
	$i = 1;$rate_total = $tax_total = 0;
										foreach($items as $item){
										?>
										<tr>
											<td width="4%" style="border-right: 1px solid #000000"><?php echo $i?></td>
											<td width="41%" style="border-right: 1px solid #000000"><?php echo $item->title ?></td>
											<td width="12%" style="border-right: 1px solid #000000"><?php echo $item->rate ?></td>
											<td width="13%" style="border-right: 1px solid #000000"><?php echo VAT_TEXT?></td>
											<td width="13%" style="border-right: 1px solid #000000"><?php echo $item->tax_amount ?></td>
											<td width="17%"><?php echo $item->total_amount ?></td>
										</tr>
										<?php $i++; 
										$rate_total = $rate_total + $item->rate;
										$tax_total = $tax_total + $item->tax_amount;
										}
										}?>
									</tbody>
								</table>

							</td>
						</tr>
						<tr>
							<td colspan="2" bgcolor="#D5D5D5"><strong>SUB TOTAL</strong>
							</td>
							<td bgcolor="#D5D5D5"><?php echo $rate_total?></td>
							<td bgcolor="#D5D5D5">&nbsp;</td>
							<td bgcolor="#D5D5D5"><?php echo $tax_total?></td>
							<td bgcolor="#D5D5D5"><?php echo $grand_total?></td>
						</tr>
						<tr>
							<td colspan="2"><strong>DISCOUT</strong>
							</td>
							<td bgcolor="#D5D5D5">-</td>
							<td bgcolor="#D5D5D5">&nbsp;</td>
							<td bgcolor="#D5D5D5">0</td>
							<td bgcolor="#D5D5D5">-</td>
						</tr>
						<tr>
							<td colspan="2" bgcolor="#D5D5D5"><strong>GRAND TOTAL</strong>
							</td>
							<td bgcolor="#D5D5D5"><?php echo $rate_total?></td>
							<td bgcolor="#D5D5D5">&nbsp;</td>
							<td bgcolor="#D5D5D5"><?php echo $tax_total?></td>
							<td bgcolor="#D5D5D5"><?php echo $grand_total?></td>
						</tr>
						<tr>
							<td colspan="6" bgcolor="#D5D5D5"><strong>TOTAL AMOUNT IN WORDS: <?php echo convert_number($grand_total)?></strong>
							</td>
						</tr>
					</tbody>
				</table>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer bg-white">
                                    <table width="100%" border="1" cellpadding="1">
					<tbody>
						<tr>
							<td>
								<h3>Bank Account Details</h3>
							</td>
						</tr>
						<tr>
							<td>DILIGENT ENERGY</td>
						</tr>
						<tr>
							<td></td>
						</tr>
						<tr>
							<td</td>
						</tr>
						<tr>
							<td></td>
						</tr>
						<tr>
							<td></td>
						</tr>
						<tr>
							<td></td>
						</tr>
					</tbody>
				</table>
									
                                </div>
                            </div>
							
							<a href="<?php echo site_url("invoice/update/".$id)?>" class="btn btn-primary btn-lg btn-block" type="submit">Edit Invoice</a>
							
                        </div>
                    </div>
                </div>

                