<?php session_start();
require('connect_to_quest.php');
// On récupère l'identifiant de la campagne via la méthode GET car il est
// nécessaire une fois les modifications effectuées pour revenir à la page d'accueil campagne.
$idCampagne = $_GET['id'];


// Pour chacun des champs qu'il est possible de modifier, on vérifie si il est empty ou non
// Si un champs n'est pas empty, on effectue le changement dans la BDD.


if (!empty($_POST['description'])  and $_POST['description']!=" " )
{

    $desc=$_POST['description'];
    $requete=$BDD->prepare('UPDATE campagne SET  camp_desc=? WHERE camp_id=? ');
    $requete->execute(array($desc,$idCampagne));

}
if (!empty($_POST['nom']) )
{

    $nom=$_POST['nom'];
    $requete1=$BDD->prepare('UPDATE campagne SET  camp_nom=? WHERE camp_id=? ');
    $requete1->execute(array($nom,$idCampagne));

}
if (!empty($_POST['dateDebut']))
{

    $dateDeb=$_POST['dateDebut'];
    $requete2=$BDD->prepare('UPDATE campagne SET  camp_deb=? WHERE camp_id=? ');
    $requete2->execute(array($dateDeb,$idCampagne));

}
if (!empty($_POST['dateFin']))
{

    $dateFin=$_POST['dateFin'];
    $requete3=$BDD->prepare('UPDATE campagne SET  camp_fin=? WHERE camp_id=? ');
    $requete3->execute(array($dateFin,$idCampagne));

}

header("Location:PageAcceuilCampagne.php?id=$idCampagne");
?>