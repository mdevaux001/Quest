<?php session_start();



require('connect_to_quest.php');

//On verifie que tous les champs du form ont été complétés

if (!empty($_POST['description']) and !empty($_POST['dateDebut'])and !empty($_POST['dateFin']) and !empty($_POST['nom']))
{
    // On récupère toutes les données :

	$nom=$_POST['nom'];
	$desc=$_POST['description'];
	$dateDeb=$_POST['dateDebut'];
	$dateFin=$_POST['dateFin'];

    // On crée un identifiant à 4 chiffres, en verifant grâce à une boucle qu'il  n'exite pas déjà :


    $characts = '1234567890';
    $doublon = true;
    while ($doublon) {
        $idEXP = '';
        for ($i = 0; $i < 4; $i++) {
            $id .= substr($characts, rand() % (strlen($characts)), 1);
        }
        $chercher_doublon = $BDD->prepare('SELECT exr_id FROM experience WHERE exr_id=?');
        $chercher_doublon->execute(array($id));
        if ($chercher_doublon->rowCount() == 0) {

            $doublon = false;
        }
    }


    // On prépare la requête pour insérer les données dans la table expérience :

	$requete=$BDD->prepare('INSERT INTO experience(exr_id,exr_nom,exr_desc,dateDeb,dateFin) VALUES(:id,:nom,:description,:dateDebut,:dateFin)');
	

	$requete->bindValue(':id', $id, PDO::PARAM_STR);
	$requete->bindValue(':nom', $nom, PDO::PARAM_STR);  
	$requete->bindValue(':description', $desc, PDO::PARAM_STR);
	$requete->bindValue(':dateDebut', $dateDeb, PDO::PARAM_STR);
	$requete->bindValue(':dateFin', $dateFin, PDO::PARAM_STR);

	//On exécute la requête
    $requete->execute();
// On prépare la requête pour insérer les données dans la table lancer :

	$requete_deux=$BDD->prepare('INSERT INTO lancer(exp,exr) VALUES(:exp,:exr)');
	$requete_deux->bindValue(':exp',$_SESSION['idEXP'],PDO::PARAM_STR);
	$requete_deux->bindValue(':exr',$id,PDO::PARAM_STR); 

//On exécute la requête
	$requete_deux->execute();
	header("Location: PageAcceuilEXP.php");
}
?>