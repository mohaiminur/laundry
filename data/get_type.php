<?php 
require_once('../class/Laundry.php');
if(isset($_POST['type_id'])){
	$type_id = $_POST['type_id'];

	$typeResult = $laundry->get_type($type_id);
	echo json_encode($typeResult);
}//end isset

$laundry->Disconnect();