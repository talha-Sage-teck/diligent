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
        <h2 style="margin-top:0px">Enroll Read</h2>
        <table class="table">
	    <tr><td>user_id</td><td><?php echo $user_id; ?></td></tr>
	    <tr><td>scheme_id</td><td><?php echo $scheme_id; ?></td></tr>
	    <tr><td>got_gift</td><td><?php echo $got_gift; ?></td></tr>
	    <tr><td>paid</td><td><?php echo $paid; ?></td></tr>
	    <tr><td>paid_amount</td><td><?php echo $paid_amount; ?></td></tr>
	    <tr><td>date</td><td><?php echo $date; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('enroll') ?>" class="btn btn-default">Cancel</button></td></tr>
	</table>
    </body>
</html>