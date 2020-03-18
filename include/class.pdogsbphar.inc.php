<?php
/**
 * Classe d'accès aux données.

 * Utilise les services de la classe PDO
 * pour l'application GSB
 * Les attributs sont tous statiques,
 * les 4 premiers pour la connexion
 * $monPdo de type PDO
 * $monPdoGsb qui contiendra l'unique instance de la classe

 * @package default
 * @author Cheri Bibi
 * @version    1.0
 * @link       http://www.php.net/manual/fr/book.pdo.php
 */

class PdoGsb{
      	private static $serveur='mysql:host=localhost';
      	private static $bdd='dbname=GSBmobile';
      	private static $user='admin' ;
      	private static $mdp='admin' ;
		private static $monPdo;
		private static $monPdoGsb=null;
/**
 * Constructeur privé, crée l'instance de PDO qui sera sollicitée
 * pour toutes les méthodes de la classe
 */
	private function __construct(){
    	PdoGsb::$monPdo = new PDO(PdoGsb::$serveur.';'.PdoGsb::$bdd, PdoGsb::$user, PdoGsb::$mdp);
		PdoGsb::$monPdo->query("SET CHARACTER SET utf8");
	}
	public function _destruct(){
		PdoGsb::$monPdo = null;
	}
/**
 * Fonction statique qui crée l'unique instance de la classe

 * Appel : $instancePdoGsb = PdoGsb::getPdoGsb();

 * @return l'unique objet de la classe PdoGsb
 */
	public  static function getPdoGsb(){
		if(PdoGsb::$monPdoGsb==null){
			PdoGsb::$monPdoGsb= new PdoGsb();
		}
		return PdoGsb::$monPdoGsb;
	}

  public function LesMedicaments(){
    $req = "SELECT * FROM medicament ORDER BY nomCommercial ASC ";
    $res = PdoGsb::$monPdo->query($req);
    $lesLignes = $res->fetchAll();
    return $lesLignes;
  }

  public function acheterMedicament($idCommande, $idMedeciment, $quantite){
    $req = "INSERT INTO acheter (idCommande, idMedicament, quantite)
    values ('$idCommande, $idMedecicament, $quantite')";
  }


  public function faireCommande($motif, $bilan, $idMedecin){
    $req = "INSERT INTO commande (date, motif, bilan, idMedecin)
    values (now(), '$motif', '$bilan', '$idMedecin')";
    PdoGsb::$monPdo->exec($req);
  }

  public function LesMedecins(){
    $req = "SELECT * FROM medecin ORDER BY nom ASC";
    $res = PdoGsb::$monPdo->query($req);
    $lesLignes = $res->fetchAll();
    return $lesLignes;
  }

  public function LesCommandes($idMedecin){
    $req = "SELECT * FROM commande where idMedecin = '$idMedecin'";
    $res = PdoGsb::$monPdo->query($req);
    $lesLignes = $res->fetchAll();
    return $lesLignes;
  }

  public function faireAchat($idCommande, $idMedicament, $quantite){
    $req = "INSERT INTO acheter (idCommande, idMedicament, quantite)
    values ('$idCommande', '$idMedicament', '$quantite')";
    PdoGsb::$monPdo->query($req);
  }

  public function voirCommande($idMedecin){
    $req = "SELECT * from acheter, medicament, commande, medecin WHERE acheter.idCommande = commande.id
    and acheter.idMedicament = medicament.id
    and commande.idMedecin = medecin.id
    and commande.idMedecin = '$idMedecin'";
    $res = PdoGsb::$monPdo->query($req);
    $lesLignes = $res->fetchAll();
    return $lesLignes;
  }

  public function infoMedicament($idMedicament){
    $req = "SELECT * FROM medicament WHERE id = '$idMedicament'";
    $res = PdoGsb::$monPdo->query($req);
    $lesLignes = $res->fetchAll();
    return $lesLignes;
  }

  public function getidCommande(){
    $req = "SELECT id FROM commande ORDER BY id DESC LIMIT 1 ";
    $res = PdoGsb::$monPdo->query($req);
    $lesLignes = $res->fetchAll();
    return $lesLignes;
  }
}
