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
		  						'role' => 'form');
		  echo form_open('', $attributes) ;
		  //var_dump($userdata);
		  ?>
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Group</label>

                  <div class="col-sm-10">
                    <input name="group_name" type="text" class="form-control" id="group_name" placeholder="Group" >
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Description</label>

                  <div class="col-sm-10">
                    <input name="group_description" type="text" class="form-control" id="group_description" placeholder="Description">
                  </div>
                </div>
                
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="<?php echo admin_url($pslug) ?>" type="submit" class="btn btn-default">Cancel</a>
                <button type="submit" class="btn btn-info pull-right"><?php echo $action ?></button>
              </div>
              <!-- /.box-footer -->
            </form>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card --> 
</div>
<!-- /.container-fluid -->