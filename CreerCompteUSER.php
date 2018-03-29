<?php
require('connect_to_quest.php');

// Cette page est la page de création d'un compte utilisateur.
// On recupère les données grâce à un form qui utilise la méthode POST

?>
<!doctype html>
<html>
<?php require_once 'head.php'; ?>
<body id="inscriptionUser">
<?php require_once 'headerQuest.php'; ?>

<br/>

<br/>

<br/>

<br/>
<div class="container" id="creationUSER">
    <h2 class="text-center">Création d'un compte utilisateur</h2>
</div>
<br/>
<div class="container" id="inscriptionU">
    <br/>
    <form class="form-signin form-horizontal" role="form" action="TraiterCreationCompteUSER.php" method="post">


        <div class="form-group">
            <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                <input type="password" name="mdp" class="form-control" placeholder="Entrez votre mot de passe" required>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                <input type="email" name="mail" class="form-control" placeholder="Entrez votre mail" required>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                <input type="text" name="orga" class="form-control" placeholder="Entrez le nom de votre organisation"
                       required>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                <button type="submit" class="btn btn-default btn-primary"><span class="glyphicon glyphicon-plus"></span>Créer
                    un compte
                </button>
            </div>
        </div>
    </form>
</div>
<br/>
<br/>
<br/>
<br/>
<HR size=5 width="80%"/>
<br/>
<br/>
<br/>
<br/>


<?php require_once "footerQuest.php"; ?>
</body>
</html>