<div class="container">
  <div class="jumbotron">
    <div class="container">
<?php
foreach($Informations as $Information){
  $nomMedicament = $Information['nomCommercial'];
  $prixMedicament = $Information['prix'];
  $compoMedicament = $Information['composition'];
  $effetMedicament = $Information['effets'];
  $contreindicMedicament = $Information['contreIndications'];



  echo "<h2><U><center>".$nomMedicament."</center></U></h2><br>";
  echo "<h3><center>Prix: ".$prixMedicament."€</center></h3>";
  echo "<h3><center>Composition: ".$compoMedicament."</center></h3>";
  echo "<h3><center>Effets: ".$effetMedicament."</center></h3>";
  echo "<h3><center>Contre Indications: ".$contreindicMedicament."</center></h3>";
}

 ?>

<center><a style="margin-top: 2rem;" href="http://192.168.43.215/GSB_e-com/index.php?uc=medicament&action=voirMedicament" class="btn btn-primary btn-lg" role="button">Retour</a></center>
nik zlib_get_coding_type