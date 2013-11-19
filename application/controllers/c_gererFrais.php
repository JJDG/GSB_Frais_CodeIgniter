<?php 
class C_gererFrais extends CI_Controller{
	public function index(){
		//$this->load->library('session');
		$this->load->database();
		$this->load->model('modelgsb');
		$this->load->model('fctgsb');
		$this->load->library('form_validation');
		$this->load->library('calendar');
		
		$data['title'] = "Intranet du Laboratoire Galaxy-Swiss Bourdin";
		$this->load->view('v_entete', $data);
		$this->load->view('v_sommaire');
		$idVisiteur = $this->session->userdata('id');
		
		$mois = $this->fctgsb->getMois(date("d/m/Y"));
		$numAnnee = substr( $mois,0,4);
		$numMois = substr( $mois,4,2);
		
		if(!isset($_REQUEST['action'])){$action = 'saisirFrais';}
		else{$action = $this->input->post('action');} //$action = $_REQUEST['action'];
		echo 'ici action : '.$action;
		switch($action){
			case 'saisirFrais':{
				if($this->modelgsb->estPremierFraisMois($idVisiteur,$mois)){
					$this->modelgsb->creeNouvellesLignesFrais($idVisiteur,$mois);
				}
				break;
			}
			case 'validerMajFraisForfait':{
				$lesFrais = $_REQUEST['lesFrais'];
				if($this->fctgsb->lesQteFraisValides($lesFrais)){
					$this->modelgsb->majFraisForfait($idVisiteur,$mois,$lesFrais);
				}
				else{
					$this->fctgsb->ajouterErreur("Les valeurs des frais doivent être numériques");
					$this->load->view('v_erreurs');
				}
				break;
			}
			case 'validerCreationFrais':{
				$dateFrais = $_REQUEST['dateFrais'];
				$libelle = $_REQUEST['libelle'];
				$montant = $_REQUEST['montant'];
				valideInfosFrais($dateFrais,$libelle,$montant);
				if (nbErreurs() != 0 ){
					include("vues/v_erreurs.php");
				}
				else{
					$this->modelgsb->creeNouveauFraisHorsForfait($idVisiteur,$mois,$libelle,$dateFrais,$montant);
				}
				break;
			}
			case 'supprimerFrais':{
				$idFrais = $_REQUEST['idFrais'];
				$this->modelgsb->supprimerFraisHorsForfait($idFrais);
				break;
			}
		}
		$lesFraisHorsForfait = $this->modelgsb->getLesFraisHorsForfait($idVisiteur,$mois);
		$lesFraisForfait= $this->modelgsb->getLesFraisForfait($idVisiteur,$mois);
		
		
		$data['numMois'] = $numMois;
		$data['numAnnee'] = $numAnnee;
		$data['lesFraisForfait'] = $lesFraisForfait;
		
		$data['lesFraisHorsForfait'] = $lesFraisHorsForfait;
		
		$this->load->view('v_listeFraisForfait', $data);
		$this->load->view('v_listeFraisHorsForfait');
	}
	
	public function saisirFrais(){
		
	}
	
	public function validerMajFraisForfait(){
	
	}
	
	public function validerCreationFrais(){
		
	}
	
	public function supprimerFrais(){
		
	}
}

/*
include("vues/v_sommaire.php");
$idVisiteur = $_SESSION['idVisiteur'];
$mois = getMois(date("d/m/Y"));
$numAnnee =substr( $mois,0,4);
$numMois =substr( $mois,4,2);
$action = $_REQUEST['action'];
switch($action){
	case 'saisirFrais':{
		if($pdo->estPremierFraisMois($idVisiteur,$mois)){
			$pdo->creeNouvellesLignesFrais($idVisiteur,$mois);
		}
		break;
	}
	case 'validerMajFraisForfait':{
		$lesFrais = $_REQUEST['lesFrais'];
		if(lesQteFraisValides($lesFrais)){
	  	 	$pdo->majFraisForfait($idVisiteur,$mois,$lesFrais);
		}
		else{
			ajouterErreur("Les valeurs des frais doivent être numériques");
			include("vues/v_erreurs.php");
		}
	  break;
	}
	case 'validerCreationFrais':{
		$dateFrais = $_REQUEST['dateFrais'];
		$libelle = $_REQUEST['libelle'];
		$montant = $_REQUEST['montant'];
		valideInfosFrais($dateFrais,$libelle,$montant);
		if (nbErreurs() != 0 ){
			include("vues/v_erreurs.php");
		}
		else{
			$pdo->creeNouveauFraisHorsForfait($idVisiteur,$mois,$libelle,$dateFrais,$montant);
		}
		break;
	}
	case 'supprimerFrais':{
		$idFrais = $_REQUEST['idFrais'];
	    $pdo->supprimerFraisHorsForfait($idFrais);
		break;
	}
}
$lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteur,$mois);
$lesFraisForfait= $pdo->getLesFraisForfait($idVisiteur,$mois);
include("vues/v_listeFraisForfait.php");
include("vues/v_listeFraisHorsForfait.php");

?> */