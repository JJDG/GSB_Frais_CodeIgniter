<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class MY_controller extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
	}
	
	
	function generer_affichage($data){
		$this->load->view('template', $data);
	}
	
}