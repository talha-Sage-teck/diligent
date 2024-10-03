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
			  	<?php echo validation_errors(); ?>
              </div>
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
  </div><div class="card mb-4">
<div class="card-body">
<?php 
		  $attributes = array('class' => 'form-horizontal',
		  						'role' => 'form',
								'enctype' => 'multipart/form-data');
		  echo form_open($frm_action, $attributes) ?> 
		  
		<div class="box-body">
	    <div class="form-group">
                <label for="subject" class="col-sm-2 form-label">Subject </label>
				<div class="col-sm-10">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="subject" value="<?php echo $subject; ?>" />
				<div class="help-block"><?php echo form_error('subject') ?></div>
            	</div>
			</div>
	    <div class="form-group">
                <label for="detail" class="col-sm-2 form-label">Detail </label>
				<div class="col-sm-10">
                <textarea class="form-control" rows="3" name="detail" id="detail" placeholder="detail"><?php echo $detail; ?></textarea>
				<div class="help-block"><?php echo form_error('detail') ?></div>
				</div>
            </div>
            
          <div class="form-group">  
          <label for="status" class="col-sm-2 form-label">Users</label>
          <select name="user_id" class="form-control">
          <?php foreach($users_list as $user){?>
          <option value="<?php echo $user->id ?>"><?php echo $user->first_name.' '.$user->last_name ?></option>
          <?php }?>
          </select>
          </div>
            
            
	    <div class="form-group">
                <label for="status" class="col-sm-2 form-label">Status <?php echo form_error('status') ?></label>
				<div class="col-sm-10">
                <select class="form-control" id="status" name="status">
					<option value="active" <?php if('active' == $status) echo 'selected';?>>active</option>
					<option value="disable" <?php if('disable' == $status) echo 'selected';?>>disable</option>
				</select>
				<div class="help-block"><?php echo form_error('status') ?></div>
				</div>
            </div>
	</div>
              <!-- /.box-body -->
			  <div class="box-footer">
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo admin_url('inbox') ?>" class="btn btn-default">Cancel</a>
    </div>
              <!-- /.box-footer -->
	</form>    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card --> 
</div>
<!-- /.container-fluid -->