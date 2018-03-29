<?php

session_start();
require("connect_to_quest.php");
// On recupère l'id du questionnaire pour aller chercher l'id de la campagne dans la BDD :

$idquestio = $_GET['id'];

// On recupère l'id de la campagne dans la BDD grâce à l'id du questionnaire :

$stmt1 = $BDD->prepare('SELECT qutaire_camp FROM questaire WHERE qutaire_id=?');
$stmt1->execute(array($idquestio));
while ($row = $stmt1->fetch()) {
    $idCampagne = $row['qutaire_camp'];
}

// On supprime le questionnaire de la BDD :

$stmt = $BDD->prepare('DELETE FROM questaire WHERE qutaire_id=?');
$stmt->execute(array($idquestio));

//on retourne sur la page d'accueil de la campagne grâce à l'id campagne recupéré :

header("Location:PageAcceuilCampagne.php?id=$idCampagne");

