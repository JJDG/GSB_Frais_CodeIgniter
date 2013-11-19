
<table class="listeLegere">
  	   <caption>Descriptif des éléments hors forfait
       </caption>
             <tr>
                <th class="date">Date</th>
				<th class="libelle">Libellé</th>  
                <th class="montant">Montant</th>  
                <th class="action">&nbsp;</th>              
             </tr>
          
    <?php    
	    foreach( $lesFraisHorsForfait as $unFraisHorsForfait) 
		{
			$libelle = $unFraisHorsForfait['libelle'];
			$date = $unFraisHorsForfait['date'];
			$montant=$unFraisHorsForfait['montant'];
			$id = $unFraisHorsForfait['id'];
	?>		
            <tr>
                <td> <?php echo $date ?></td>
                <td><?php echo $libelle ?></td>
                <td><?php echo $montant ?></td>
                <td><a href="index.php?uc=gererFrais&action=supprimerFrais&idFrais=<?php echo $id ?>" 
				onclick="return confirm('Voulez-vous vraiment supprimer ce frais?');">Supprimer ce frais</a></td>
             </tr>
	<?php		 
          
          }
		  
          ?>
    </table>
    <?php 
      echo form_open();
      echo'<div class="corpsForm">';
          echo form_fieldset('Nouvel élément hors forfait');

            echo'<p>';
              echo form_label('Date (jj/mm/aaaa): ', 'txtDateHF');
              $data = array (
              		'name' => 'dateFrais',
              		'id' =>'txtDateHF',
              		'size'=>'10',
              		'maxlength'=>'10',
              		'value'=> '',
              );
              echo form_input($data);
            echo'</p>';
            echo'<p>';
              echo form_label('Libellé', 'txtLibelleHF');
              $data = array (
              		'name' => 'libelle',
              		'id' =>'txtLibelleHF',
              		'size'=>'70',
              		'maxlength'=>'256',
              		'value'=> '',
              );
              echo form_input($data);
            echo'</p>';
            echo'<p>';
              echo form_label('Montant : ', 'txtMontantHF');
              $data = array (
              		'name' => 'montant',
              		'id' =>'txtMontantHF',
              		'size'=>'10',
              		'maxlength'=>'10',
              		'value'=> '',
              );
              echo form_input($data);
              
              $data = array (
              		'action' => 'validerCreationFrais'
              );
              echo form_hidden($data);
            echo'</p>';
          echo form_fieldset_close();
      echo'</div>';
       echo'<div class="piedForm">';
      	echo'<p>';
      		echo form_submit('ajouter','Ajouter');
      		echo form_reset('effacer','Effacer');
        
      	echo'</p>'; 
      echo'</div>';
      echo form_close();
  echo'</div>';
  ?>

