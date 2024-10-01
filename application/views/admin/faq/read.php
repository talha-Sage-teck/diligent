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
        <h2 style="margin-top:0px">Faq Read</h2>
        <table class="table">
	    <tr><td>question</td><td><?php echo $question; ?></td></tr>
	    <tr><td>answer</td><td><?php echo $answer; ?></td></tr>
	    <tr><td>faq_cat_id</td><td><?php echo $faq_cat_id; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('faq') ?>" class="btn btn-default">Cancel</button></td></tr>
	</table>
    </body>
</html>