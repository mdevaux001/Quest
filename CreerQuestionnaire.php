<?php
require('connect_to_quest.php');
?>

<!doctype html>

<html>

<?php require_once 'head.php'; ?>

<body id="bodycreationcampagne">

<?php require_once "headerQuest.php";
$idCampagne = $_GET['id'];
?>
<br/>
<br/>
<br/>
<br/>
<div class="container" id="titreajoutcampagne">
    <h2 class="text-center">Ajout d'un questionnaire</h2>
</div>
<br/>
<br/>

<div class="container" id="conteneurajoutcampagne">
    <br/>
    <form class="form-signin form-horizontal" role="form" action="TraiterCreerQuestionnaire.php?id=<?= $idCampagne ?>"
          method="post">
        <div class="form-group">
            <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                <label for="nom">Nom du questionnaire : </label>
                <input type="text" name="nom" id="nom" class="form-control" placeholder="Entrez le nom" required>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                <label for="description">Entrer la description du questionnaire : </label>
                <textarea name="description" cols="70" rows="10"> </textarea>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                <label for="type">Choisir le type de questionnaire : </label>
                <input type="radio" name="type" id="TLX" value="TLX"> TLX-NASA
                <input type="radio" name="type" id="AD" value="AD"> AttrakDiff
                <input type="radio" name="type" id="SUS" value="SUS"> SUS
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                <button type="submit" class="btn btn-default btn-primary"><span class="glyphicon glyphicon-plus"></span>
                    Création
                </button>
            </div>
        </div>
    </form>
</div>
<br/>
<br/>
<br/>
<?php require_once "footerQuest.php"; ?>
</body>
</html>
