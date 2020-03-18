<!--<table class="table">
    <thead class="thead-dark">
        <tr>
          Tableau sur l'affichage
            <th scope="col">Nom</th>
            <th scope="col">Prix</th>
            <th scope="col">Composition</th>
        </tr>
    </thead>
    <tbody>-->





<h2><center>Médicaments disponibles: </h2></center>
    <div class="container">
      <div class="jumbotron">
        <!--<div class="container">-->
    <div class="row">
<?php
//Boucle affichant les moyens de paiements
foreach($Medicaments as $Medicament) {
  $nomMedicament = $Medicament['nomCommercial'];
  $prixMedicament = $Medicament['prix'];
  $compMedicament = $Medicament['composition'];
  $idMedicament = $Medicament['id'];



  ?>


              <div class="col-md-3 col-lg-4 B h-50 pb-5">
              <center><a href='index.php?uc=medicament&action=voirInfo&idMedicament=<?php echo $idMedicament ?>'><?php echo $nomMedicament ."</center></a>";
             echo "<center>" . $prixMedicament ."€</center>";
            //  echo "<br>" .$compMedicament;
              //  $prixMedicament . "€";
              //  $compMedicament;?>

            </div>













<?php
}
?>
</div>

</tbody>
</table>
