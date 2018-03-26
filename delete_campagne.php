<?php
/**
 * Created by PhpStorm.
 * User: Maty
 * Date: 25/03/2018
 * Time: 15:09
 */
session_start();
require("connect_to_quest.php");
$idCampagne = $_GET['id'];
$stmt1 = $BDD->prepare('SELECT camp_exr FROM campagne WHERE camp_id=?');
$stmt1->execute(array($idCampagne));
while ($row = $stmt1->fetch()) {
    $idExperience = $row['camp_exr'];
}


$stmt = $BDD->prepare('DELETE FROM campagne WHERE camp_id=?');
$stmt->execute(array($idCampagne));
header("Location:PageAcceuilExperience.php?id=$idExperience");

