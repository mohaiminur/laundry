<?php 
require_once('../class/Laundry.php');
if(isset($_POST['id'])){
	$id = $_POST['id'];

	$result = $laundry->delete_laundry($id);
	echo json_encode($result);
}//end isset

$laundry->Disconnect();