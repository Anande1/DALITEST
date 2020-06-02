<div class ="erreur">
<ul>
<?php 
foreach($_SESSION['erreurs'] as $erreur) // $_SESSION là où on peut enregistrer ttes les variables //
	{
      echo "<li>$erreur</li>";
	}
?>
</ul></div>