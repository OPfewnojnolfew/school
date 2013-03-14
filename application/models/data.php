<?php 
/**
 */
class Data extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	
	public function getInfo()
	{
		return array(1,2,3,4);
	}
}