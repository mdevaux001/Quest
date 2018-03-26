<?php
require('connect_to_quest.php');
?>

<!doctype html>

<html>

<?php require_once 'head.php'; ?>

<body id="bodycreationcampagne">

<?php require_once "headerQuest.php";
$idquestio = $_GET['id'];
?>
<br/>
<br/>
<br/>
<br/>
<div class="container" id="titreajoutcampagne">
    <h2 class="text-center">Modifier le questionnaire</h2>
</div>
<br/>
<br/>

<div class="container" id="conteneurajoutcampagne">
    <br/>
    <form class="form-signin form-horizontal" role="form" action="Traiter_modifier_questio.php?id=<?= $idquestio ?>"
          method="post">
        <div class="form-group">
            <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                <label for="nom">Nom du questionnaire : </label>
                <input type="text" name="nom" id="nom" class="form-control" placeholder="Entrez le nom" >
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
                <button type="submit" class="btn btn-default btn-primary"><span class="glyphicon glyphicon-plus"></span>
                    Modifier
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
