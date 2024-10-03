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
        <h2 style="margin-top:0px">Services Read</h2>
        <table class="table">
	    <tr><td>title</td><td><?php echo $title; ?></td></tr>
	    <tr><td>description</td><td><?php echo $description; ?></td></tr>
	    <tr><td>created_at</td><td><?php echo $created_at; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('services') ?>" class="btn btn-default">Cancel</button></td></tr>
	</table>
    </body>
</html>