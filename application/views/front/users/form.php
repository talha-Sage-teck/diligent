<div class="layout-content">
<div class="container-fluid flex-grow-1 container-p-y">
  <h1> <?php echo $page_title ?> </h1>
  <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo admin_url() ?>">Dashboard</a></li>
      <li class="breadcrumb-item"><?php echo anchor($pslug,$page_title) ?></li>
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
      <!-- form start -->
      <?php 
		  $attributes = array('enctype'=>"multipart/form-data",
		  						'role' => 'form',
								'class' => "form-horizontal",);
		  echo form_open($frm_action, $attributes) ?>         <div class="box-body">
          <div class="form-group">
            <label for="username" class="col-sm-2 form-label">Username <span class="text-danger">*</span> </label>
			  
            <div class="col-sm-10">
              <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?php echo $username; ?>" />
				<p class="help-block">Use username in small letters and without spaces</p>
              <div class="help-block"><?php echo form_error('username') ?></div>
            </div>
          </div>
          <div class="form-group">
            <label for="password" class="col-sm-2 form-label">Password <span class="text-danger">*</span></label>
            <div class="col-sm-10">
              <input type="password" class="form-control" name="password" id="password" placeholder="password" />
              <div class="help-block"><?php echo form_error('password') ?></div>
            </div>
          </div>
          <div class="form-group">
            <label for="email" class="col-sm-2 form-label">Email <span class="text-danger">*</span></label>
            <div class="col-sm-10">
              <input type="email" class="form-control" name="email" id="email" placeholder="email" value="<?php echo $email; ?>" />
              <div class="help-block"><?php echo form_error('email') ?></div>
            </div>
          </div>
          <div class="form-group">
            <label for="active" class="col-sm-2 form-label">Active <?php echo form_error('active') ?></label>
            <div class="col-sm-10">
              <select class="form-control" name="active">
                <option value="0" <?php if(0 == $active) echo 'selected';?>>Disabled</option>
                <option value="1" <?php if(1 == $active) echo 'selected';?>>Active</option>
              </select>
              <div class="help-block"><?php echo form_error('active') ?></div>
            </div>
          </div>
          <div class="form-group">
            <label for="first_name" class="col-sm-2 form-label">First name </label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="first_name" id="first_name" placeholder="first name" value="<?php echo $first_name; ?>" />
              <div class="help-block"><?php echo form_error('first_name') ?></div>
            </div>
          </div>
          <div class="form-group">
            <label for="last_name" class="col-sm-2 form-label">Last name </label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="last_name" id="last_name" placeholder="last name" value="<?php echo $last_name; ?>" />
              <div class="help-block"><?php echo form_error('last_name') ?></div>
            </div>
          </div>
          <div class="form-group">
            <label for="company" class="col-sm-2 form-label">Company </label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="company" id="company" placeholder="company" value="<?php echo $company ? $company : "Better Access"; ?>" />
              <div class="help-block"><?php echo form_error('company') ?></div>
            </div>
          </div>
          <div class="form-group">
            <label for="phone" class="col-sm-2 form-label">Phone </label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="phone" id="phone" placeholder="phone" value="<?php echo $phone; ?>" />
              <div class="help-block"><?php echo form_error('phone') ?></div>
            </div>
          </div>
          
          <hr class="m-0">
          <div class="card-body">
          <div class="font-weight-semibold mb-3"><h3>User Groups</h3></div>
          <div class="form-group">
           
			  <div class="d-block">
           <?php foreach($listGroups as $group){			   
			   ?>
				  
			<label class="custom-control custom-radio custom-control-inline">
				<input type="radio" class="custom-control-input" value="<?php echo $group->id ?>" name="usergroups[]" <?php if ($this->ion_auth->in_group($group->id, $id)) echo 'checked'?>>
				<span class="custom-control-label"><?php echo $group->name ?></span>
			</label>
           <?php }?>
           </div>
          </div>
          </div>
          
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <input type="hidden" name="id" value="<?php echo $id; ?>" />
          <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
          <a href="<?php echo site_url('users') ?>" class="btn btn-default">Cancel</a> </div>
        <!-- /.box-footer -->
      </form>
       
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card --> 
</div>
<!-- /.container-fluid -->