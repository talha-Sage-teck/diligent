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
        <h2 style="margin-top:0px">Page_contact Read</h2>
        <table class="table">
	    <tr><td>form_heading</td><td><?php echo $form_heading; ?></td></tr>
	    <tr><td>office_phone</td><td><?php echo $office_phone; ?></td></tr>
	    <tr><td>office_email</td><td><?php echo $office_email; ?></td></tr>
	    <tr><td>office_address</td><td><?php echo $office_address; ?></td></tr>
	    <tr><td>office_working_hours</td><td><?php echo $office_working_hours; ?></td></tr>
	    <tr><td>support_heading</td><td><?php echo $support_heading; ?></td></tr>
	    <tr><td>support_text</td><td><?php echo $support_text; ?></td></tr>
	    <tr><td>meta_keywords</td><td><?php echo $meta_keywords; ?></td></tr>
	    <tr><td>meta_description</td><td><?php echo $meta_description; ?></td></tr>
	    <tr><td>updated_on</td><td><?php echo $updated_on; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('page_contact') ?>" class="btn btn-default">Cancel</button></td></tr>
	</table>
    </body>
</html>