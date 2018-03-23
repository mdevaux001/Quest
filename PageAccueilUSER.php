<?php
require('connect_to_quest.php');
?>

<!doctype html>
<html>


<?php require_once'head.php';?>

<body>

<?php require_once'headerQuest.php';
$idUSER = $_SESSION['idUSER'];
$select_qutaire = $BDD->prepare('SELECT qutaire_titre FROM questaire WHERE qutaire_id =
                                          (SELECT qutaire FROM reponse GROUP BY usr HAVING usr = ?)');
$select_qutaire->execute(array($idUSER));
?>
<header id="headUSER">
    <div class="container">
        <div class="row">
            <div class="container">
                <div class="row" >
                    <div class="col-md-4" >

                    </div>
                    <div class="col-md-4" id="description">
                        <h1 >Page d'acceuil USER </h1>
                    </div>
                    <div class="col-md-4" >
                    </div>
                </div>
            </div>
            <h1 class="lead">Bienvenue ! </h1>
        </div>
    </div>
    </div>
</header>

<?php if(!isset($idUSER))
    echo "Erreur"; ?>

<div class="container">
    <div class="row" >
        <div class="col-md-6" >
            <h1 id="conteneurPageUSER1">Répondre à un questionnaire</h1>

            <form class="form-signin form-horizontal" role="form" action="RepondreQuestionnaire.php" method="post">
                <div class="form-group">
                    <div class=" col-md-6 " id="code">
                        <label for="code">Entrez le code questionnaire  : </label>
                        <input type="number" name="code_qutaire" id="code" class="form-control" placeholder="Entrez le code" required>
                    </div>
                    <br/>

                    <div class="col-md-6 " >
                        <button type="submit" class="btn btn-default btn-primary" id="btncode"><span class="glyphicon glyphicon-circle-arrow-right"></span> start !</button>
                    </div>
                </div>


            </form>
        </div>
        <div class="col-md-6">

            <h2  id="conteneurPageUSER2"> Liste des questionnaires auxquels vous avez déja participé  : </h2>
            <?php
            if(!empty($select_qutaire))
            {
                while ($questaire = $select_qutaire->fetch())
                { ?>
                    <article>
                        <h5><a class="nom_experience" href=""><?=$questaire['qutaire_titre']?></a></h5>
                    </article>
                    <?php
                }
            }
            else
                echo "Vous n'avez pas encore participé à un questionnaire";
            ?>
        </div>
    </div>

    <HR width="80%"/>
    <?php require_once "footerQuest.php"; ?>

</body>
</html>