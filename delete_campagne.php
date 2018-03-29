<?php

session_start();
require("connect_to_quest.php");
// on recupère l'identifiant de la campagne
$idCampagne = $_GET['id'];

// grâce à l'id de la campagne, on retrouve l'id de l'expérience

$stmt1 = $BDD->prepare('SELECT camp_exr FROM campagne WHERE camp_id=?');
$stmt1->execute(array($idCampagne));
while ($row = $stmt1->fetch()) {
    $idExperience = $row['camp_exr'];
}

// On supprime les données de la BDD :

$stmt = $BDD->prepare('DELETE FROM campagne WHERE camp_id=?');
$stmt->execute(array($idCampagne));

// On redirige vers la page d'accueil campagne grâce à l'id expérience
// recupéré dans la BDD :

header("Location:PageAcceuilExperience.php?id=$idExperience");

