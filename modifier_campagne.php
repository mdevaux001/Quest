<?php session_start();

// Cette page permet grâce à un form de modifier une campagne en utilisant la méthode POST

require('connect_to_quest.php');

// On recupère l'id de la campagne pour le faire passer en get au fichier traitant le form
// pour pouvoir retourner sur l'ecran d'accueil de la campagne une fois la modification effectuée

$idCampagne = $_GET['id'];



?>

<!doctype html>
<html>
<?php require_once "head.php";
?>
<body id="bodycreationcampagne">
<?php require_once "headerQuest.php"; ?>
<br/>
<br/>
<div class="container" id="titreajoutcampagne">
    <h2 class="text-center">Modifications de la campagne</h2>
</div>
<br/>
<br/>

<div class="container" id="conteneurajoutcampagne">
    <br/>
    <form class="form-signin form-horizontal" role="form" action="Traiter_modifier_campagne.php?id=<?=$idCampagne?>" method="post">
        <div class="form-group">
            <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                <label for="nom">Nom de la campagne : </label>
                <input type="text" name="nom" id="nom" class="form-control" placeholder="Entrez le nom" >
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                <label for="descriptionc">Entrer la description de la campagne : </label>
                <textarea name="description" id ="descriptionc" cols="70" rows="10"> </textarea>
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
                <button type="submit" class="btn btn-default btn-primary"><span class="glyphicon glyphicon-plus"></span> Modifier</button>
            </div>
        </div>
    </form>
</div>
<?php require_once "footerQuest.php"; ?>
</body>
</html>
