<!doctype html>

<?php session_start();

require_once('connect_to_quest.php');

$validation = false;

if (!empty($_POST['code_qutaire']))
{
// On verifie si le code questionnaire est correct

$code = $_POST['code_qutaire'];
$stmt = $BDD->prepare('SELECT * FROM questaire WHERE qutaire_id=?');
$stmt->execute(array($code));
$questionnaire = $stmt->fetch();
// Si le questionnaire existe
if ($stmt->rowCount() == 1) {
    $validation = true;
}

$question = array();

if ($validation)
{
$pageTitle = "Quest : " . $questionnaire['qutaire_titre'];
require_once('head.php');
?>

<html>
<?php require_once 'head.php'; ?>
<body>
<?php require_once 'headerQuest.php'; ?>
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
    <form method="POST" action="TraiterRepondreQuestionnaire.php?qutaire=<?= $code ?>">

        <?php
        //On selectionne les questions correspondantes dans la TABLE contient


        $requete = $BDD->prepare('SELECT * FROM contient WHERE qutaire=?');
        $requete->execute(array($code));

        while ($questionnaire = $requete->fetch()) {
        $question_requete = $BDD->prepare('SELECT * FROM question WHERE quest_id=?');
        $question_requete->execute(array($questionnaire['quest']));

        $question = $question_requete->fetch();

        ?>
        <br/>
        <div class="row">
            <?php if ($question['type']="AttrakDiff")
            {
                
            }?>

            <div class="col-md-12">
                <legend> <?= $question['quest_text'] ?> </legend>

                <p id="p">-  +</p>
                <?php
                for ($ind = 1; $ind <= $question['quest_ech']; $ind++) {
                    ?>


                    <input type="radio" name="<?= $question['quest_id']; ?>" id="<?= $ind; ?>"
                           value="<?= $ind; ?>"/>




                    <?php
                }
                }
                }
                }
                ?>


            </div>
        </div>

        <br/>
        <br/>
        <button type="submit" class="btn btn-default btn-primary">Valider</button>
        <button type="reset" class="btn btn-default btn-primary">Recommencer</button>
    </form>
</div>
</body>
</html>