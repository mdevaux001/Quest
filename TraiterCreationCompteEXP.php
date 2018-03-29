<?php session_start();


require("connect_to_quest.php");

//On verifie que tous les champs du form ont été complétés

if (!empty($_POST['prenom']) and !empty($_POST['mdp']) and !empty($_POST['mail']) and !empty($_POST['nom']) and !empty($_POST['orga'])) {

    // On récupère toutes les données :

    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $_SESSION['nomEXP'] = $prenom;
    $mdp = $_POST['mdp'];
    $mail = $_POST['mail'];
    $orga = $_POST['orga'];

    // On crée un identifiant à 4 chiffres, en verifant grâce à une boucle qu'il  n'exite pas déjà :
    $characts = '1234567890';
    $doublon = true;
    while ($doublon) {
        $idEXP = '';
        for ($i = 0; $i < 4; $i++) {
            $idEXP .= substr($characts, rand() % (strlen($characts)), 1);
        }
        $chercher_doublon = $BDD->prepare('SELECT exp_id FROM experiment WHERE exp_id=?');
        $chercher_doublon->execute(array($idEXP));
        if ($chercher_doublon->rowCount() ==0) {
            $_SESSION['idEXP'] = $idEXP;
            $doublon=false;
        }
    }

    // On prépare la requête pour insérer les données dans la BDD

    $requete = $BDD->prepare('INSERT INTO experiment(exp_id,exp_mdp,exp_nom,exp_prenom,exp_org,exp_mail) VALUES(:id,:mdp,:nom,:prenom,:orga,:mail)');

    $requete->bindValue(':id', $idEXP, PDO::PARAM_STR);
    $requete->bindValue(':mdp', $mdp, PDO::PARAM_STR);
    $requete->bindValue(':nom', $nom, PDO::PARAM_STR);
    $requete->bindValue(':prenom', $prenom, PDO::PARAM_STR);
    $requete->bindValue(':orga', $orga, PDO::PARAM_STR);
    $requete->bindValue(':mail', $mail, PDO::PARAM_STR);


//On exécute la requête
    $requete->execute();
    $_SESSION['connecte'] = true;
    $_SESSION['validationEXP'] = true;
    header("Location: PageAcceuilEXP.php");
}
?>