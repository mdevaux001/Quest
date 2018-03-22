<?php

require_once 'connect_to_quest.php';

header("Content-Type: text/plain");
header("Content-disposition: attachment; filename=reponse.csv");

$code = 12664732;

$select_qutaire = $BDD->prepare('SELECT * FROM questaire WHERE qutaire_id=?');
$select_qutaire->execute(array($code));

if ($select_qutaire->rowCount() == 1)
{
    //Titre
    while ($questaire = $select_qutaire->fetch())
    {
        echo $questaire['qutaire_id'] . " : " . $questaire['qutaire_titre'] . "\n";
    }

    //Questions

    echo "Intitulés :;";

    $select_quest = $BDD->prepare("SELECT quest FROM contient WHERE qutaire=?");
    $select_quest->execute(array($code));

    while ($question = $select_quest->fetch())
    {
        $select_text = $BDD->prepare("SELECT quest_text FROM question WHERE quest_id=?");
        $select_text->execute(array($question['quest']));

        while($text = $select_text->fetch())
        {
            echo $question['quest'] . ":" . $text['quest_text'] . ";";
        }
    }

    echo "\n";

    //Réponses

    $select_usr = $BDD->prepare('SELECT usr FROM reponse GROUP BY qutaire HAVING qutaire=?  ');
    $select_usr->execute((array($code)));

    while($user=$select_usr->fetch())
    {
        echo $user['usr'].';';

        $select_rep=$BDD->prepare("SELECT valeur FROM reponse WHERE usr=:usr AND qutaire=:code");
        $select_rep->bindValue(":usr", $user['usr'], PDO::PARAM_INT);
        $select_rep->bindValue(":code", $code, PDO::PARAM_INT);
        $select_rep->execute();

        while($valeur=$select_rep->fetch())
        {
            echo $valeur['valeur'].";";
        }

        echo "\n";
    }
}