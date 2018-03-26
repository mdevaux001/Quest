<?php
require('connect_to_quest.php');


?>


<!doctype html>
<html>
<?php require_once "head.php";
$idCampagne = $_GET['id'];


$stmt = $BDD->prepare('select * from questaire where qutaire_camp=?');
$stmt->execute(array($idCampagne));
$questio = $stmt->fetch();
$idquestio = $questio['qutaire_id'];

$requete = $BDD->prepare('select DISTINCT usr from reponse where qutaire=?');
$requete->execute(array($idquestio));
$nbparticipant = $requete->rowCount();


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
                <div class="col-md-4-offset-md-2 col-sm-5" id="titreaccueilcamp">
                    <h2><?= $questio["qutaire_titre"] ?></h2>

                    <p>
                        <?= $questio["qutaire_desc"] ?>
                    </p>
                </div>


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


            <div class="col-md-4" id="conteneraccueilcamp">


                <article>
                    <h4>Nombre de personnes ayant répondu au questionnaire : <?php echo $nbparticipant; ?></h4>


                </article>


            </div>
        </div>
    </div>
    <br/>
    <br/>
    <a href="delete_questio.php?id=<?= $idquestio ?>">
        <button id="btn1" type="button" class="btn btn-secondary"> Supprimer le questionnaire
        </button>
    </a>
    <a href="modifier_questio.php?id=<?= $idquestio ?>">
        <button id="btn1" type="button" class="btn btn-secondary"> Modifier le questionnaire
        </button>
    </a>
    <a href="exportCSV.php?id=<?= $idquestio ?>">
        <button id="btn1" type="button" class="btn btn-secondary"> telecharger les résultats
        </button>
    </a>

</body>
</html>