<div class="container-fluid flex-grow-1 container-p-y">
  <h4 class="font-weight-bold py-3 mb-0">Users view</h4>
  <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo admin_url() ?>"><i class="feather icon-home"></i></a></li>
      <li class="breadcrumb-item"><a href="<?php echo admin_url('users') ?>">Users</a></li>
      <li class="breadcrumb-item active">Users view</li>
    </ol>
  </div>
  <div class="media align-items-center py-3 mb-3">
    <?php if (isset($user_additional->avatar)){ ?>
    <img src="<?php echo base_url('uploads/userdoc/thumbs/').$user_additional->avatar ?>" alt="Image not uploaded" class="d-block ui-w-100 rounded-circle">
    <?php }?>
    <div class="media-body ml-4">
      <h4 class="font-weight-bold mb-0"><?php echo $user_info->first_name.' '.$user_info->last_name ?></h4>
    </div>
  </div>
  <div class="card mb-4">
    <div class="card-body">
    <div class="table-responsive">
      <table class="table user-view-table m-0">
        <tbody>
          <tr>
            <td>Registered:</td>
            <td><?php echo date(DATE_SHORT, $user_info->created_on); ?></td>
          </tr>
          <tr>
            <td>Last login:</td>
            <td><?php echo date(DATETIME_LONG, $user_info->last_login); ?></td>
          </tr>
          
          <tr>
            <td>User Role:</td>
            <td><strong style="text-transform: uppercase"><?php $user_groups = $this->ion_auth->get_users_groups($user_info->id)->result();
				echo ($user_groups[0]->name)?></strong></td>
          </tr>
          <tr>
            <td>Status:</td>
            <td><?php if ($user_info->active == 1) {?>
              <span class="badge badge-outline-success">Active</span> &nbsp; <span class="text-muted">(This status is for auto email verification)</span>
              <?php } else {?>
              <span class="badge badge-outline-danger">Not active (Email is not verified or not logged in any time)</span>
              <?php }?></td>
          </tr>
        </tbody>
      </table>
      </div>
    </div>
    <hr class="border-light m-0">
  </div>
  <div class="card mb-4">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table user-view-table m-0">
          <tbody>
            <tr>
              <td>Eamil:</td>
              <td><?php echo $user_info->email ?></td>
            </tr>
            <tr>
              <td>Name:</td>
              <td><?php echo $user_info->first_name.' '.$user_info->last_name ?></td>
            </tr>
            <tr>
              <td>Company:</td>
              <td><?php echo $user_info->company ?></td>
            </tr>
          </tbody>
        </table>
      </div>
      <h6 class="mt-4 mb-3">Personal info</h6>
      <div class="table-responsive">
        <table class="table user-view-table m-0">
          <tbody>
            <tr>
              <td>Phone:</td>
              <td><?php echo $user_info->phone ?></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
