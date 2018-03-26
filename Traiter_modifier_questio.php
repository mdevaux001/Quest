<?php session_start();
require('connect_to_quest.php');
$idquestio = $_GET['id'];
$stmt1 = $BDD->prepare('SELECT qutaire_camp FROM questaire WHERE qutaire_id=?');
$stmt1->execute(array($idquestio));
while ($row = $stmt1->fetch()) {
    $idCampagne = $row['qutaire_camp'];
}





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

header("Location:AccueilQuestio.php?id=$idCampagne");
?>