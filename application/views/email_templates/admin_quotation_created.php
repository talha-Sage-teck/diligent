<table border="0" cellpadding="0" cellspacing="0" width="100%">
	<tr>
		<td style="padding: 10px 0 30px 0;">
			<table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border: 1px solid #cccccc; border-collapse: collapse;">
				<tr>
					<?php include('include_header.php'); ?>
				</tr>
				<tr>
					<td bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;">
						<table width="100%" border="0" class="terms-text">
							<tr>
								<td></td>
							</tr>
							<tr>
								<td>
									<table width="100%" border="0">
										<tr>
											<td align="left">
												<h2><u>Quotation</u></h2>
											</td>
										</tr>
										<tr>
											<td align="right">&nbsp;</td>
										</tr>
									</table>
								</td>
							</tr>
							<tr>
								<td>
									<table width="100%" border="0" bordercolor="#009999" cellpadding="0">
										<tr>
											<td width="55%">
												<table width="100%" border="1" bordercolor="#009999" cellpadding="5" cellspacing="0" style="border: 1px solid #000000">
													<tr>
														<th><strong>Date</strong>
														</th>
														<td>
															<?php echo date(DATE_SHORT_DASH, strtotime($created_at));?>
														</td>
													</tr>
													<tr>
														<th><strong>Quotation Ref No.</strong>
														</th>
														<td>BETTER/Qt/S
															<?php echo date('Y', strtotime($created_at))?>/
															<?php echo $id?>
														</td>
													</tr>
													<tr>
														<th><strong>Vat Registration No.</strong>
														</th>
														<td>100328204100007</td>
													</tr>
													<tr>
														<th><strong>Quotation Validity</strong>
														</th>
														<td>
															<?php echo $validity_days?>
														</td>
													</tr>
													<tr>
														<th><strong>Prepared By: -</strong>
														</th>
														<td>
															<?php echo $prepared_by?>
														</td>
													</tr>
												</table>
											</td>
											<td>
												<table width="100%" border="0" cellpadding="10">
													<tbody>
														<tr>
															<th width="38%" scope="row"><strong>Client Name:</strong>
															</th>
															<td width="62%">
																<?php echo $clientname?>
															</td>
														</tr>
														<tr>
															<th scope="row"><strong>Attention:</strong>
															</th>
															<td>
																<?php echo $attention?>
															</td>
														</tr>
														<tr>
															<th scope="row"><strong>Project:</strong>
															</th>
															<td>
																<?php echo $project?>
															</td>
														</tr>
														<tr>
															<th scope="row"><strong>Location:</strong>
															</th>
															<td>
																<?php echo $location?>
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
									<table width="100%" border="1" cellpadding="0">
										<tbody>
											<tr>
												<th width="8%" align="center" scope="col"><strong>Sr. No</strong>
												</th>
												<th width="62%" align="center" scope="col"><strong>Scope Of Work 1 Time Annually</strong>
												</th>
												<th width="9%" align="center" scope="col"><strong>Freq</strong>
												</th>
												<th width="21%" align="center" scope="col"><strong>Total Amount</strong>
												</th>
											</tr>
											<tr valign="middle">
												<td colspan="4">
													<table width="100%" border="1" cellpadding="10">
														<tbody>
															<?php 
												if(!empty($services)){
													$i = 1;
													$subtotal = 0;
												foreach($services as $service){?>
															<tr>
																<td width="8%">
																	<?php echo $i?>
																</td>
																<td width="62%"><strong><u>Service Detail</u></strong><br>
																	<div style="height:100px"></div>
																	<u>
																		<?php echo $service->title?>
																	</u>
																</td>
																<td valign="bottom" width="9%">
																	<?php echo $service->frequency ?>
																</td>
																<td width="21%">
																	<?php echo show_price($service->price); ?>
																</td>
															</tr>
															<?php $i++; 
												$subtotal = $subtotal + $service->price;						  
												}
												}?>
														</tbody>
													</table>
												</td>

											</tr>
											<tr>
												<td>&nbsp;</td>
												<td>All Equipment’s and access cost will be in <strong>BETTER ACCESS</strong> scope</td>
												<td>&nbsp;</td>
												<td>&nbsp;</td>
											</tr>
											<tr>
												<td colspan="4">
													<table width="100%" border="0" cellpadding="10">
														<tbody>
															<tr>
																<td><strong>Total: </strong>
																</td>
																<td align="right">
																	<strong>
																		<?php echo show_price($subtotal) ?>
																	</strong>
																</td>
															</tr>
														</tbody>
													</table>
												</td>
											</tr>
											<tr>
												<td colspan="4">
													<table width="100%" border="0" cellpadding="5">
														<tbody>
															<tr>
																<td><strong>Amount in words:</strong>
																	<?php echo convert_number($subtotal)?> dirhams only.</td>
															</tr>
														</tbody>
													</table>
												</td>
											</tr>
											<tr>
												<td colspan="4">
													<table width="100%" border="0" cellpadding="5">
														<tbody>
															<tr>
																<td><strong>Note: 5%</strong> Vat is included in the above mentioned price as per UAE Federal Decree-Law No. 8 of 2017
																</td>
															</tr>
														</tbody>
													</table>
												</td>
											</tr>
										</tbody>
									</table>

									<div style="height:10px"></div>
								</td>
							</tr>
							<tr>
								<td>
									<table width="100%" border="0" cellpadding="10">
										<tbody>
											<tr>
												<td colspan="2"><strong><u>2.0 Mobilization & Duration: -</u></strong>
												</td>
											</tr>
											<tr>
												<td width="29%"><strong>Mobilization Time:</strong>
												</td>
												<td width="71%">1 Week</td>
											</tr>
											<tr>
												<td><strong>Duration of Work:</strong>
												</td>
												<td>15 Working Days/Service</td>
											</tr>
										</tbody>
									</table>

								</td>
							</tr>
							<tr>
								<td><div class="content mt-5"><?php echo $quotation_text ?></div></td>
							</tr>

						</table>
					</td>
				</tr>
				<tr>
					<?php include('include_footer.php'); ?>
				</tr>
			</table>
		</td>
	</tr>
</table>