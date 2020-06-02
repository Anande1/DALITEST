<?php
if(!isset($_REQUEST['action']))
    $_REQUEST['action'] = 'inscription';

$action = $_REQUEST['action'];
$_SESSION['erreurs']=array(); // transformation de la variable en tableau //
switch ($action)
{
    case 'inscription' :
        include("vues/v_inscription.php");
        break;
    
    case 'validation' : // quand l'utilisateur a saisit ses infos //
        $nom= $_REQUEST ['nom'];
        $prenom= $_REQUEST['prenom'];
        $mail= $_REQUEST['mail'];
        $ok=true;     // pour dire que par la suite si on à l'inverse c'est faux //
        if($nom==""){  // si le champ  est vide, on passe au message d'erreur//

            $ok=false;
            $_SESSION['erreurs'][]= "Le champ Nom n'est pas saisit"; // c'est 1 tableau de tableau //
         }

        if($prenom==""){
            $ok=false;
            $_SESSION['erreurs'][]= "Le champ Prénom n'est pas saisit";
        }
           
        if($mail==""){
            $ok=false;
            $_SESSION['erreurs'][]= "Le champ Mail n'est pas valide";
        }
       if ($ok==false){
            include("vues/v_inscription.php"); 
            include("vues/v_erreurs.php");
       }
        else{
            $pdo->ajouterMembre($nom, $prenom, $mail);
            include("vues/v_lesite.php"); // sinon dire que c'est vers la page du site//
        }

        
        

}