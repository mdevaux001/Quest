<?php session_start();
require("connect_to_quest.php");

//On verifie que tous les champs du form ont été complétés

if (!empty($_POST['mdp']) and !empty($_POST['mail']) and !empty($_POST['orga'])) {

    // On récupère toutes les données :

    $mdp = $_POST['mdp'];
    $mail = $_POST['mail'];
    $orga = $_POST['orga'];

    // On crée un identifiant à 4 chiffres, en verifant grâce à une boucle qu'il  n'exite pas déjà :

    $characts = '1234567890';
    $doublon = true;
    while ($doublon) {
        $idEXP = '';
        for ($i = 0; $i < 4; $i++) {
            $id .= substr($characts, rand() % (strlen($characts)), 1);
        }
        $chercher_doublon = $BDD->prepare('SELECT usr_id FROM user WHERE usr_id=?');
        $chercher_doublon->execute(array($id));
        if ($chercher_doublon->rowCount() == 0) {
            $_SESSION['idUSER'] = $id;
            $doublon = false;
        }
    }
    // On prépare la requête pour insérer les données dans la BDD :

    $requete = $BDD->prepare('INSERT INTO user(usr_id,usr_mdp,usr_mail,usr_org) VALUES(:id,:mdp,:mail,:orga)');

    $requete->bindValue(':id', $id, PDO::PARAM_STR);
    $requete->bindValue(':mdp', $mdp, PDO::PARAM_STR);
    $requete->bindValue(':mail', $mail, PDO::PARAM_STR);
    $requete->bindValue(':orga', $orga, PDO::PARAM_STR);


//On exécute la requête
    $requete->execute();
    $_SESSION['connecte'] = true;
    $_SESSION['validationUSER'] = true;
    header("Location: PageAccueilUSER.php");
}
?>