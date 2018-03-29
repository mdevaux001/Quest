<?php session_start();

require('connect_to_quest.php');
// on récupère l'identifiant de l'expérience car il sera nécessaire pour retourner sur la page
// d'accueil expérience après avoir crée la nouvelle campagne
$idExperience = $_GET['id'];

// On crée un booleen qui servira a dirigé vers le header location à la fin du script
$validation = false;

//On verifie que tous les champs du form ont été complétés

if (!empty($_POST['description']) and !empty($_POST['dateDebut']) and !empty($_POST['dateFin']) and !empty($_POST['nom'])) {

    // On récupère toutes les données :

    $nom = $_POST['nom'];
    $desc = $_POST['description'];
    $dateDeb = $_POST['dateDebut'];
    $dateFin = $_POST['dateFin'];


    // On crée un identifiant à 4 chiffres, en verifant grâce à une boucle qu'il  n'exite pas déjà :


    $characts = '1234567890';
    $doublon = true;
    while ($doublon) {
        $idEXP = '';
        for ($i = 0; $i < 4; $i++) {
            $id .= substr($characts, rand() % (strlen($characts)), 1);
        }
        $chercher_doublon = $BDD->prepare('SELECT camp_id FROM campagne WHERE camp_id=?');
        $chercher_doublon->execute(array($id));
        if ($chercher_doublon->rowCount() == 0) {

            $doublon = false;
        }
    }

    // On prépare la requête pour insérer les données dans la BDD :

    $requete = $BDD->prepare('INSERT INTO campagne(camp_id,camp_nom,camp_desc,camp_deb,camp_fin,camp_exr) VALUES(:id,:nom,:description,:dateDebut,:dateFin,:id_experience)');


    $requete->bindValue(':id', $id, PDO::PARAM_STR);
    $requete->bindValue(':nom', $nom, PDO::PARAM_STR);
    $requete->bindValue(':description', $desc, PDO::PARAM_STR);
    $requete->bindValue(':dateDebut', $dateDeb, PDO::PARAM_STR);
    $requete->bindValue(':dateFin', $dateFin, PDO::PARAM_STR);
    $requete->bindValue(':id_experience', $idExperience, PDO::PARAM_STR);
    $requete->execute();


    $_validation = true;


}
if ($_validation) {
    header("Location: http://localhost/web/Quest/PageAcceuilExperience.php?id=$idExperience");
}

?>

