<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Mylogin {

	function myhash($pass, $unique_salt){
	 	return crypt($pass, '$2a$10$'. $unique_salt);
	}

	function unique_salt() {
	    return substr(sha1(mt_rand()),0,22);
	}


	function check_password($hash, $pass) {
    // first 29 characters include algorithm, cost and salt
    // let's call it $full_salt
    $full_salt = substr($hash, 0, 29);
 
    // run the hash function on $pass
    $new_hash = crypt($pass, $full_salt);
 
    // returns true or false
    return ($hash == $new_hash);
}

} // CLOSE CLASS



//$2a$10$aaa3d8d2c6cbfc365fec8urqUJblEIykFe3IkdqEyJh6lk16/.MC6