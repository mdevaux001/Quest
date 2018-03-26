<?php session_start();
require('connect_to_quest.php');
$idCampagne = $_GET['id'];

while ($row = $stmt1->fetch()) {
    $idExperience = $row['camp_exr'];
}



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