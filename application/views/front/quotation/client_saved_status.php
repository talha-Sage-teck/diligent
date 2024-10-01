<?php $this->load->view('front/includes/header_standalone');?>
<div class="container-fluid dashboard-content ">
                    <!-- ============================================================== -->
                    <!-- pageheader  -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <h2 class="pageheader-title text-center">Saved status </h2>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end pageheader  -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <div class="card-body">
									<div class="row">
										<div class="col text-center">
											<div class=""><i class="fas fa-save text-success display-1"></i></div>
										<p class="lead mt-2">Your response on our quotation is saved. One of our team member will contact you soon.</p>
										</div>
									</div>
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
});
</script>                