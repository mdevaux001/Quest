<?php
require('connect_to_quest.php');
$idUSER = $_SESSION['idUSER'];
?>

<!doctype html>
<html>


<?php require_once'head.php';?>

<body>
  
    <header id="headUSER">
   
        <div class="container">
        <

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
<?php require_once'headerQuest.php';
$idEXP=$_SESSION['idUSER'];
$stmt = $BDD->prepare('select * from experience,lancer where lancer.exp=? and lancer.exr=experience.exr_id');
$stmt->execute(array($idEXP));

?>

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
  if(!empty($stmt))
{
    foreach ($stmt as $experience) { ?>
            <article>
                <h5><a class="nom_experience" href="PageAcceuilExperience.php?id=<?= $experience['exr_id'] ?>"><?= $experience['exr_nom'] ?></a></h5>
                
            </article> <?php } }
    else { echo "vous n'avez pas encore participé à un questionnaire";}
          ?>
    
    </div>
</div>
  
 
  <HR width="80%"/>
<?php require_once "footerQuest.php"; ?>


</body>
</html>