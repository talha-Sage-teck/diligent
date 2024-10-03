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
        <h2 style="margin-top:0px">Pages Read</h2>
        <table class="table">
	    <tr><td>parent_id</td><td><?php echo $parent_id; ?></td></tr>
	    <tr><td>order</td><td><?php echo $order; ?></td></tr>
	    <tr><td>title</td><td><?php echo $title; ?></td></tr>
	    <tr><td>menu_title</td><td><?php echo $menu_title; ?></td></tr>
	    <tr><td>teaser</td><td><?php echo $teaser; ?></td></tr>
	    <tr><td>content</td><td><?php echo $content; ?></td></tr>
	    <tr><td>meta_title</td><td><?php echo $meta_title; ?></td></tr>
	    <tr><td>meta_description</td><td><?php echo $meta_description; ?></td></tr>
	    <tr><td>meta_keywords</td><td><?php echo $meta_keywords; ?></td></tr>
	    <tr><td>created_at</td><td><?php echo $created_at; ?></td></tr>
	    <tr><td>updated_at</td><td><?php echo $updated_at; ?></td></tr>
	    <tr><td>created_by</td><td><?php echo $created_by; ?></td></tr>
	    <tr><td>updated_by</td><td><?php echo $updated_by; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('pages') ?>" class="btn btn-default">Cancel</button></td></tr>
	</table>
    </body>
</html>