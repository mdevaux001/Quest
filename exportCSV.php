<?php

require_once 'connect_to_quest.php';

header("Content-Type: text/plain");
header("Content-disposition: attachment; filename=reponse.csv");

$code = $_GET['id'];
$stmt1 = $BDD->prepare('SELECT qutaire_camp FROM questaire WHERE qutaire_id=?');
$stmt1->execute(array($code));
while ($row = $stmt1->fetch()) {
    $campagne = $row['qutaire_camp'];
}

if (!empty($campagne)) { //Téléchargement de tous les questionnaires d'une campagne
    $select_campagne = $BDD->prepare('SELECT camp_nom FROM campagne WHERE camp_id=?');
    $select_campagne->execute(array($campagne));

    $nomCampagne = $select_campagne->fetch();
    echo $nomCampagne['camp_nom'] . ";\n";

    $select_qutaire = $BDD->prepare('SELECT * FROM questaire WHERE qutaire_camp=?');
    $select_qutaire->execute(array($campagne));
} else { //Téléchargement d'un unique questionnaire
    $select_qutaire = $BDD->prepare('SELECT * FROM questaire WHERE qutaire_id=?');
    $select_qutaire->execute(array($code));
}

if ($select_qutaire->rowCount() >= 1) {
    //Titre
    while ($questaire = $select_qutaire->fetch()) {
        echo $questaire['qutaire_id'] . " : " . $questaire['qutaire_titre'] . "\n";

        //Questions
        echo "Intitulés :;";

        $select_quest = $BDD->prepare("SELECT quest FROM contient WHERE qutaire=?");
        $select_quest->execute(array($questaire["qutaire_id"]));

        while ($question = $select_quest->fetch()) {
            $select_text = $BDD->prepare("SELECT quest_text FROM question WHERE quest_id=?");
            $select_text->execute(array($question['quest']));

            while ($text = $select_text->fetch()) {
                echo $question['quest'] . ":" . $text['quest_text'] . ";";
            }
        }

        echo "\n";

        //Réponses
        $select_usr = $BDD->prepare('SELECT usr FROM reponse GROUP BY qutaire HAVING qutaire=?  ');
        $select_usr->execute((array($questaire['qutaire_id'])));

        while ($user = $select_usr->fetch()) {
            echo $user['usr'] . ';';

            $select_rep = $BDD->prepare("SELECT valeur FROM reponse WHERE usr=? AND qutaire=?");
            $select_rep->execute(array($user['usr'],$questaire['qutaire_id']));

            while ($valeur = $select_rep->fetch()) {
                echo $valeur['valeur'] . ";";
            }

            echo "\n";
        }

        echo "\n";
    }
}








