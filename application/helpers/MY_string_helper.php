<?php
defined('BASEPATH') or exit('No direct script access');
 
if (! function_exists('hash_password')) {
    function hash_password($string, $salt = null) 
	{
        $CI = & get_instance();
        $salt = (is_null($salt)) ? $CI->config->item('encryption_key') : $salt;
        return sha1($salt.$string); // sha1($string.$salt);
    }
}
/* end of file application/helpers/MY_string_helper.php */