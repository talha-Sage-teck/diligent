<div class="container-fluid dashboard-content ">
                    <!-- ============================================================== -->
                    <!-- pageheader  -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <h2 class="pageheader-title">View Quotation </h2>
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
											<li class="breadcrumb-item"><a href="<?php echo site_url('/')?>" class="breadcrumb-link">Dashboard</a></li>
											<li class="breadcrumb-item"><a href="<?php echo site_url('quotation')?>" class="breadcrumb-link">Quotations</a></li>
											<li class="breadcrumb-item active" aria-current="page">View Quotation</li>
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
		<div class="col-12">
			<strong>Copy Quotation Link</strong>
			<input type="text" size="100%" value="<?php echo site_url("clientquotation/viewquotation/$id")?>" id="myInput" <?php echo (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? 'style="visibility: hidden"' : '' ?>>
			<button onclick="myFunction()" class="btn btn-success btn-block btn-lg mb-5" <?php echo (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? '' : 'style="visibility: hidden"' ?>>Copy Quotation Link</button></div>
	</div>
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
                                                        <td class="right"><?php echo show_price(VAT_VALUE * $subtotal) ?></td>
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
                                    <table class="table table-clear">
                                                <tbody>
                                                    <tr>
														<td>Mobilization Time:</td>
														<td><?php echo $mobduration.' '. ($mobduration > 1 ? 'Weeks' : 'Week')?></td>
													</tr>
                                                    <tr>
														<td>Duration of Work:</td>
														<td><?php echo $workduration ?> Working Days/Service</td>
													</tr>
										</tbody>
									</table>
									
									<div class="content mt-5"><?php echo $quotation_text ?></div>
									
                                </div>
                            </div>
							
							<a href="<?php echo site_url("quotation/update/".$id)?>" class="btn btn-primary btn-lg btn-block" type="submit">Edit Quotation</a>
							
                        </div>
                    </div>
                </div>

<script>
function myFunction() {
  // Get the text field
  var copyText = document.getElementById("myInput");

  // Select the text field
  copyText.select();
  copyText.setSelectionRange(0, 99999); // For mobile devices

  // Copy the text inside the text field
  navigator.clipboard.writeText(copyText.value);
  
  // Alert the copied text
  alert("Copied the text!");
}
</script>
                