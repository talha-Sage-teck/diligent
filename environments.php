<?php 	
if(! defined('ENVIRONMENT') )
	{
	  $domain = strtolower($_SERVER['HTTP_HOST']);
	  switch($domain) {
		case 'localhost' :
				define('ENVIRONMENT', 'development');
		break;
		case 'abc.com' :
		  define('ENVIRONMENT', 'testing');
		break;
		default :
		  define('ENVIRONMENT', 'production');
		break;
	  }
	}
