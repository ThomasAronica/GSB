<?php
include("vues/v_sommaire.php");
$action = $_REQUEST['action'];
$idVisiteur = $_SESSION['idVisiteur'];

switch($action){
  case 'afficherModePaiement':{
    $ModesPaiements = $pdo->ModePaiement();


    break;

  }
  case 'supprimerModePaiement':{
    $idPaiement = $_REQUEST['idPaiement'];
    $supprimerPaiement = $pdo->supprimerModePaiement($idPaiement);
    $ModesPaiements = $pdo->ModePaiement();
    break;
  }
  case 'ajouterModePaiement':{
    $modePaiement = $_REQUEST['nomPaiement'];
    $ajouterPaiement = $pdo->ajouterModePaiement($modePaiement);
    $ModesPaiements = $pdo->ModePaiement();

    break;

  }


}
include("vues/v_modePaiement.php");
