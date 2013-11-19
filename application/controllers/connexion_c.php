<?php
if ( !defined('BASEPATH')) exit ('No direct script access allowed');

class Connexion_c extends MY_ADMIN_Controller{
	public function index(){
		$this->load->database();
		$this->load->model('connexion_model');
		
		$data['title'] = "Intranet du Laboratoire Galaxy-Swiss Bourdin";
		
		$data['menu'] = 'menu';
		$data['content'] = 'formConnect';
		$this->generer_affichage($data);
	}
}
?>