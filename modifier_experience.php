<?php session_start();

require("connect_to_quest.php");
$idExperience = $_GET['id'];

?>
<!doctype html>
<html>
<?php require_once "head.php"; ?>
<body id="bodycreerexp">
<?php require_once "headerQuest.php"; ?>
<br/>
<br/>
<div class="container" id="titrecreerexp">
    <h2 class="text-center">Modifications de l'expérience</h2>
</div>
<br/>
<br/>

<div class="container" id="creerexp">
    <br/>
    <form class="form-signin form-horizontal" role="form" action="Traiter_modifier_experience.php?id=<?= $idExperience ?>" method="post">
        <div class="form-group">
            <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                <label for="nom">Nom de l'expérience : </label>
                <input type="text" name="nom" id="nom" class="form-control" placeholder="Entrez le nom" >
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                <label for="descriptionexp">Entrer la description de l'expérience : </label>
                <textarea name="description" id ="descriptionexp" cols="70" rows="10"> </textarea>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                <label for="dateDebut">Date de début :</label>
                <input type="date" name="dateDebut" id="dateDebut" class="form-control" placeholder="Entrez la date de début" >
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                <label for="dateFin">Date de fin :</label>
                <input type="date" name="dateFin" id="dateFin" class="form-control" placeholder="Entrez la date de fin" >
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                <button type="submit" class="btn btn-default btn-primary" id="btncreerexp"><span class="glyphicon glyphicon-plus"></span> Modification</button>
            </div>
        </div>
    </form>
</div>


<br/>
<HR size=5 width="80%"/>
<br/>
<br/>

<?php require_once "footerQuest.php"; ?>
</body>
</html>
