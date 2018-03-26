<?php
/**
 * Created by PhpStorm.
 * User: Maty
 * Date: 25/03/2018
 * Time: 15:09
 */
session_start();
require("connect_to_quest.php");
$idquestio = $_GET['id'];
$stmt1 = $BDD->prepare('SELECT qutaire_camp FROM questaire WHERE qutaire_id=?');
$stmt1->execute(array($idquestio));
while ($row = $stmt1->fetch()) {
    $idCampagne = $row['qutaire_camp'];
}


$stmt = $BDD->prepare('DELETE FROM questaire WHERE qutaire_id=?');
$stmt->execute(array($idquestio));
header("Location:PageAcceuilCampagne.php?id=$idCampagne");

