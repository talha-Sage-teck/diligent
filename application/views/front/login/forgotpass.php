<!--=======Hero-Area Starts Here=======-->
    <section class="hero-area hide-hero" style="">
        <div class="container">
            
        </div>
    </section>
    <!--=======Hero-Area Ends Here=======-->

<section class="account-section padding-top padding-bottom">
        <div class="trigon-5 active">
            <img src="<?php echo base_url('assets/public/css/img/trigon09.png') ?>" alt="css">
        </div>
        <div class="anime-1">
            <img src="<?php echo base_url('assets/public/images/animation/01.png') ?>" alt="animation">
        </div>
        <div class="anime-2">
            <img src="<?php echo base_url('assets/public/images/animation/02.png') ?>" alt="animation">
        </div>
        <div class="anime-3">
            <img src="<?php echo base_url('assets/public/images/animation/03.png') ?>" alt="animation">
        </div>
        <div class="anime-4">
            <img src="<?php echo base_url('assets/public/images/animation/04.png') ?>" alt="animation">
        </div>
        <div class="anime-5">
            <img src="<?php echo base_url('assets/public/images/animation/05.png') ?>" alt="animation">
        </div>
        <div class="container">
        <div class="row">
        <div class="col-md-12"><?php if($this->session->flashdata('error')){?>
          <div class="alert alert-danger"> <?php echo $this->session->flashdata('error');?> </div>
          <?php }?>
          <?php if($this->session->flashdata('success')){?>
          <div class="alert alert-success"> <?php echo $this->session->flashdata('success');?> </div>
          <?php }?>
          <?php if($this->session->flashdata('act_message')){?>
          <div class="alert alert-info"> <?php echo $this->session->flashdata('act_message');?> </div>
          <?php }?>
          <?php if(validation_errors()){?>
          <div class="alert alert-danger">
            <button class="close" data-dismiss="alert">×</button>
            <?php echo validation_errors()?> </div>
          <?php }?></div>
        </div>
            <?php 
		  $attributes = array('enctype'=>"multipart/form-data",
		  						'role' => 'form',
								'id' => 'forgot-pass');
		  echo form_open('', $attributes) ?> 
          
          <h3 class="text-center">Submit Email</h3>
          <p class="help-block text-center">Enter your email address, so we will send you password reset code.</p>
                <div class="form-group">
                  <label class="form-label">Email *</label>
                  <input type="email" class="form-control" name="email" placeholder="Email" required="required" value="<?php echo set_value('email') ?>">
                  <div class="clearfix"></div>
                </div>
                
                <div class="form-group">
                  <button type="submit" name="forgotpass" value="submit" class="btn btn-primary btn-block g-recaptcha" 		 data-sitekey="6LcK1asaAAAAAPyeaHKEu3gLNs0YwiWojTyOVQqd" 
        data-callback='onSubmit' 
        data-action='submit'>Send</button>
                  <div class="clearfix"></div>
                </div>
              </form>
        </div>
    </section>


 <script src="https://www.google.com/recaptcha/api.js"></script>
  <script>
   function onSubmit(token) {
     document.getElementById("forgot-pass").submit();
   }
 </script>