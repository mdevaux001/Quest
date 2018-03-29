<?php session_start();
// On récupère l'identifiant questionnaire, pour pouvoir retourner sur la page d'accueil
// du questionnaire.
$idquestio = $_GET['id'];



// Pour chacun des champs qu'il est possible de modifier, on vérifie si il est empty ou non
// Si un champs n'est pas empty, on effectue le changement dans la BDD.



if (!empty($_POST['description'])  and $_POST['description']!=" " )
{

    $desc=$_POST['description'];
    $requete=$BDD->prepare('UPDATE questaire SET  qutaire_desc=? WHERE qutaire_id=? ');
    $requete->execute(array($desc,$idquestio));

}
if (!empty($_POST['nom']) )
{

    $nom=$_POST['nom'];
    $requete1=$BDD->prepare('UPDATE questaire SET  qutaire_titre=? WHERE qutaire_id=? ');
    $requete1->execute(array($nom,$idquestio));

}

header("Location:AccueilQuestio.php?id=$idquestio");
?>