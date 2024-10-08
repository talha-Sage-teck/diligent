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
											</td>
											<td>
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

								<br> <strong>TAX</strong> <br><strong>CHALLAN</strong>
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
										</tr>
										<?php $i++; 
										}
										}?>
									</tbody>
								</table>

							</td>
						</tr>
					</tbody>
				</table>


				<div style="height:100px"></div>
			</td>
		</tr>
		<tr>
			<td>
				<p>Decleration: We declare that this challan shows the actual value and that all particulars are true and correct.</p>
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
							<td>For<br>DILIGENT ENERGY<br>
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