<style>
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
			<td><div style="height:100px"></div>
				<table width="100%" border="0">
					<tr>
						<td align="left">
							<h2><u>
Quotation
</u></h2>
						

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
									<td><?php echo date(DATE_SHORT_DASH, strtotime($created_at));?></td>
								</tr>
								<tr>
									<th><strong>Quotation Ref No.</strong>
									</th>
									<td>BETTER/Qt/S<?php echo date('Y', strtotime($created_at))?>/<?php echo $id?></td>
								</tr>
								<tr>
									<th><strong>Vat Registration No.</strong>
									</th>
									<td>100328204100007</td>
								</tr>
								<tr>
									<th><strong>Quotation Validity</strong>
									</th>
									<td><?php echo $validity_days?></td>
								</tr>
								<tr>
									<th><strong>Prepared By: -</strong>
									</th>
									<td><?php echo $prepared_by?></td>
								</tr>
							</table>
						</td>
						<td>
							<table width="100%" border="0" cellpadding="10">
								<tbody>
									<tr>
										<th width="38%" scope="row"><strong>Client Name:</strong></th>
										<td width="62%"><?php echo $clientname?></td>
									</tr>
									<tr>
										<th scope="row"><strong>Attention:</strong></th>
										<td><?php echo $attention?></td>
									</tr>
									<tr>
										<th scope="row"><strong>Project:</strong></th>
										<td><?php echo $project?></td>
									</tr>
									<tr>
										<th scope="row"><strong>Location:</strong></th>
										<td><?php echo $location?></td>
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
				<table width="100%" border="0" cellpadding="5">

					<tr>
						<th scope="row"><strong>Dear Sir,</strong>
						</th>
					</tr>
					<tr>
						<td scope="row">1.0 Thank You for inquiry. We are pleased to quote you our best prices are as follows</td>
					</tr>
				</table>
				<div style="height:100px"></div>
			</td>
		</tr>
		<tr>
			<td>
				<div style="height:100px"></div>
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
											<td width="8%"><?php echo $i?></td>
											<td width="62%"><strong><u>Service Detail</u></strong><br>
												<div style="height:100px"></div>
												<u><?php echo $service->title?></u>
											</td>
											<td valign="bottom" width="9%"><?php echo $service->frequency ?></td>
											<td width="21%"><?php echo show_price($service->price); ?></td>
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
							<td colspan="4"><table width="100%" border="1" cellpadding="4">
  <tbody>
<!--    <tr>
      <td width="79%">Sub Total: </td>
      <td align="right" width="21%"><?php echo show_price($subtotal) ?></td>
    </tr>
	  <?php //$plusvat = $subtotal + (VAT_VALUE * $subtotal); ?>

    <tr>
      <td><strong>Tax: <?php //echo VAT_TEXT?></strong></td>
      <td align="right"><strong><?php //echo show_price(VAT_VALUE * $subtotal) ?></strong></td>
    </tr>
-->
    <tr>
      <td><strong>Total: </strong></td>
      <td align="right"><strong><?php echo show_price($subtotal) ?></strong></td>
    </tr>
  </tbody>
</table>
</td>
						</tr>
						<tr>
							<td colspan="4"><table width="100%" border="0" cellpadding="5">
  <tbody>
    <tr>
      <td><strong>Amount in words:</strong> <?php echo convert_number($subtotal)?> dirhams only.</td>
    </tr>
  </tbody>
</table>
</td>
						</tr>
						<tr>
							<td colspan="4"><table width="100%" border="0" cellpadding="5">
  <tbody>
    <tr>
      <td><strong>Note: </strong>Additional 5% VAT will be charged as per UAE Federal Decree-Law No.8 of 2017.</td>
    </tr>
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
			<table width="100%" border="0" cellpadding="10">
  <tbody>
    <tr>
		<td colspan="2"><strong><u>2.0 Mobilization & Duration: -</u></strong></td>
    </tr>
    <tr>
      <td width="29%"><strong>Mobilization Time:</strong></td>
      <td width="71%"><?php echo $mobduration. ' ' . ($mobduration > 1 ? 'Weeks' : 'Week')?> </td>
    </tr>
    <tr>
      <td><strong>Duration of Work:</strong></td>
      <td><?php echo $workduration ?> Working Days/Service</td>
    </tr>
  </tbody>
</table>

			</td>
		</tr>
		<tr>
			<td><br>
				<?php echo $quotation_text?>
				
				<p><strong>Yours Faithfully,</strong><br><br>
BETTER ACCESS CLEANING SERVICES LLC<br>
<br>
</p>
				<img src="<?php echo FCPATH.'assets/images/sign.png' ?>" width="150">
			</td>
		</tr>
		
	</table>

	

</div>