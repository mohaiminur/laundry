<?php 
require_once('database/Database.php');//start session at default constructor
$session = new Database();//session is at default constructor

unset($_SESSION['user_logged']);

header('location: index.php');
