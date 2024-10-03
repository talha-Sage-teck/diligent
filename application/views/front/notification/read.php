<div class="container flex-grow-1 container-p-y default-style">
  <h1 class="font-weight-bold py-3 mb-0">Your Notifications</h1>
  <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo site_url() ?>"><i class="feather icon-home"></i></a></li>
      <li class="breadcrumb-item"><a href="<?php echo site_url('notifications') ?>">Notifications</a></li>
      <li class="breadcrumb-item active">Read Notification</li>
    </ol>
  </div>
  <?php if($this->session->flashdata('success')){?>
  <div class="row">
    <div class="col">
      <div class="alert alert-success"><?php echo $this->session->flashdata('success') ?></div>
    </div>
  </div>
  <?php }?>
  <?php if($this->session->flashdata('error')){?>
  <div class="row">
    <div class="col">
      <div class="alert alert-success"><?php echo $this->session->flashdata('error') ?></div>
    </div>
  </div>
  <?php }?>
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="media p-4">
          <div class="media-body">
            <div class="mb-1"><span class="text-muted"><?php echo date(DATETIME_SHORT, $details->date) ?></span> </div>
            <h5 class="line-height-inherit m-0"><?php echo $details->subject?></h5>
          </div>
        </div>
        <hr class="border-light m-0">
        <div class="p-4">
          <p><?php echo $details->description ?></p>
        </div>
        <hr class="border-light m-0">
        <div class="text-left p-4"> <a href="<?php echo site_url('notifications'); ?>" class="btn btn-primary"> <i class="ion ion-ios-arrow-round-back"></i>&nbsp; Go Back</a> </div>
      </div>
    </div>
  </div>
</div>
