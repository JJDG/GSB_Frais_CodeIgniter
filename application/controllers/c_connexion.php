<?php if ( !defined('BASEPATH')) exit ('No direct script access allowed');

class C_connexion extends CI_Controller{
	// On commence par inclure le modèle
	public function index(){
		//$this->load->library('session');
		$this->load->database();
		$this->load->model('modelgsb');
		$this->load->model('fctgsb');
		$this->load->library('form_validation');
		
		
		$data['title'] = "Intranet du Laboratoire Galaxy-Swiss Bourdin";
		$this->load->view('v_entete', $data);
		
		
		$this->form_validation->set_rules('login', 'Login', 'required');
		$this->form_validation->set_rules('mdp', 'Mot de passe', 'required');
		if($this->session->userdata('id') == null)
		{
			if ($this->form_validation->run() == TRUE){
				
				$login = $this->input->post('login');
				$mdp = $this->input->post('mdp');
				$verif = $this->modelgsb->getInfosVisiteur($login, $mdp);
				//echo 'sortie : '.$verif->id;
				
				if($verif->id == null){
					echo "Login ou mot de passe incorrect";
					$this->load->view('v_connexion');
				}
				
				else{
					//echo ' id : '.$verif['id'].' nom : '.$verif['nom'].' prenom : '.$verif['prenom'];
					$id = $verif->id;
					$nom = $verif->nom;
					$prenom = $verif->prenom;
					$this->fctgsb->connecter($id, $nom, $prenom);
					$this->load->view('v_sommaire');
					$this->load->view('v_accueil');
				}
				
			}
			
			else{
				$this->load->view('v_connexion');
			}
		}
		
		else {
			redirect('c_connexion/connecter', 'refresh');
			
		}
		

		
		$this->load->view('v_pied');
		
		
	}
	
	public function connecter(){
		$this->load->database();
		$this->load->model('modelgsb');
		$this->load->model('fctgsb');
		$this->load->library('form_validation');
		
		
		$data['title'] = "Intranet du Laboratoire Galaxy-Swiss Bourdin";
		$this->load->view('v_entete', $data);
		
		$this->load->view('v_sommaire');
		$this->load->view('v_accueil');
	}
	
	public function deconnecter(){
		$this->load->database();
		$this->load->model('modelgsb');
		$this->load->model('fctgsb');
		$this->load->library('form_validation');
		
		
		$data['title'] = "Intranet du Laboratoire Galaxy-Swiss Bourdin";
		$this->load->view('v_entete', $data);
		
		$this->fctgsb->deconnecter();
	}
	
}

/*End of file mycontroleur.php*/
/*
if(!isset($_REQUEST['action'])){
	$_REQUEST['action'] = 'demandeConnexion';
}
$action = $_REQUEST['action'];
switch($action){
	case 'demandeConnexion':{
		include("vues/v_connexion.php");
		break;
	}
	case 'valideConnexion':{
		$login = $_REQUEST['login'];
		$mdp = $_REQUEST['mdp'];
		$visiteur = $pdo->getInfosVisiteur($login,$mdp);
		if(!is_array( $visiteur)){
			ajouterErreur("Login ou mot de passe incorrect");
			include("vues/v_erreurs.php");
			include("vues/v_connexion.php");
		}
		else{
			$id = $visiteur['id'];
			$nom =  $visiteur['nom'];
			$prenom = $visiteur['prenom'];
			connecter($id,$nom,$prenom);
			include("vues/v_sommaire.php");
		}
		break;
	}
	default :{
		include("vues/v_connexion.php");
		break;
	}
}
*/
