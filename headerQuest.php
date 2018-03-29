<?php
session_start();
require('connect_to_quest.php');

// On recupère les variables super globales :

$loged = $_SESSION['connecte'];
$_validation_user = $_SESSION['validationUSER'];
$_validation_exp = $_SESSION['validationEXP'];

?>

<?php if ($loged)
{
    // Si la personne est connectée
if ($_validation_exp)
    //  si il s'agit d'un expérimentateur, on affiche ce header :

{
?>

<div class="navbar navbar-inverse navbar-fixed-top headroom">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span
                        class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span></button>
            <a class="navbar-brand"></a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav pull-right">

                <li><a href="PageAcceuilEXP.php">Accueil</a></li>
                <li><a href="CommentCaM.php">Comment ça marche ?</a></li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="glyphicon glyphicon-user"></span> Bienvenue, <?= $_SESSION['nomEXP'] ?> <b
                                class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="deconnexion.php">Se déconnecter</a></li>
                    </ul>
                </li>
                <?php }

                if ($_validation_user){
                // si il s'agit d'un utilisateur, on affiche ce header :
                ?>
                <div class="navbar navbar-inverse navbar-fixed-top headroom">
                    <div class="container">
                        <div class="navbar-header">
                            <!-- Button for smallest screens -->
                            <button type="button" class="navbar-toggle" data-toggle="collapse"
                                    data-target=".navbar-collapse"><span class="icon-bar"></span> <span
                                        class="icon-bar"></span> <span class="icon-bar"></span></button>
                            <a class="navbar-brand"></a>
                        </div>
                        <div class="navbar-collapse collapse">
                            <ul class="nav navbar-nav pull-right">
                                <li><a href="PageAccueilUSER.php">Accueil</a></li>
                                <li><a href="CommentCaM.php">Comment ça marche ?</a></li>


                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <span class="glyphicon glyphicon-user"></span> connecté <b class="caret"></b>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="deconnexion.php">Se déconnecter</a></li>
                                    </ul>
                                </li>
                                <?php }
                                }

                                // si la personne n'est pas connectée, on affiche ce header :


                                else { ?>
                                <div class="navbar navbar-inverse navbar-fixed-top headroom">
                                    <div class="container">
                                        <div class="navbar-header">
                                            <!-- Button for smallest screens -->
                                            <button type="button" class="navbar-toggle" data-toggle="collapse"
                                                    data-target=".navbar-collapse"><span class="icon-bar"></span> <span
                                                        class="icon-bar"></span> <span class="icon-bar"></span></button>
                                            <a class="navbar-brand"></a>
                                        </div>
                                        <div class="navbar-collapse collapse">
                                            <ul class="nav navbar-nav pull-right">
                                                <li><a href="indexQuest.php">Accueil</a></li>
                                                <li><a href="CommentCaM.php">Comment ça marche ?</a></li>


                                                <li>
                                                    <button id="con" class="btn btn-block btn-success"><span
                                                                class="glyphicon glyphicon-user"></span> connexion
                                                    </button>


                                                    <script>
                                                        // ce script permet l'affichage en page réduite de la page de connexion :

                                                        $("#con").click(function () {
                                                            $("#infos").modal({remote: "connexionQuest.php"}, "show");
                                                        });


                                                    </script>
                                                </li>
                                                <?php } ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

