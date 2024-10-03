<?php 	
if(! defined('ENVIRONMENT') )
	{
	  $domain = strtolower($_SERVER['HTTP_HOST']);
	  switch($domain) {
		case 'localhost' :
		case 'localhost:8080' :
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
