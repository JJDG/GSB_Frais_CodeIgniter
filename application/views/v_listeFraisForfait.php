<?php 

echo'<div id="contenu">';
echo      '<h2>Renseigner ma fiche de frais du mois';echo $numMois."-".$numAnnee.'</h2>';
         
      echo form_open();
      
      echo'<div class="corpsForm">';
          echo form_fieldset('Eléments forfaitisés');
          
			
				foreach ($lesFraisForfait as $unFrais)
				{
					$idFrais = $unFrais['idfrais'];
					$libelle = $unFrais['libelle'];
					$quantite = $unFrais['quantite'];
			
					echo'<p>';
						echo form_label($libelle, 'idFrais');
						$data = array (
									'name' => 'lesFrais['.$idFrais.']',
									'id' =>'idFrais',
									'size'=>'10',
									'maxlength'=>'5',
									'value'=> $quantite,
						);
						echo form_input($data);
						$data = array (
								'action' => 'validerMajFraisForfait'
						);
						echo form_hidden($data);
					echo'</p>';
			
			
				}
			
           echo form_fieldset_close();
      echo'</div>';
       echo'<div class="piedForm">';
      	echo'<p>';
      		echo form_submit('ok','Valider');
      		echo form_reset('annuler','Effacer');
        
      	echo'</p>'; 
      echo'</div>';
      echo form_close();
?>