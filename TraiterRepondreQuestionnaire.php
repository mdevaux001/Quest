<?php

session_start();

require_once 'connect_to_quest.php';
require_once 'scoring.php';

if(isset($_SESSION['idUSER']))
    $idUSER = $_SESSION['idUSER'];
else
    echo "Utilisateur non connecté.";

if(isset($_GET['qutaire']))
    $code = $_GET['qutaire'];
else
    echo "Questionnaire indisponible.";

$quest_contient = $BDD->prepare("SELECT * FROM contient WHERE qutaire=?");
$quest_contient->execute(array($code));

while($ligne=$quest_contient->fetch())
{
    $quest = $ligne['quest'];
    $type = $ligne['qutaire_type'];
    $valeur = $_POST[$quest];

    $insert_rep = $BDD->prepare("INSERT INTO reponse VALUES (:usr, :qutaire, :quest, :valeur)");

    $insert_rep->bindValue(":usr", $idUSER, PDO::PARAM_INT);
    $insert_rep->bindValue(":qutaire", $code, PDO::PARAM_INT);
    $insert_rep->bindValue(":quest", $quest, PDO::PARAM_INT);
    $insert_rep->bindValue(":valeur", CalculerScore($quest,$valeur, $type), PDO::PARAM_INT);

    $insert_rep->execute();
}

