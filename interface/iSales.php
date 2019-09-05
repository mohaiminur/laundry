<?php 
interface iSales{
	public function new_sales($customer, $type_desc, $laundry_rec, $amount);	
	public function daily_sales($date);
}//end iSales