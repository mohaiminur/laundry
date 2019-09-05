<?php 
require_once('../class/Laundry.php');
if(isset($_POST['customer'])){
	$customer = $_POST['customer'];
	$priority = $_POST['priority'];
	$weight = $_POST['weight'];
	$type = $_POST['type'];

	$customer = strtolower($customer);
	$customer = ucwords($customer);

	$saveLaundry = $laundry->new_laundry($customer, $priority, $weight, $type);
	$return['valid'] = false;
	if($saveLaundry){
		$return['valid'] = true;
		$return['msg'] = 'New Laundry Added Successfully!';
	}
	echo json_encode($return);
}//end isset
$laundry->Disconnect();