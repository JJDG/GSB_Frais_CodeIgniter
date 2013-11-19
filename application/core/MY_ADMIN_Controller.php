<?php
if (!defined('BASEPATH')){
	exit('No direct script access allowed');
}

class MY_ADMIN_Controller extends MY_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('connexion_model');
		$this->load->library('session');
		
		// TRUE permet de passer les variables au filtre XSS
		// (cross-site scripting : injection de contenu dans une page web)
		if ($this->input->post('identifiant', TRUE) && $this->input->post('password', TRUE)){
			
			$id = $this->input->post('identifiant');
			$pass = $this->input->post('password');
			if($this->user_model->validate($id, $pass)){
				//Tout est ok, on enregistre l'identifiant dans les variable de session et on poursuit
				$this->session->set_userdata('visiteur', $id);
			}
			else{
				//Mauvais identifiant et pas de session déjà enregistrée, on redirige vers la page de connexion (par le controleur Connexion_c)
				if(!$this->session->userdata('visiteur')){
					redirect("connexion_c/connexion");
				}
			}
		}
		else{
			if(!$this->session->userdata('visiteur')){
				redirect("connexion_c/connexion");
			}
		}
	}	
}