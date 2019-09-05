<?php 
require_once('../class/Laundry.php');//para e update ang claim to 1
require_once('../class/Sales.php');
if(isset($_POST['id'])){
	$id = $_POST['id'];

	$details = $laundry->get_laundry2($id);
	//customer name
	$customer = $details['customer_name'];
	//type desc
	$type_desc = $details['laun_type_desc'];
	//date received
	$laundry_rec = $details['laun_date_received'];
	//amount
	$amount = $details['laun_weight'] * $details['laun_type_price'];

	//save to sales
	$saleRes = $sales->new_sales($customer, $type_desc, $laundry_rec, $amount);

	//remove
	$claimRes = $laundry->claim_laundry($id);

}//end isset

$laundry->Disconnect();