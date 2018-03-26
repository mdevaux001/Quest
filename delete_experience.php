<?php
/**
 * Created by PhpStorm.
 * User: Maty
 * Date: 25/03/2018
 * Time: 15:09
 */
session_start();
require("connect_to_quest.php");
$idExperience = $_GET['id'];

$stmt = $BDD->prepare('DELETE FROM experience WHERE exr_id=?');
$stmt->execute(array($idExperience));

header("Location:PageAcceuilEXP.php");