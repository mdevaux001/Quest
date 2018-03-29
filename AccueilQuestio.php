<?php
require('connect_to_quest.php');


?>


<!doctype html>
<html>
<?php require_once "head.php";
// On recupère l'identifiant du questionnaire pour afficher les informations du bon questionnaire :
$idquestio = $_GET['id'];

// On va chercher dans la BDD toutes les informations concernant ce questionnaire

$stmt = $BDD->prepare('select * from questaire where qutaire_id=?');
$stmt->execute(array($idquestio));
$questio = $stmt->fetch();

// On compte le nombre d'utilisateurs ayant participé au questionnaire :

$requete = $BDD->prepare('select DISTINCT usr from reponse where qutaire=?');
$requete->execute(array($idquestio));
$nbparticipant = $requete->rowCount();


?>
<body >
<?php require_once "headerQuest.php"; ?>
<br/>
<br/>
<br/>
<br/>
<br/>
<div class="container" id="fondgris">


    <div class="row">
        <div class="container">
            <div class="row" id="titreaccueilcamp">
                <div class="col-md-4-offset-md-2 col-sm-5" >

                    <h2><?= $questio["qutaire_titre"] ?></h2>

                    <p>
                        <?= $questio["qutaire_desc"] ?>
                    </p>
                    <p>
                        Code du questionnaire (à fournir aux utilisateurs souhaités) : <?= $questio["qutaire_id"] ?>
                    </p>
                </div>
                <div class="col-md-6-offset-md-2 col-sm-5" id="titreaccueilcamp">
                    <a href="exportCSV.php?id=<?= $idquestio ?>">
                        <br>
                        <br>
                        <button id="btn1" type="button" class="btn btn-secondary"> telecharger les résultats
                        </button>
                    </a>
                </div>


            </div>


        </div>
    </div>
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
        <button id="btnsupr" type="button" class="btn btn-secondary"> Supprimer le questionnaire
        </button>
    </a>
    <a href="modifier_questio.php?id=<?= $idquestio ?>">
        <button id="btnmod" type="button" class="btn btn-secondary"> Modifier le questionnaire
        </button>
    </a>
    <br>
    <br>
    <br>

</div>
<br>
<br>
<HR width="80%"/>
<br>
<br>
<br>
<?php require_once "footerQuest.php"; ?>
</body>
</html>