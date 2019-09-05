<?php
require_once('../database/Database.php');
require_once('../interface/iLaundry.php');
class Laundry extends Database implements iLaundry {

	public function insert_laundry($type, $price)
	{
		$sql = "INSERT INTO laundry_type (laun_type_desc, laun_type_price)
				VALUES(?,?)";
		return $this->insertRow($sql, [$type, $price]);
	}//end insert_laundry

	public function get_all_laundry()
	{
		$sql = "SELECT *
				FROM laundry_type
				ORDER BY laun_type_desc ASC";
		return $this->getRows($sql);
	}//end get_all_laundry

	public function get_type($type_id)
	{
		$sql = "SELECT * 
				FROM laundry_type
				WHERE laun_type_id = ?";
		return $this->getRow($sql, [$type_id]);
	}//end get_type

	public function edit_type($type_id, $type, $price)
	{
		$sql = "UPDATE laundry_type
				SET laun_type_desc = ?, laun_type_price = ?
				WHERE laun_type_id = ?";
		return $this->updateRow($sql, [$type, $price, $type_id]);
	}//end edit_type

	public function all_laundry()
	{
		$claimed = 0;//zero means wala pa
		$sql = "SELECT *
				FROM laundry l
				INNER JOIN laundry_type lt
				ON l.laun_type_id = lt.laun_type_id
				WHERE l.laun_claimed = ?
				ORDER BY customer_name ASC";
		return $this->getRows($sql, [$claimed]);
	}//end all_laundry

	public function new_laundry($customer, $priority, $weight, $type)
	{
		$sql = "INSERT INTO laundry(customer_name, laun_priority, laun_weight, laun_type_id)
				VALUES(?,?,?,?);";
		return $this->insertRow($sql, [$customer, $priority, $weight, $type]);
	}//end new_laundry

	public function delete_laundry($laun_id)
	{
		$sql = "DELETE FROM laundry
				WHERE laun_id = ?";
		return $this->deleteRow($sql, [$laun_id]);
	}//end delete_laundry

	public function get_laundry($laun_id)
	{
		$sql = "SELECT *
				FROM laundry
				WHERE laun_id = ?";
		return $this->getRow($sql, [$laun_id]);
	}//end get_laundry

	public function edit_laundry($laun_id, $customer, $priority, $weight, $type)
	{
		$sql = "UPDATE laundry 
				SET customer_name = ?, laun_priority = ?, laun_weight = ?, laun_type_id = ?
				WHERE laun_id = ?";
		return $this->updateRow($sql, [$customer, $priority, $weight, $type, $laun_id]);
	}//end edit_laundry

	public function get_laundry2($laun_id)
	{
		$sql = "SELECT *
				FROM laundry l 
				INNER JOIN laundry_type lt 
				ON l.laun_type_id = lt.laun_type_id
				WHERE l.laun_id = ?";
		return $this->getRow($sql, [$laun_id]);
	}//end get_laundry

	public function claim_laundry($laun_id)
	{
		$claimed = 1;//1 means ge claim na.. dili na e display sa table laundry
		$sql = "UPDATE laundry 
				SET laun_claimed = ?
				WHERE laun_id = ?";
		return $this->updateRow($sql, [$claimed, $laun_id]);
	}//end claim_laundry
}//end class
$laundry = new Laundry();
/* End of file Laundry.php */
/* Location: .//D/xampp/htdocs/laundry/class/Laundry.php */