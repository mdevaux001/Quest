<?php session_start();
require("connect_to_quest.php");

if ( !empty($_POST['mdp'])and !empty($_POST['mail']) and  !empty($_POST['orga']))
{
	
	$mdp=$_POST['mdp'];
	$mail=$_POST['mail'];
	$orga=$_POST['orga'];
	
    $characts = '1234567890';
	
	$id = ''; 
	for($i=0;$i < 6;$i++) 
	 { $id .= substr($characts,rand()%(strlen($characts)),1); }

    $_SESSION['idUSER']=$id;

	$requete=$BDD->prepare('INSERT INTO user(usr_id,usr_mdp,usr_mail,usr_org) VALUES(:id,:mdp,:mail,:orga)');
	
	$requete->bindValue(':id', $id, PDO::PARAM_STR); 
	$requete->bindValue(':mdp', $mdp, PDO::PARAM_STR);  
	$requete->bindValue(':mail', $mail, PDO::PARAM_STR);
	$requete->bindValue(':orga', $orga, PDO::PARAM_STR);
	
	
	
//On exécute la requête
	$requete->execute();
    $_SESSION['connecte'] = true;
    $_SESSION['validationUSER'] =true;
    header("Location: PageAccueilUSER.php");
}
?>