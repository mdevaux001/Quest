<?php session_start();
require('connect_to_quest.php');

?>

<!doctype html>
<html>

<?php require_once "head.php";
?>

<body id="fondgris">
<?php require_once "headerQuest.php"; ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1> Comment ça marche ? </h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h3> Vous souhaitez lancer votre campagne de questionnaires : </h3>
            <br/>
            <p>Si vous souhaitez lancer votre campagne de questionnaire, vous devez vous créer un compte expérimentateur.
            Une fois que votre compte est créé, vous pouvez créer votre propre expérience ou rejoindre une expérience existante
            si un collègue expérimentateur vous a fourni un code expérience. </p>
            <br/>
            <p>Une expérience contient une ou plusieurs campagne(s) qui elle(s) même contien(nen)t un ou plusieurs questionnaire(s)
            . Depuis votre page d'acceuil, vous pouvez accéder aux expériences que vous avez créé, puis aux campagnes, puis aux questionnaires.
            Vous pouvez supprimer ou modifier chaque niveau d'une expérience à tout moment grâce aux boutons modifier et supprimer
            en bas à gauche de l'écran.</p>
            <br/>
            <p>Lorque vous créez une expérience, un code expérience vous est fourni. Vous pouvez partager ce code avec d'autres
            expérimentateurs si vous voulez créer un groupe de travail.</p>
            <br/>
            <p>Lorsque vous créez un questionnaire, un code questionnaire vous est fourni. Vous pouvez partagez ce code avec les
            utilisateurs que vous souhaitez faire participer au questionnaire.</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h3> Vous souhaitez répondre à un questionnaire : </h3>
            <br/>
            <p> On vous a fourni un code et vous souhaitez répondre à un questionnaire en ligne ? Il vous suffit de créer
            un compte utilisateur. Une fois votre compte créé, vous pourrez répondre au questionnaire après avoir entré votre code
            . Vous pourrez ensuite consulter vos réponses, mais vous ne pourrez pas les modifier.</p>
        </div>
    </div>
</div>



<HR size=5 width="80%"/>
<?php require_once "footerQuest.php"; ?>
</body>

</html>