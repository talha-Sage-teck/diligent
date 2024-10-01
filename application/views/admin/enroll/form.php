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
    <?php if(!empty($cur_scheme)){?>
      <?php 
		  $attributes = array('class' => 'form-horizontal',
		  						'role' => 'form',
								'enctype' => 'multipart/form-data');
		  echo form_open($frm_action, $attributes) ?>
      <div class="box-body">
        <div class="form-group">
          <label for="paid" class="col-sm-2 form-label">Paid <?php echo form_error('paid') ?></label>
          <div class="col-sm-10">
            <select class="form-control" name="paid">
              <option value="0" <?php if(0 == $paid) echo 'selected';?>>No</option>
              <option value="1" <?php if(1 == $paid) echo 'selected';?>>Yes</option>
            </select>
            <div class="help-block"><?php echo form_error('paid') ?></div>
          </div>
        </div>
        <div class="form-group">
          <label for="paid_amount" class="col-sm-2 form-label">Paid amount </label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="paid_amount" id="paid_amount" placeholder="paid amount" value="<?php echo $paid_amount; ?>" />
            <div class="help-block"><?php echo form_error('paid_amount') ?></div>
          </div>
        </div>
      </div>
      <!-- /.box-body -->
      <div class="box-footer">
        <input type="hidden" name="id" value="<?php echo $id; ?>" />
        <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
        <a href="<?php echo admin_url('enroll') ?>" class="btn btn-default">Cancel</a> </div>
      <!-- /.box-footer -->
      </form>
    <?php } else{?>
    <div class="alert alert-danger">No scheme running right now.</div>
    <?php }?>
    </div>
    
    <!-- /.card-body --> 
  </div>
  <!-- /.card --> 
</div>
<!-- /.container-fluid -->