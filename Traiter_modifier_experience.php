<?php session_start();
require('connect_to_quest.php');
// On récupère l'identifiant de l'expérience via la méthode GET car il est
// nécessaire une fois les modifications effectuées pour revenir à la page d'accueil campagne.
$idExperience = $_GET['id'];

// Pour chacun des champs qu'il est possible de modifier, on vérifie si il est empty ou non
// Si un champs n'est pas empty, on effectue le changement dans la BDD.

if (!empty($_POST['description'])  and $_POST['description']!=" " )
{

    $desc=$_POST['description'];
    $requete=$BDD->prepare('UPDATE experience SET  exr_desc=? WHERE exr_id=? ');
    $requete->execute(array($desc,$idExperience));

}
if (!empty($_POST['nom']) )
{

    $nom=$_POST['nom'];
    $requete1=$BDD->prepare('UPDATE experience SET  exr_nom=? WHERE exr_id=? ');
    $requete1->execute(array($nom,$idExperience));

}
if (!empty($_POST['dateDebut']))
{

    $dateDeb=$_POST['dateDebut'];
    $requete2=$BDD->prepare('UPDATE experience SET  dateDeb=? WHERE exr_id=? ');
    $requete2->execute(array($dateDeb,$idExperience));

}
if (!empty($_POST['dateFin']))
{

    $dateFin=$_POST['dateFin'];
    $requete3=$BDD->prepare('UPDATE experience SET  dateFin=? WHERE exr_id=? ');
    $requete3->execute(array($dateFin,$idExperience));

}
header("Location:PageAcceuilExperience.php?id=$idExperience");
?>