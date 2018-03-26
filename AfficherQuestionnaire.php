<!doctype html>

<?php session_start();

require_once('connect_to_quest.php');
require_once('scoring.php');

$validation = false;




$idUSER = $_SESSION['idUSER'];
$code=$_GET['id'];



$select_qutaire = $BDD->prepare('SELECT * FROM questaire WHERE qutaire_id=?');
$select_qutaire->execute(array($code));
$questionnaire = $select_qutaire->fetch();

// Si le questionnaire existe
if ($select_qutaire->rowCount() == 1)
    $validation = true;

if ($validation)
{

?>

<html>
<?php
$pageTitle = "Quest : " . $questionnaire['qutaire_titre'];
require_once 'head.php'; ?>
<body>

<br/>
<br/>
<br/>
<div class="container">
    <div class="row">
        <div class="col-md-4">
        </div>
        <div class="col-md-4" id="titrequestionnaire">
            <h1><?= $questionnaire['qutaire_titre']; ?></h1>
        </div>
        <div class="col-md-4">
        </div>

    </div>
    <div class="row">
        <div class="col-md-4">
        </div>
        <div class="col-md-4" id="titrequestionnaire">
            <p><?= $questionnaire['qutaire_desc']; ?></p>
        </div>
        <div class="col-md-4">

        </div>
    </div>
</div>

<div class="container" id="questio">
    <form>

        <?php
        //On selectionne les questions correspondantes dans la TABLE contient


        $requete = $BDD->prepare('SELECT * FROM contient WHERE qutaire=?');
        $requete->execute(array($code));

        while ($questionnaire = $requete->fetch())
        {
        $question_requete = $BDD->prepare('SELECT * FROM question WHERE quest_id=?');
        $question_requete->execute(array($questionnaire['quest']));

        $question = $question_requete->fetch();

        $select_reponse = $BDD->prepare('SELECT valeur FROM reponse WHERE quest=?');
        $select_reponse->execute(array($question['quest_id']));

        $reponse = $select_reponse->fetch();

        ?>
        <br/>
        <div class="row">
            <?php if ($question['type'] = "AttrakDiff") {

            } ?>

            <div class="col-md-12">
                <legend> <?= $question['quest_text'] ?> </legend>

                <p id="p">- +</p>
                <?php
                for ($ind = 1; $ind <= $question['quest_ech']; $ind++) {
                    ?>

                    <input type="radio" name="<?= $question['quest_id']; ?>" id="<?= $ind; ?>"
                           value="<?= $ind; ?>" <?php if (DonneesBrutes($question['quest_id'], $reponse['valeur'], $question['quest_id']) == $ind) {
                        echo "checked";
                    } ?>/>


                    <?php
                }
                }

                }
                ?>


            </div>
        </div>
    </form>

    <br/>
    <br/>
    <br/>
</div>
</body>
</html>