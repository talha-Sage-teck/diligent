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
        <h2 style="margin-top:0px">Testimonials Read</h2>
        <table class="table">
	    <tr><td>name</td><td><?php echo $name; ?></td></tr>
	    <tr><td>designation</td><td><?php echo $designation; ?></td></tr>
	    <tr><td>testimonial_text</td><td><?php echo $testimonial_text; ?></td></tr>
	    <tr><td>image</td><td><?php echo $image; ?></td></tr>
	    <tr><td>date</td><td><?php echo $date; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('testimonials') ?>" class="btn btn-default">Cancel</button></td></tr>
	</table>
    </body>
</html>