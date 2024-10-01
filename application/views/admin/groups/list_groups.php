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

  <div class="card">
    <h6 class="card-header"><a href="<?php echo site_url($this->url_prefix.$pslug.'/create') ?>" type="button" class="btn  btn-primary"><i class="fa fa-plus"></i> Add <?php echo $page_title ?></a></h6>
    <div class="card-datatable table-responsive">
			<?php  if(!empty($groups))
			  {?>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Group Name</th>
                  <th>Description</th>
                  <th>Action(s)</th>
                  </tr>
                </thead>
                <tbody>
               
			<?php	foreach($groups as $group)
              {
                  ?>
                <tr>
                  <td><?php echo $group->name ?></td>
                  <td><?php echo $group->description ?></td>
                  <td><?php echo anchor('admin/groups/edit/'.$group->id,'<i class="fa fa-edit"></i>'); ?>
                    <?php if(!in_array($group->name, array('admin'))) echo ' '.anchor('admin/groups/delete/'.$group->id,'<i class="fa fa-trash text-danger"></i>'); ?>
                  </td>
                  </tr>
                
                <?php }}?>
                
                
                </tbody>
                <tfoot>
                <tr>
                  <th>Rendering engine</th>
                  <th>Browser</th>
                  <th>Platform(s)</th>
                  </tr>
                </tfoot>
              </table>
    </div>
  </div>
</div>
