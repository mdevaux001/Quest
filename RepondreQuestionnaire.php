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
<body>
<div class="row">
    <div class="col-md-2">
    </div>
    <div class="col-md-4">
        <h1><?= $questionnaire['qutaire_titre']; ?></h1>
    </div>
    <div class="col-md-6">
        <p><?= $questionnaire['qutaire_desc']; ?></p>
    </div>
</div>
<form method="POST" action="TraiterRepondreQuestionnaire.php?qutaire=<?=$code?>">

    <?php
    //On selectionne les questions correspondantes dans la TABLE contient

    $requete = $BDD->prepare('SELECT * FROM contient WHERE qutaire=?');
    $requete->execute(array($code));

    while ($questionnaire = $requete->fetch()) {
        $question_requete = $BDD->prepare('SELECT * FROM question WHERE quest_id=?');
        $question_requete->execute(array($questionnaire['quest']));

        $question = $question_requete->fetch();

        ?>
        <div class="row">
        <div class="offset-md-2 col-md-8">
        <div class="form-check form-check-inline">
        <legend> <?= $question['quest_text'] ?> </legend>

        <?php
        for ($ind = 1; $ind <= $question['quest_ech']; $ind++) {
            ?>
            <input class="form-check-input" type="radio" name="<?= $question['quest_id']; ?>" id="<?= $ind; ?>"
                   value="<?= $ind; ?>"/>

            </div> |
            </div>
            </div>
            <?php
        }
    }
    }
    }
    ?>
    <button type="submit" class="btn btn-default btn-primary">Valider</button>
    <button type="reset" class="btn btn-default btn-primary">Recommencer</button>
</form>
</body>
</html>