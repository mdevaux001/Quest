<?php
session_start();
require('connect_to_quest.php');
$loged = $_SESSION['connecte'];
$_validation_user = $_SESSION['validationUSER'];
$_validation_exp = $_SESSION['validationEXP'];

?>
<?php if ($loged)
{
if ($_validation_exp)
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

                <li><a href="PageAcceuilEXP.php">Home</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">More Pages <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="sidebar-left.html">Left Sidebar</a></li>
                        <li class="active"><a href="sidebar-right.html">Right Sidebar</a></li>
                    </ul>
                </li>
                <li><a href="contact.html">Contact</a></li>
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
                if ($_validation_user){ ?>
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
                                <li><a href="PageAccueilUSER.php">Home</a></li>
                                <li><a href="about.html">About</a></li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">More Pages <b
                                                class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="sidebar-left.html">Left Sidebar</a></li>
                                        <li class="active"><a href="sidebar-right.html">Right Sidebar</a></li>
                                    </ul>
                                </li>
                                <li><a href="contact.html">Contact</a></li>
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
                                                <li><a href="indexQuest.php">Home</a></li>
                                                <li><a href="about.html">About</a></li>
                                                <li class="dropdown">
                                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">More
                                                        Pages <b class="caret"></b></a>
                                                    <ul class="dropdown-menu">
                                                        <li><a href="sidebar-left.html">Left Sidebar</a></li>
                                                        <li class="active"><a href="sidebar-right.html">Right
                                                                Sidebar</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="contact.html">Contact</a></li>
                                                <li>
                                                    <button id="con" class="btn btn-block btn-success"><span
                                                                class="glyphicon glyphicon-user"></span> connexion
                                                    </button>


                                                    <script>


                                                        $("#con").click(function () {
                                                            $("#infos").modal({remote: "connexionQuest.php"}, "show");
                                                        });


                                                    </script>
                                                </li>
                                                <?php } ?>
                                            </ul>
                                        </div><!--/.nav-collapse -->
                                    </div>
                                </div>

