<?php session_start();
require('connect_to_quest.php');

// on récupère l'identifiant de la campagne car il sera nécessaire pour retourner sur la page
// d'accueil campagne après avoir crée le nouveau questionnaire :
$idCampagne = $_GET['id'];

// On crée un booleen qui servira a dirigé vers le header location à la fin du script

$validation = false;

//On verifie que tous les champs du form ont été complétés

if (!empty($_POST['description']) and !empty($_POST['nom']) and !empty($_POST['type'])) {

    // On récupère toutes les données :

    $nom = $_POST['nom'];
    $desc = $_POST['description'];
    $type = $_POST['type'];

    // On crée un identifiant à 4 chiffres, en verifant grâce à une boucle qu'il  n'exite pas déjà :

    $characts = '1234567890';
    $doublon = true;
    while ($doublon) {
        $idEXP = '';
        for ($i = 0; $i < 4; $i++) {
            $id .= substr($characts, rand() % (strlen($characts)), 1);
        }
        $chercher_doublon = $BDD->prepare('SELECT qutaire_id FROM questaire WHERE qutaire_id=?');
        $chercher_doublon->execute(array($id));
        if ($chercher_doublon->rowCount() == 0) {

            $doublon = false;
        }
    }
    // On prépare la requête pour insérer les données dans la table questaire :

    $requete = $BDD->prepare('INSERT INTO questaire(qutaire_id,qutaire_camp,qutaire_titre,qutaire_desc) VALUES(:id,:idCamp,:nom,:description)');
    $requete->bindValue(':id', $id, PDO::PARAM_INT);
    $requete->bindValue(':idCamp', $idCampagne, PDO::PARAM_INT);
    $requete->bindValue(':nom', $nom, PDO::PARAM_STR);
    $requete->bindValue(':description', $desc, PDO::PARAM_STR);

    // on exécute la requête :

    $requete->execute();

    // On prépare une requête pour remplir la table contient :

    // On selectionne les questions correspondant au type de questionnaire choisi dans la table questions :

    $stmt = $BDD->prepare('SELECT * FROM question WHERE quest_type=? ');
    $stmt->execute(array($type));
    // Pour chacune des questions du questionnaire, on remplit la table contient :
    foreach ($stmt as $question) {
        $idquestion = $question['quest_id'];
        $requeteDeux = $BDD->prepare('INSERT INTO contient(qutaire,quest,qutaire_type) VALUES(:id,:idquest,:type)');
        $requeteDeux->bindValue(':id', $id, PDO::PARAM_INT);
        $requeteDeux->bindValue(':idquest', $idquestion, PDO::PARAM_INT);
        $requeteDeux->bindValue(':type', $type, PDO::PARAM_STR);
        $requeteDeux->execute();
        $_validation = true;
    }
    // Ainsi dans la table contient, il y a toutes les questions associées au
    // questionnaire crée par l'identifiant questionnaire
}
if ($_validation) {
    header("Location:PageAcceuilCampagne.php?id=$idCampagne");
}
?>