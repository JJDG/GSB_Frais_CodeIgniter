    <!-- Division pour le sommaire -->
    <div id="menuGauche">
     <div id="infosUtil">
    
        <h2>
    
</h2>
    
      </div>
      <?php 

      $list = array(
      		'Visiteur :'.br(1), 
      		$this->session->userdata('prenom')." ".$this->session->userdata('nom'),
				//echo $_SESSION['prenom']."  ".$_SESSION['nom']
				
      		anchor('c_gererFrais', 'Saisie de fiche de frais'),
      		anchor('c_etatFrais', 'Mes fiches de frais'),
      		
      		anchor('c_connexion/deconnecter', 'Déconnexion')
      		
      );
      
      $attributes = array(
      		'id'    => 'menuList'
      );
      
      echo ul($list, $attributes);
      

				
				
				  ?>
			
        
    </div>
    