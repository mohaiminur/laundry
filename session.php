<?php 
require_once('database/Database.php');//start session at default constructor
$session = new Database();//session is at default constructor

if(!isset($_SESSION['user_logged'])){
	$session->Disconnect();
	header('location: index.php');
}
