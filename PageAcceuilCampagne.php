<?php
require('connect_to_quest.php');


?>


<!doctype html>
<html>
<?php require_once "head.php";
$idCampagne = $_GET['id'];


$requete = $BDD->prepare('select * from campagne where camp_id=?');
$requete->execute(array($idCampagne));
$campagne = $requete->fetch();

$stmt = $BDD->prepare('select * from questaire where qutaire_camp=?');
$stmt->execute(array($idCampagne));

?>
<body id="bodyaccueilcampagne">
<?php require_once "headerQuest.php"; ?>
<br/>
<br/>
<br/>
<br/>
<br/>
<div class="container">


    <div class="row">
        <div class="container">
            <div class="row">
                <div class="col-md-4">


                </div>
                <div class="col-md-4" id="creation">
                    <h1 class="text-center">Gestion de campagnes</h1>


                </div>
                <div class="col-md-4">

                </div>


            </div>


        </div>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>


        <div class="container">
            <div class="row">

                <div class="col-md-4-offset-md-2 col-sm-5" id="titreaccueilcamp">
                    <h2><?= $campagne['camp_nom'] ?></h2>

                    <p>
                        <small><?= $campagne['camp_desc'] ?></small>
                    </p>
                </div>
                <div class="col-md-4-offset-md-2 col-sm-5" id="conteneraccueilcamp">
                    <h2>Questionnaires(s) de cette campagne :</h2>
                    <?php foreach ($stmt as $questionnaire) { ?>
                        <article>
                            <h5><a class="nom_questionnaire" href="AccueilQuestio.php?id=<?= $idCampagne ?>"><?= $questionnaire["qutaire_titre"] ?></a></h5>

                        </article>
                    <?php } ?>


                    <h3><a href="CreerQuestionnaire.php?id=<?= $idCampagne ?>">Ajouter un questionnaire</a></h3>
                    </h2>
                </div>
            </div>
            <br/>
            <br/>
            <a href="delete_campagne.php?id=<?= $idCampagne ?>">
                <button id="btn1" type="button" class="btn btn-secondary"> Supprimer la campagne
                </button>
            </a>
            <a href="modifier_campagne.php?id=<?= $idCampagne ?>">
                <button id="btn1" type="button" class="btn btn-secondary"> Modifier la campagne
                </button>
            </a>

</body>
</html>