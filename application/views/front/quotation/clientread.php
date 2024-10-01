<?php $this->load->view('front/includes/header_standalone');?>
<div class="container-fluid dashboard-content ">
                    <!-- ============================================================== -->
                    <!-- pageheader  -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <h2 class="pageheader-title text-center">View Quotation </h2>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end pageheader  -->
                    <!-- ============================================================== -->
	
					<!-- ============================================================== -->
					<!-- button  -->
					<!-- ============================================================== -->
					<div class="row">
						<div class="offset-xl-2 col-xl-8  col-lg-12 col-md-12 col-sm-12 col-12 text-center">
						<div class="section-block " id="buttons">
							<h3 class="section-title">Action required</h3>
							<?php if($status == 'new'){?>
							<p class="lead">If you are not satisfied with current quote and want to give your price please click on "Counter Offer".</p>
							<?php }
							elseif($status == 'accepted'){
							echo '<p class="lead">You have already "Accepted" this quotation. On of our team member will contact you soon.</p>';
							}
							elseif($status == 'rejected'){
							echo '<p class="lead">You have "Rejected" this quotation. On of our team member will contact you soon.</p>';
							}
							elseif($status == 'reprice'){
								$rs = $this->quotation_status_model->get_all(["quotation_id" => $id, "status" => "reprice"], false);
							echo sprintf('<p class="lead">Your counter offer is under review by our team. You have offered %s</p>', show_price($rs->counter_price, false));
								
							 }?>
						</div>
						
						<div class="card bg-light">
							<div class="card-body">
								<div class="row justify-content-center">
									<div class="mr-2">
										<form method="post" action="<?php echo site_url("clientquotation/changestatus ")?>">
											<input type="hidden" name="status" value="accepted">
											<input type="hidden" name="quoteid" value="<?php echo $id?>">
											<input type="hidden" name="description" value="">
											<button type="submit" class="btn btn-success <?=($status != 'new') ? "disabled" : ""?>" <?=($status != 'new') ? "disabled" : ""?>>Accept</button>
										</form>
									</div>
									<div class="mr-2">
										<a href="#" class="btn btn-danger rejectclick <?=($status != 'new') ? "disabled" : ""?>" >Reject</a>										
									</div>
									<div class="mr-2">
										<a href="#" class="btn btn-secondary offerclick <?=($status != 'new') ? "disabled" : ""?>" >Counter Offer</a>
									</div>
									<div class="mr-2">
										<a href="<?php echo site_url("clientquotation/downloadpdf/".$id)?>" class="btn btn-secondary downloadpdf" ><i class="fas fa-file-pdf"></i> Download PDF</a>
									</div>
								</div>
								<div class="row justify-content-center mt-2">
									<div class="col">
									<form id="reject-frm" method="post" action="<?php echo site_url("clientquotation/changestatus ")?>" class="d-none">
											<input type="hidden" name="status" value="rejected">
											<input type="hidden" name="quoteid" value="<?php echo $id?>">											
											<div class="form-group">
                                                <label for="rdescription">Comments</label>
												<textarea id="rdescription" type="text" name="description" rows="3" class="form-control"></textarea>
                                            </div>
											<button type="submit" class="btn btn-danger btn-block">Reject</button>
										</form>
										
										<form id="offer-frm" method="post" action="<?php echo site_url("clientquotation/changestatus ")?>" class="d-none">
											<input type="hidden" name="status" value="reprice">
											<input type="hidden" name="quoteid" value="<?php echo $id?>">
											<div class="form-group">
                                                <label for="cdescription">Comments</label>
												<textarea id="cdescription" type="text" name="description" rows="3" class="form-control"></textarea>
                                            </div>
											<div class="form-group">
                                                <label for="cprice">Provide your price</label>												
												<div class="input-group mb-3"><span class="input-group-prepend"><span class="input-group-text">AED</span></span>
                                                <input id="cprice" type="number" name="counter_price" value="" class="form-control" />
                                            </div>
                                            </div>
											
											<button type="submit" class="btn btn-secondary btn-block">Send Counter Offer</button>
										</form>
									</div>
								</div>
							</div>
						</div>
							
					</div>
	</div>
					<!-- ============================================================== -->
					<!-- end button  -->
					<!-- ============================================================== -->
				
                    <div class="row">
                        <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <div class="card-header p-4">Quotation
                                   
                                    <div class="float-right"> <h3 class="mb-0">Quotation #<?php echo $id?></h3>
                                    Date: <?php echo $created_at?></div>
                                </div>
                                <div class="card-body">
                                    <div class="row mb-4">
                                        <div class="col-sm-6">
                                            <h5 class="mb-3">Quotation Ref No.:</h5>                                            
                                            <h3 class="text-dark mb-1">BETTER/Qt/S<?php echo date('Y', strtotime($created_at))?>/<?php echo $id?></h3>
                                         
                                            <div>Vat Registration No.: 100328204100007</div>
                                            <div>Quotation Validity: <?php echo $validity_days?></div>
                                            <div>Prepared By: <?php echo $prepared_by?></div>
                                        </div>
                                        <div class="col-sm-6">
                                            <h5 class="mb-3">Project:</h5>
                                            <h3 class="text-dark mb-1"><?php echo $clientname?></h3>                                            
                                            <div>Attention: <?php echo $attention?></div>
                                            <div>Project: <?php echo $project?></div>
                                            <div>Location: <?php echo $location?></div>
                                        </div>
                                    </div>
                                    <div class="table-responsive-sm">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th class="center">Sr. No</th>
                                                    <th>Scope Of Work 1 Time Annually</th>
                                                    <th>Freq</th>
                                                    <th class="right">Total Amount</th>
                                                </tr>
                                            </thead>
                                            <tbody>
												<?php 
												if(!empty($services)){
													$i = 1;
													$subtotal = 0;
												foreach($services as $service){?>
                                                <tr>
                                                    <td class="center"><?php echo $i?></td>
                                                    <td class="left strong"><?php echo $service->title?></td>
                                                    <td class="left"><?php echo $service->frequency ?></td>
                                                    <td class="right"><?php echo show_price($service->price); ?></td>
                                                </tr>
												<?php $i++; 
												$subtotal = $subtotal + $service->price;						  
												}
												}?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4 col-sm-5">
                                        </div>
                                        <div class="col-lg-4 col-sm-5 ml-auto">
                                            <table class="table table-clear">
                                                <tbody>
                                                    <tr>
                                                        <td class="left">
                                                            <strong class="text-dark">Subtotal</strong>
                                                        </td>
                                                        <td class="right"><?php echo show_price($subtotal) ?></td>
                                                    </tr>
													<?php $plusvat = $subtotal + (VAT_VALUE * $subtotal); ?>
                                                    <tr>
                                                        <td class="left">
                                                            <strong class="text-dark">VAT (5%)</strong>
                                                        </td>
                                                        <td class="right"><?php echo show_price(VAT_VALUE * $subtotal) ?>
														<input type="hidden" name="subtotal" value="<?php echo $subtotal?>">
														</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="left">
                                                            <strong class="text-dark">Total</strong>
                                                        </td>
                                                        <td class="right">
                                                            <strong class="text-dark"><?php echo show_price($plusvat) ?></strong>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer bg-white">
									<h3>Mobilization & Duration:</h3>
                                    <table class="table table-clear">
                                                <tbody>
                                                    <tr>
														<td>Mobilization Time:</td>
														<td><?php echo $mobduration. ' ' . ($mobduration > 1 ? 'Weeks' : 'Week') ?></td>
													</tr>
                                                    <tr>
														<td>Duration of Work:</td>
														<td><?php echo $workduration ?> Working Days/Service</td>
													</tr>
										</tbody>
									</table>
									
									
									<?php echo $quotation_text?>
									
									<h3>Yours Faithfully,</h3>
<p>BETTER ACCESS CLEANING SERVICES LLC</p>
                                </div>
                            </div>
                        </div>
                    </div>
	
                </div>

				

<?php $this->load->view('front/includes/footer_standalone');?>
<script>
$(document).ready(function(){
	$(".rejectclick").click(function(e){
		e.preventDefault();
		$(this).hide("fast");
		$(".offerclick").show("fast");
		$("#offer-frm").addClass("d-none");
		$("#reject-frm").removeClass("d-none");
	});
	$(".offerclick").click(function(e){
		e.preventDefault();
		$(this).hide("fast");
		$(".rejectclick").show("fast");
		$("#offer-frm").removeClass("d-none");
		$("#reject-frm").addClass("d-none");
	});
	
	var subtotal = $("input[name='subtotal']").val();
	$("#cprice").val(subtotal);
});
</script>                