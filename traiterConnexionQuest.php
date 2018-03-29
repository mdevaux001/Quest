<?php
session_start();
require("connect_to_quest.php");
// On definie les variables super globales de la session

// Un booléen pour savoir si la personne est connectée
$_SESSION['connecte'] = false;
// Un booléen pour savoir si la personne est un expérimentateur
$_SESSION['validationEXP'] = false;
// Un booléen pour savoir si la personne est un utilisateur
$_SESSION['validationUSER'] = false;
// On initialise les identifiants
$_SESSION['idUSER'] = "";
$_SESSION['idEXP'] = "";

// On verifie que les champs necessaire à l'identification ont été remplis
if (!empty($_POST['mail']) && !empty($_POST['mdp'])) {
    $mail = $_POST['mail'];
    $mdp = $_POST['mdp'];
    // On cherche dans les expérimentateur
    $requete = $BDD->prepare('SELECT exp_id, exp_prenom FROM experiment WHERE exp_mail=? AND exp_mdp=?');
    $requete->execute(array($mail, $mdp));
    // Si la personne qui se connecte est un expérimentateur :
    if ($requete->rowCount() == 1) {
        while ($row = $requete->fetch()) {
            $idEXP = $row['exp_id'];
            $nomEXP = $row['exp_prenom'];
        }
        // on remplie les variables de session en conséquence :
        $_validation_exp = true;
        $_SESSION['validationEXP'] = $_validation_exp;
        $_SESSION['idEXP'] = $idEXP;
        $_SESSION['nomEXP'] = $nomEXP;
        $_SESSION['connecte'] = true;
    } else {
        // si la personne n'est pas un expérimentateur, on cherche si c'est un utilisateur :

        $requete = $BDD->prepare('SELECT usr_id FROM user WHERE usr_mail=? AND usr_mdp=?');
        $requete->execute(array($mail, $mdp));
        // Si c'est un utilisateur :
        if ($requete->rowCount() == 1) {
            while ($row = $requete->fetch()) {
                $idUSER = $row['usr_id'];
            }
            // on remplie les variables de session en conséquence :
            $_validation_user = true;
            $_SESSION['validationUSER'] = $_validation_user;
            $_SESSION['idUSER'] = $idUSER;
            $_SESSION['connecte'] = true;
        }
    }


    // $erreur permet d'annoncer à la page appelée, via la méthode GET, si une erreur d'authentification est
    // survenue. Un message d'erreur s'affiche alors (voir connexionQuest.php).
    if ($_validation_exp) {
        $erreur = false;
        header("Location: PageAcceuilEXP.php");
    } else if ($_validation_user) {
        $erreur = false;
        header("Location: PageAccueilUSER.php");
    } else {
        $erreur = true;
        header("Location: connexionQuest.php?erreur=" . $erreur);
    }


}
?>