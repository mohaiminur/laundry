<?php 
require_once('../class/Laundry.php');
if(isset($_POST['type_id'])){
	$type_id = $_POST['type_id'];
	$type = $_POST['type'];
	$price = $_POST['price'];
	$price = number_format($price, 2);
	$type = strtolower($type);
	$type = ucwords($type);

	$saveChanges = $laundry->edit_type($type_id, $type, $price);
	$return['valid'] = false;
	if($saveChanges){
		$return['valid'] = true;
		$return['msg'] = 'Edit Successfully!';
	} 

	echo json_encode($return);
}//end isset
$laundry->Disconnect();