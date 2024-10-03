<table border="0" cellpadding="0" cellspacing="0" width="100%">
	<tr>
		<td style="padding: 10px 0 30px 0;">
			<table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border: 1px solid #cccccc; border-collapse: collapse;">
				<tr>
					<?php include('include_header.php'); ?>
				</tr>
				<tr>
					<td bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;">
						<p><strong>Inspector name: </strong><?php echo $inspector_info->first_name.' '.$inspector_info->last_name?><br>
						<strong>Inspector username: </strong><?php echo $inspector_info->username?><br>
<strong>Inspector email: </strong><?php echo $inspector_info->email?></p>
						<div class="card">
                                <div class="card-header p-4">                                   
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
														<td colspan="2"><div class="card bg-light"><strong>Inspector Comments:</strong><br>
															<div class="card-body"><?php echo $info->comments ?>
															</div>
															</div></td></tr>
										</tbody>
									</table>
                                    
                                </div>
                                <div class="card-footer bg-white">
                                    
                                </div>
                            </div>
					</td>
				</tr>
				<tr>
					<?php include('include_footer.php'); ?>
				</tr>
			</table>
		</td>
	</tr>
</table>