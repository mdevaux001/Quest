<?php session_start();

require('connect_to_quest.php');

$idCampagne = $_GET['id'];
$validation = false;

if (!empty($_POST['description']) and !empty($_POST['nom']) and !empty($_POST['type'])) {
    $nom = $_POST['nom'];
    $desc = $_POST['description'];
    $type = $_POST['type'];


    // Création d'un code à 4 charactères pour l'identifiant :


    $characts = '1234567890';

    $id = '';
    for ($i = 0; $i < 8; $i++)
    {
        $id .= substr($characts, rand() % (strlen($characts)), 1);
    }

    $requete = $BDD->prepare('INSERT INTO questaire(qutaire_id,qutaire_camp,qutaire_titre,qutaire_desc) VALUES(:id,:idCamp,:nom,:description)');

    $requete->bindValue(':id', $id, PDO::PARAM_INT);
    $requete->bindValue(':idCamp', $idCampagne, PDO::PARAM_INT);
    $requete->bindValue(':nom', $nom, PDO::PARAM_STR);
    $requete->bindValue(':description', $desc, PDO::PARAM_STR);

    $requete->execute();

    $stmt = $BDD->prepare('SELECT * FROM question WHERE quest_type=? ');
    $stmt->execute(array($type));
    foreach ($stmt as $question) {
        $idquestion = $question['quest_id'];
        $requeteDeux = $BDD->prepare('INSERT INTO contient(qutaire,quest,qutaire_type) VALUES(:id,:idquest,:type)');

        $requeteDeux->bindValue(':id', $id, PDO::PARAM_INT);
        $requeteDeux->bindValue(':idquest', $idquestion, PDO::PARAM_INT);
        $requeteDeux->bindValue(':type', $type, PDO::PARAM_STR);

        $requeteDeux->execute();
        $_validation = true;
    }
}

if ($_validation)
{
    header("Location:PageAcceuilCampagne.php?id=$idCampagne");
}

?>