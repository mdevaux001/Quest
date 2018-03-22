<?php

session_start();
require("connect_to_quest.php");

$_SESSION['connecte'] = false;
$_SESSION['validationEXP'] = false;
$_SESSION['validationUSER'] = false;
$_SESSION['idUSER'] = "";
$_SESSION['idEXP'] = "";

if (!empty($_POST['mail']) && !empty($_POST['mdp'])) {

    $mail = $_POST['mail'];
    $mdp = $_POST['mdp'];

    $requete = $BDD->prepare('SELECT exp_id, exp_prenom FROM experiment WHERE exp_mail=? AND exp_mdp=?');
    $requete->execute(array($mail, $mdp));

    if ($requete->rowCount() == 1) {
        while ($row = $requete->fetch()) {
            $idEXP = $row['exp_id'];
            $nomEXP = $row['exp_prenom'];
        }

        // Authentication successful
        $_validation_exp = true;
        $_SESSION['validationEXP'] = $_validation_exp;
        $_SESSION['idEXP'] = $idEXP;
        $_SESSION['nomEXP'] = $nomEXP;
        $_SESSION['connecte'] = true;

    } else {
        $requete = $BDD->prepare('SELECT usr_id FROM user WHERE usr_mail=? AND usr_mdp=?');
        $requete->execute(array($mail, $mdp));

        if ($requete->rowCount() == 1) {
            while ($row = $requete->fetch()) {
                $idUSER = $row['usr_id'];
            }

            // Authentication successful
            $_validation_user = true;
            $_SESSION['validationUSER'] = $_validation_user;
            $_SESSION['idUSER'] = $idUSER;
            $_SESSION['connecte'] = true;
        }

    }


    // Authentication successful
    $_validation_user = true;
    $_SESSION['validationUSER'] = $_validation_user;
    $_SESSION['idUSER'] = $idUSER;

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