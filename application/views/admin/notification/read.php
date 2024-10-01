<!doctype html>
<html>
    <head>
        <title>codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Notification Read</h2>
        <table class="table">
	    <tr><td>type</td><td><?php echo $type; ?></td></tr>
	    <tr><td>description</td><td><?php echo $description; ?></td></tr>
	    <tr><td>subject</td><td><?php echo $subject; ?></td></tr>
	    <tr><td>user_id</td><td><?php echo $user_id; ?></td></tr>
	    <tr><td>read_status</td><td><?php echo $read_status; ?></td></tr>
	    <tr><td>date</td><td><?php echo $date; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('notification') ?>" class="btn btn-default">Cancel</button></td></tr>
	</table>
    </body>
</html>