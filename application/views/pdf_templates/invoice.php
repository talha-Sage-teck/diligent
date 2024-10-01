<style>
	.container {
		font-size: 12px;
	}
	
	.voucher_type {
		margin-top: 300px;
		color: #513393;
		font-size: 24px;
	}
	
	.voucher_code {
		font-size: 26px;
		color: #E91E63;
	}
	
	.voucher_value {
		color: #fff;
		text-align: center;
		line-height: 16px;
	}
	
	.value_text {
		font-size: 14px;
		font-weight: 300;
	}
	
	.price_text {
		font-size: 40px;
		font-weight: bolder;
	}
	
	.currency {
		font-size: 30px;
	}
	
	.terms-heading {
		font-size: 9px;
		font-weight: bold;
	}
	
	.terms-text {
		font-size: 10px;
	}
</style>
<div class="container">
	<table width="100%" border="0" class="terms-text">
		<tr>
			<td></td>
		</tr>
		<tr>
			<td>
				<div style="height:100px"></div>
				<table width="100%" border="1" cellspacing="2" cellpadding="0" bgcolor="#DADADA">
					<tbody>
						<tr valign="middle">
							<td width="88%">
								<table width="100%" border="0" cellpadding="0">
									<tbody>
										<tr>
											<td>
												<table width="100%" border="0" cellpadding="1">
													<tbody>
														<tr>
															<td>BETTER ACCESS CLEANING SERVICES LLC</td>
														</tr>
														<tr>
															<td>OFFICE NO 113</td>
														</tr>
														<tr>
															<td>HAMRIYA STREET</td>
														</tr>
														<tr>
															<td>DUBAI U.A.E</td>
														</tr>
														<tr>
															<td>P.O.BOX: 96925</td>
														</tr>
														<tr>
															<td>TRN: 100328204100003</td>
														</tr>
														<tr>
															<td>Email Address: info@betteraccess.ae</td>
														</tr>
													</tbody>
												</table>
											</td>
											<td>
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
															<td>Ref. NUMBER:</td>
															<td>
																<?php echo $ref_number?>
															</td>
														</tr>
													</tbody>
												</table>
											</td>
										</tr>
									</tbody>
								</table>
							</td>
							<td width="12%" align="center"><br><br>
								<br>

								<br> <strong>TAX</strong> <br><strong>INVOICE</strong>
							</td>
						</tr>
					</tbody>
				</table>

			</td>
		</tr>
		<tr>
			<td>
				<div style="height:100px; margin-top:5px"></div>
				<table width="100%" border="1" cellspacing="2" cellpadding="5" bgcolor="#DADADA">
					<tbody>
						<tr>
							<td>To</td>
						</tr>
					</tbody>
				</table>

			</td>
		</tr>
		<tr>
			<td>
				<div style="height:100px"></div>
				<table width="100%" border="0" cellpadding="0">

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
			</td>
		</tr>
		<tr>
			<td>
				<div style="height:100px"></div>
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
										<?php if($services){
	$i = 1;$rate_total = $tax_total = 0;
										foreach($services as $service){
										?>
										<tr>
											<td width="4%" style="border-right: 1px solid #000000"><?php echo $i?></td>
											<td width="41%" style="border-right: 1px solid #000000"><?php echo $service->title ?></td>
											<td width="12%" style="border-right: 1px solid #000000"><?php echo $service->rate ?></td>
											<td width="13%" style="border-right: 1px solid #000000"><?php echo VAT_TEXT?></td>
											<td width="13%" style="border-right: 1px solid #000000"><?php echo $service->tax_amount ?></td>
											<td width="17%"><?php echo $service->total_amount ?></td>
										</tr>
										<?php $i++; 
										$rate_total = $rate_total + $service->rate;
										$tax_total = $tax_total + $service->tax_amount;
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


				<div style="height:100px"></div>
			</td>
		</tr>
		<tr>
			<td>
				<table width="100%" border="1" cellpadding="1">
					<tbody>
						<tr>
							<td>
								<h3>Bank Account Details</h3>
							</td>
						</tr>
						<tr>
							<td>Account Title: Better Access Cleaning services LLC</td>
						</tr>
						<tr>
							<td>IBAN Number: 03303300000191455413</td>
						</tr>
						<tr>
							<td>Account Number: 019100455413</td>
						</tr>
						<tr>
							<td>SWIFT Code: BOMLAEAD</td>
						</tr>
						<tr>
							<td>Bank Name: Mashreq Bank</td>
						</tr>
						<tr>
							<td>Brank Name: Branchless (Digital Banking)</td>
						</tr>
					</tbody>
				</table>

			</td>
		</tr>
		<tr>
			<td>
				<p>Decleration: We declare that this invoice shows the actual value and that all particulars are true and correct.</p>
			</td>
		</tr>
		<tr>
			<td>
				<table width="100%" border="0" cellpadding="1">
					<tbody>
						<tr>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td>For<br>BETTER ACCESS CLEANING SERVICES LLC<br>
<img src="<?php echo FCPATH."assets/images/sign.png"?>" width="100" ></td>
							<td align="center"><br><br>ADMIN & ACCOUNTS<br>
<img src="<?php echo FCPATH."assets/images/ac_sign.png"?>" width="60" ></td>
							<td align="center"><br><br>RECEIVED BY:-</td>
						</tr>
					</tbody>
				</table>

			</td>
		</tr>
	</table>



</div>