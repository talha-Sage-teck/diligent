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
        <h2 style="margin-top:0px">Page_about Read</h2>
        <table class="table">
	    <tr><td>title</td><td><?php echo $title; ?></td></tr>
	    <tr><td>mission_subheading</td><td><?php echo $mission_subheading; ?></td></tr>
	    <tr><td>mission_heading</td><td><?php echo $mission_heading; ?></td></tr>
	    <tr><td>mission_text</td><td><?php echo $mission_text; ?></td></tr>
	    <tr><td>service1_heading</td><td><?php echo $service1_heading; ?></td></tr>
	    <tr><td>service1_text</td><td><?php echo $service1_text; ?></td></tr>
	    <tr><td>service2_heading</td><td><?php echo $service2_heading; ?></td></tr>
	    <tr><td>service2_text</td><td><?php echo $service2_text; ?></td></tr>
	    <tr><td>service3_heading</td><td><?php echo $service3_heading; ?></td></tr>
	    <tr><td>service3_text</td><td><?php echo $service3_text; ?></td></tr>
	    <tr><td>vision_subheading</td><td><?php echo $vision_subheading; ?></td></tr>
	    <tr><td>vision_heading</td><td><?php echo $vision_heading; ?></td></tr>
	    <tr><td>vision_text</td><td><?php echo $vision_text; ?></td></tr>
	    <tr><td>referral_heading</td><td><?php echo $referral_heading; ?></td></tr>
	    <tr><td>referral_text</td><td><?php echo $referral_text; ?></td></tr>
	    <tr><td>chairman_heading</td><td><?php echo $chairman_heading; ?></td></tr>
	    <tr><td>chairman_text</td><td><?php echo $chairman_text; ?></td></tr>
	    <tr><td>chairman_name</td><td><?php echo $chairman_name; ?></td></tr>
	    <tr><td>chairman_designation</td><td><?php echo $chairman_designation; ?></td></tr>
	    <tr><td>meta_keywords</td><td><?php echo $meta_keywords; ?></td></tr>
	    <tr><td>meta_description</td><td><?php echo $meta_description; ?></td></tr>
	    <tr><td>updated_on</td><td><?php echo $updated_on; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('page_about') ?>" class="btn btn-default">Cancel</button></td></tr>
	</table>
    </body>
</html>