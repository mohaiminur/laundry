<?php 
interface iUser{
	public function login($username, $password);
	public function change_pass($pwd, $uid);
}//end iUser