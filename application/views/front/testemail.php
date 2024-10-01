<div class="container about-title">
	<div class="row justify-content-center">
		<h1>Test EMAIL</h1>
	</div>
	<!-- ./row -->
</div>	
<div class="container about-giftkarte">
	<div class="row">
		<div class="col-12 col-lg-12 about-gift">
        
        
			<?php 
		  $attributes = array('enctype'=>"multipart/form-data",
		  						'role' => 'form');
		  echo form_open('', $attributes) ?> 
            <div class="form-group"><div class="input-group">
  
  <input type="email" class="form-control" placeholder="abc@emailer.com" name="email" value="" required="required" min="0" >
</div></div>


<div class="form-group">
<button type="submit" class="btn btn-primary">TEST</button>
</div>
            </form>
            
            <?php if(isset($emailresponse) && $emailresponse === true){
				echo 'Email Sent!';
				}
				else{
					echo $this->email->print_debugger();
					}
				?>
		</div>
		<!-- ./col-12 col-lg-12 -->
	</div>
	<!-- ./row -->
</div>
<!-- /.container -->