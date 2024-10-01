<?php
function ssl_redirect()
{
    $CI =& get_instance();
     if(substr($_SERVER['SERVER_NAME'],0,3)!="www"){
     header("HTTP/1.1 301 Moved Permanently");
     header("Location: ".$CI->config->config['base_url'].$_SERVER['REQUEST_URI']);
     }
    $CI->config->config['base_url'] = str_replace('http://', 'https://', $CI->config->config['base_url']);
    if ($_SERVER['SERVER_PORT'] != 443) redirect($CI->uri->uri_string());
}
?>