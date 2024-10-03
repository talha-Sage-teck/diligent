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
        <h2 style="margin-top:0px">Languages Read</h2>
        <table class="table">
	    <tr><td>language_name</td><td><?php echo $language_name; ?></td></tr>
	    <tr><td>language_directory</td><td><?php echo $language_directory; ?></td></tr>
	    <tr><td>slug</td><td><?php echo $slug; ?></td></tr>
	    <tr><td>language_code</td><td><?php echo $language_code; ?></td></tr>
	    <tr><td>default</td><td><?php echo $default; ?></td></tr>
	    <tr><td>morevalues</td><td><?php echo $morevalues; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('languages') ?>" class="btn btn-default">Cancel</button></td></tr>
	</table>
    </body>
</html>