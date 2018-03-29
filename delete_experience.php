<?php

session_start();
require("connect_to_quest.php");

// on recupère l'identifiant de l'expérience :

$idExperience = $_GET['id'];

// On supprime l'expérience de la BDD :

$stmt = $BDD->prepare('DELETE FROM experience WHERE exr_id=?');
$stmt->execute(array($idExperience));

// On retourne sur la page d'accueil de l'expérimentateur :
header("Location:PageAcceuilEXP.php");