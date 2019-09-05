<?php 
require_once('../class/Laundry.php');
if(isset($_POST['laun_id'])){
	$laun_id = $_POST['laun_id'];

	$getLaundry = $laundry->get_laundry($laun_id);
	echo json_encode($getLaundry);	
}//end isset
$laundry->Disconnect();