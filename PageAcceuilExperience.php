<!doctype html>

<?php
session_start();

require('connect_to_quest.php');

$idExperience = $_GET['id'];
// On va chercher dans la BDD toutes les informations concernant cette expérience :

$stmt = $BDD->prepare('select * from experience where exr_id=?');
$stmt->execute(array($idExperience));
$experience = $stmt->fetch();

// On va chercher dans la BDD les campagne appartenant à cette expérience :

$requete = $BDD->prepare('select * from campagne where camp_exr=?');
$requete->execute(array($idExperience));

// On va chercher dans la BDD les expérimentateurs participant à cette expérience pour
// pouvoir faire l'affichage du groupe de travail :

$req = $BDD->prepare('select exp from lancer where exr=?');
$req->execute(array($idExperience));


?>
<html>
<?php require_once "head.php"; ?>
<body>
<?php require_once "headerQuest.php"; ?>
<header id="headexp">
    <div class="container">
        <

        <div class="row">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">


                    </div>
                    <div class="col-md-4" id="description">
                        <h1><?= $experience['exr_nom'] ?></h1>


                    </div>
                    <div class="col-md-4">

                    </div>


                </div>


            </div>
            <h1 class="lead">Gestion d'expérience </h1>


        </div>
    </div>
</header>


<div class="container-fluid">


    <article class="col-md-8 maincontent">
        <div class="container">

            <div class="row">
                <div class="container-fluid">
                    <div class="row">
                        <br/>
                        <br/>


                        <div class="col-md-4" id="gptravail">
                            <span id="code">Code de l'expérience : <?php echo $idExperience ?></span>
                            <br/>
                            <span id="expli">Partagez ce code avec les expérimentateurs que vous souhaitez inviter dans votre groupe de travail</span>
                            <br/>
                            <br/>
                            <span id="membre">Membres du groupe de travail :</span>
                            <br/>
                            <?php

                            // Pour chaque expérimentateur, on prepare une requete qui va chercher dans la BDD ses informations personnelles :

                            foreach ($req as $id) {
                                $iden = $id["exp"];
                                $reque = $BDD->prepare('select * from experiment where exp_id=?');
                                $reque->execute(array($iden));
                                
                                // On affiche chacune des informations concernant un expérimentateur pour pouvoir afficher le groupe de travail :

                                foreach ($reque as $info) {
                                    echo '<br/>';
                                    echo $info['exp_nom'] . " ";
                                    echo $info['exp_prenom'] . " ";
                                    echo $info['exp_mail'];
                                }
                            }

                            ?>


                        </div>
                        <div class="col-md-4">

                            <h3>Description :</h3>
                            <p><?= $experience['exr_desc'] ?>
                            <h4>Durée :</h4>
                            <p>du <?= $experience['dateDeb'] ?> au <?= $experience['dateFin'] ?></p>



                        </div>
                        <div class="col-md-4" id="liste">
                            <h2> Liste des campagnes dans cette expérience : </h2>
                            <?php foreach ($requete

                            as $campagne) { ?>
                            <article>
                                <h5><a class="nom_campagne"
                                       href="PageAcceuilCampagne.php?id=<?= $campagne['camp_id'] ?>"><?= $campagne["camp_nom"] ?></a>
                                </h5>


                                <?php } ?>
                                <h3><a href="CreerCampagne.php?id=<?= $idExperience ?>">Ajouter une campagne</a></h3>
                            </article>
                        </div>


                    </div>


                </div>


            </div>
            <br/>
            <br/>
            <a href="delete_experience.php?id=<?= $idExperience ?>">
                <button id="btnsupr" type="button" class="btn btn-secondary"> Supprimer l'expérience
                </button>
            </a>
            <a href="modifier_experience.php?id=<?= $idExperience ?>">
                <button id="btnmod" type="button" class="btn btn-secondary"> Modifier l'expérience
                </button>
            </a>

            <HR width="80%"/>
            <?php require_once "footerQuest.php"; ?>

</body>
</html>
