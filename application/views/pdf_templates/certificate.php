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
						<td align="center">
							<h2>Certificate of Completion</h2>
						

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
				<table width="100%" border="0" cellpadding="0">
					<tr>
						<td width="55%">
							<table width="100%" border="0" cellpadding="5" cellspacing="0">
								<tr>
									<th><strong>Doc Number:</strong>
									</th>
									<td><?php echo $id?></td>
								</tr>
								<tr>
									<th><strong>Compiled By:</strong>
									</th>
									<td><?php echo $compiled_by ?></td>
								</tr>
							</table>
						</td>
						<td>
							<table width="100%" border="0" cellpadding="5" cellspacing="0">
								<tbody>									
								<tr>
									<th align="right"><strong>Date:</strong>
									</th>
									<td><?php echo date(DATE_SHORT_DASH, strtotime($created_at));?></td>
								</tr>
								<tr>
									<th align="right"><strong>Job Ref:</strong>
									</th>
									<td><?php echo $job_ref?></td>
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
		
	</table>

	

</div>