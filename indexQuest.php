<?php session_start();

require('connect_to_quest.php');

$_SESSION['connecte']=false;
$_SESSION['validationEXP']=false;
$_SESSION['validationUSER']=false;
?>

<!doctype html>
<html>

<?php require_once "head.php"; 
?>

  <body id="index">
    <?php require_once "headerQuest.php"; ?>
    <br/>
    <br/>
    <br/>
    
    

   
    <header >
     <div class="container">
      <div class="row" id="case1" >
        <h1 id="Bienvenue">Bienvenue sur Quest, </h1>
        <h1 id="lesite"> le site de partage et de passation de questionnaires</h1>
        <button id="btn" type="button" class="btn btn-secondary" > Comment ça marche ?
       </button>
     
          </div>
        </div>
          <br/>
          <HR size=5 width="80%"/>
          <br/>
          
          <div class="row" >
            <div class="col-md-5" id="casedroite">
              <h1 id='expérimentateur'>Vous êtes un expérimentateur ?</h1>
              <a  href="CreationCompteExpe.php"><button id="btn1" type="button" class="btn btn-secondary"> Créez un compte
              </button></a>
            </div>
            <div class="col-md-2" id="casemilieu">
            </div>
            <div class="col-md-5" id="casegauche">
              <h1 id='expérimentateur'>Vous souhaitez répondre à un questionnaire ?</h1>
              <button id="btn2" type="button" class="btn btn-secondary" > Cliquez ici
              </button>
            </div>

     
          </div>


      
    
        
        
      </div>
  
  </header>
 
      <div class="modal fade" id="infos">
        <div class="modal-dialog">  
          <div class="modal-content"></div>  
        </div> 
      </div>
    </div>
   
   
  
<HR size=5 width="80%"/>
<?php require_once "footerQuest.php"; ?>
  </body>

</html>