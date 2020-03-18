<div class="sommaire">
<?php
//Menu déroulant pour choisir le mois pour voir l'état Frais
    $mouths = array(
        '01' => 'janvier',
        '02' => 'fevrier',
        '03' => 'mars',
        '04' => 'avril',
        '05' => 'mai',
        '06' => 'juin',
        '07' => 'juillet',
        '08' => 'aout',
        '09' => 'septembre',
        '10' => 'octobre',
        '11' => 'novembre',
        '12' => 'decembre',
    );
?>
<br>
<h3 class="titre2">
    Fiche de frais du mois de
    <?php
    //Affiche les frais du mois grace au menu déroulant.
        foreach ($lesMois as $unMois) {
            $mois = $unMois['mois'];
        }
        echo $mouths[$mois].' '.$numAnnee;
    ?>
</h3>
<p>

    <!--Affiche l'état, la date de modification -->
    Etat : <?php echo $libEtat?> depuis le <?php echo $dateModif?>
</p>


<!--Affiche tous les elements forfaitisés-->
<table class="table">
    <thead class="thead-dark">
    <h4 class="titre3">Eléments forfaitisés</h4>
        <tr>
            <?php
            //Recupere le libelle inscrite dans la saisie des frais
            foreach ( $lesFraisForfait as $unFraisForfait )
            {
            $libelle = $unFraisForfait['libelle'];
            ?>
            <th> <?php echo $libelle?></th>
            <?php
            }
            ?>
        </tr>
        <tr>
            <?php
            //recupere la quantité inscrite dans la saisie des frais
            foreach (  $lesFraisForfait as $unFraisForfait  )
            {
            $quantite = $unFraisForfait['quantite'];
            ?>
            <td class="qteForfait"><?php echo $quantite?> </td>
            <?php
            }
            ?>
        </tr>
    </thead>
</table>

<!--Affiche les éléments hors forfaits-->
<div class="sommaire">
<table class="table">
    <thead class="thead-dark">
    <h4 class="titre2">Descriptif des éléments hors forfait</h4>
    <p><?php echo $nbJustificatifs ?> justificatifs reçus du mois de <?php echo $mouths[$numMois]?></p>
        <tr>
            <th class="date">Date</th>
            <th class="libelle">Libellé</th>
            <th class='montant'>Montant</th>
            <th class='paiement'>Paiement</th>
        </tr>
        <?php
        //Recupere la date, le libelle, le montant ainsi que le paiement
        foreach( $lesFraisHorsForfait as $unFraisHorsForfait)
        {
          $idpaiement = $unFraisHorsForfait['idpaiement'];

          foreach($lesModesDePaiements as $unModeDePaiement){
            if($unModeDePaiement['idPaiement'] == $idpaiement){
              $libellePaiement = $unModeDePaiement['modePaiement'];
            }elseif ($unModeDePaiement['idPaiement'] == NULL) {
              echo "";
            }
          }


            $libelle = $unFraisHorsForfait['libelle'];
            $date = $unFraisHorsForfait['date'];
            $montant = $unFraisHorsForfait['montant'];
            $id = $unFraisHorsForfait['id'];
            ?>
            <tr>
              <!--Affiche les valeurs sous le tableau créé plus haut -->
                <td> <?php echo $date; ?></td>
                <td><?php echo $libelle; ?></td>
                <td><?php echo $montant; ?> €</td>
                <td>
                    <?php

                        echo $libellePaiement;

                        ?>
                </td>
              </tr>
            </div>
              <?php

              }


              ?>
    </thead>
</table>
