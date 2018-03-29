<?php session_start();
require('connect_to_quest.php');

// On recupère les variables super globales :

$nomEXP = $_SESSION['nomEXP'];
$idEXP = $_SESSION['idEXP'];

// On va chercher dans la BDD les expériences lancées par cet expérimentateur ;

$stmt = $BDD->prepare('SELECT * FROM experience,lancer WHERE lancer.exp=? AND lancer.exr=experience.exr_id');
$stmt->execute(array($idEXP));

// Traitement du form permettant de rejoindre une autre expérience déja existante (le form est sur la même page)
//en utilisant un code d'expérience :

if (!empty($_POST['code']))
{
    // L'expérimentateur rejoint une expérience, on ajoute donc une ligne à la table lancer
    // avec l'id de l'expérimentateur et l'id de l'expérience :

    $requete=$BDD->prepare('INSERT INTO lancer VALUES(:code,:id)');


    $requete->bindValue(':code', $idEXP, PDO::PARAM_INT);
    $requete->bindValue(':id', $_POST['code'], PDO::PARAM_INT);
    $requete->execute();
    header("Location: PageAcceuilEXP.php");
}
?>


<!doctype html>
<html>

<?php require_once "head.php";
?>

<body>

<?php require_once "headerQuest.php";
?>

<header id="head">
    <div class="container">
        <div class="row">
            <h1 class="lead">Bienvenue <?php echo $nomEXP ?> !</h1>


        </div>
    </div>
</header>
<div class="container-fluid">
    <article class="col-md-8 maincontent" id="creerExp">

        <h1><a href="CreerExperience.php">Créer EXPERIENCE</a></h1>
        <button data-toggle="modal" href="#i" class="btn btn-primary">Informations</button>
        <div class="modal" id="i">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">x</button>
                        <h4 class="modal-title">Qu'est ce qu'une expérience ?</h4>
                    </div>
                    <div class="modal-body">
                        Une expérience peut regrouper une ou plusieurs campagnes de passation de questionnaires. Vous
                        devez lancer une expérience pour pouvoir lancer une ou plusieurs campagnes de questionnaires.
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-info" data-dismiss="modal">Fermer</button>

                    </div>
                </div>
            </div>
        </div>
        <br/>
        <br/>
        <div class="row">
            <div class="col-md-10">
                Vous souhaitez rejoindre une expérience ? Entrez le code expérience fourni :
                <form class="form-signin form-horizontal" role="form" action="PageAcceuilEXP.php" method="post">
                    <div class="form-group">
                        <div class=" col-md-4 ">
                            <label for="nom">Code de l'expérience : </label>
                            <input type="int" name="code" id="nom" class="form-control" >
                        </div>
                    </div>
                    <div class="form-group">
                        <div class=" col-md-4 ">
                            <button type="submit" class="btn btn-default btn-primary"><span class="glyphicon glyphicon-plus"></span> Rejoindre</button>
                        </div>
                    </div>
                    <br/>
                    <br/>
                    <br/>
    </article>
    <br/>
    <aside class="col-md-4 sidebar sidebar-right" id="listexp">
        <h2 > Liste des expériences existantes : </h2>
        <?php

        // Pour chaque expérience à laquelle l'expérimentateur participe, on affiche son nom :

        foreach ($stmt as $experience) { ?>
            <article>
                <h3><a class="nom_experience"
                       href="PageAcceuilExperience.php?id=<?= $experience['exr_id'] ?>"><?php echo $experience['exr_nom'] ?></a>
                </h3>

            </article>
        <?php } ?>
    </aside>
</div>

<HR width="80%"/>
<?php require_once "footerQuest.php"; ?>

</body>
</html>