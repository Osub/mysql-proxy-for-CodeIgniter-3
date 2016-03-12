<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * For demo purpose only
 */
class Read extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		
	}

	public function index()
	{	
		$a = rand();
		$t = time();
		$sql_s_b = 'SELECT * FROM `s` where 1 limit 1';
		var_dump($this->db->query($sql_s_b)->result_array());
		$sql_s_a = 'SELECT * FROM `s` where 1 limit 1';
		$sql = "INSERT INTO `s`(`1`, `2`, `3`, `4`) VALUES ($a,2,3,$t)";
		$this->db->query($sql);
		var_dump($this->db->query($sql_s_a)->result_array());
		//echo 123;
	}
}
