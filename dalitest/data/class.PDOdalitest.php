<?php
/** 
 * Classe d'accès aux données. 
 
 * Utilise les services de la classe PDO
 * pour l'application dalitest
 * Les attributs sont tous statiques,
 * les 4 premiers pour la connexion
 * $monPdo de type PDO 
 * $monPdoDalitest qui contiendra l'unique instance de la classe
 *
 * @package default
 * @author Anande
 * @version    1.0
 * @link       http://www.php.net/manual/fr/book.pdo.php
 */

class PdoDalitest
{   		
      	private static $serveur='mysql:host=localhost';
      	private static $bdd='dbname=dalitest';   		
      	private static $user='root' ;    		
      	private static $mdp='' ;	
		private static $monPdo;
		private static $monPdoDalitest = null;
		
		
/**
 * Constructeur privé, crée l'instance de PDO qui sera sollicitée
 * pour toutes les méthodes de la classe
 */				
	private function __construct()
	{
        self::$monPdo = new PDO(self::$serveur.';'.self::$bdd, self::$user, self::$mdp); 
        self::$monPdo->query("SET CHARACTER SET utf8");
	}
	public function _destruct(){
		self::$monPdo = null;
	}
/**
 * Fonction statique qui crée l'unique instance de la classe
 *
 * Appel : $instancePdoDalitest = self::getPdoDalitest();
 * @return l'unique objet de la classe PdoDalitest
 */
	public  static function getPdoDalitest()
	{
		if(self::$monPdoDalitest == null)
		{
			self::$monPdoDalitest = new PdoDalitest();
		}
		return self::$monPdoDalitest;  
	}     

/**
 * Ajoute un membre
 *
 * @return si la requête s'est bien effectuée
*/
public function ajouterMembre($nom, $prenom, $mail){
    $req = "insert into membres(nom, prenom, mail) values('$nom', '$prenom', '$mail')";
	$res = self::$monPdo->exec($req);
	return $res;
}

}


?>