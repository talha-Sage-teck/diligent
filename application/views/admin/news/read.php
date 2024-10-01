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
        <h2 style="margin-top:0px">News Read</h2>
        <table class="table">
	    <tr><td>title</td><td><?php echo $title; ?></td></tr>
	    <tr><td>description</td><td><?php echo $description; ?></td></tr>
	    <tr><td>image</td><td><?php echo $image; ?></td></tr>
	    <tr><td>date</td><td><?php echo $date; ?></td></tr>
	    <tr><td>users</td><td><?php echo $users; ?></td></tr>
	    <tr><td>status</td><td><?php echo $status; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('news') ?>" class="btn btn-default">Cancel</button></td></tr>
	</table>
    </body>
</html>