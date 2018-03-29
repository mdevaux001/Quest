<!doctype html>


<?php

//Affichage d'un message d'erreur en cas de non authentification.
if (isset($_GET['erreur'])) {
if ($_GET['erreur']) {

    // Cette page est la page de connexion au site. Il faut entrer son mail et son
    // mot de passe grâce à un form qui traite les données avec la méthode POST
?>
<script>
    alert("Votre identifiant ou votre mot de passe sont incorrects.");
</script>
<?php
}
}

?>

<html>
<?php require_once "head.php"; ?>

<body id="connexion">
<h2 class="text-center" id="connex">Connexion</h2>
<h5 class="text-center" id="pasdecompte">Vous n'avez pas encore de compte ?</h5>
<div class="container">

    <div class="row">
        <div class="col-md-3" id="lancerexp">
            <text> Si vous voulez lancer votre campagne de questionnaires :</text>
            <br/><a href="CreationCompteExpe.php">Créez un compte EXPERIMENTATEUR</a>
            <br/>
        </div>
        <div class="col-md-3" id="lanceruser">
            <text> Si vous voulez simplement répondre à un questionnaire :</text>
            <br/><a href="CreerCompteUSER.php">Créez un compte USER</a>
            <br/>
        </div>
    </div>
</div>

    <div class="well" id="connexion">
        <form class="form-signin form-horizontal" role="form" action="traiterConnexionQuest.php" method="post">
            <div class="form-group">
                <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4" id="mail">

                    <input type="email" name="mail" class="form-control" placeholder="Entrez votre mail" required>
                </div>


            </div>
            <div class="form-group">


                <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4" id="mdp">
                    <input type="password" name="mdp" class="form-control" placeholder="Entrez MDP" required>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-4" id="bouton">
                    <button type="submit" class="btn btn-default btn-success"><span
                                class="glyphicon glyphicon-log-in"></span> Se connecter
                    </button>
                </div>
            </div>
    </div>
    </form>
</div>

</body>

</html>