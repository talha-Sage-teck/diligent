<div class="layout-content">
<div class="container-fluid flex-grow-1 container-p-y">
  <h1> <?php echo $page_title ?> </h1>
  <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo admin_url() ?>"><i class="feather icon-home"></i></a></li>
      <li class="breadcrumb-item"><?php echo anchor($this->url_prefix.$pslug,$page_title) ?></li>
      <li class="breadcrumb-item active"><?php echo $action.' '.$page_title ?></li>
    </ol>
  </div>
  <div class="row">
    <div class="col-md-12 text-center">
      <?php if(validation_errors() != ''){?>
      <div class="alert alert-danger alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <?php echo validation_errors(); ?> </div>
      <?php }?>
      <?php if($this->session->userdata('error')) {?>
      <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <?php echo $this->session->userdata('error') ?> </div>
      <?php } if($this->session->userdata('message')){?>
      <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <?php echo $this->session->userdata('message') ?> </div>
      <?php }?>
    </div>
  </div>
  <div class="card mb-4">
    <div class="card-body"> 
    <?php 
		  $attributes = array('enctype'=>"multipart/form-data",
		  						'role' => 'form',
								'class' => "form-horizontal",);
		  echo form_open(admin_url($frm_action.'/?payment=1'), $attributes) ?> 
		<div class="box-body">
	    <?php //print_r($data);
		$i = 0;
		foreach($data as $r){
			//var_dump($r);
			$r = (array) $r;
		?>
        <div class="form-group">
        
                <label for="varchar" class="col-sm-4 form-label"><?php echo $r['key_title'] ?></label>
				<div class="col-sm-8">
                <input type="hidden" value="<?php echo $r['key_title'] ?>" name="opt[<?=$i?>][key_title]" />
                <input type="text" class="form-control" name="opt[<?=$i?>][key_value]" id="name" placeholder="name" value="<?php echo $r['key_value'] ?>" />
            	</div>
			</div>
         <?php $i++; }?>   
	</div>
              <!-- /.box-body -->
			  <div class="box-footer">
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('charity') ?>" class="btn btn-default">Cancel</a>
    </div>
              <!-- /.box-footer -->
	</form>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card --> 
</div>
<!-- /.container-fluid -->