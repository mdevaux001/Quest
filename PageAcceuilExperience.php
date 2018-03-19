<!doctype html>

<?php
    session_start();

    require('connect_to_quest.php');
    $idExperience = $_GET['id'];
    $stmt = $BDD->prepare('select * from experience where exr_id=?');
    $stmt->execute(array($idExperience));
    $experience = $stmt->fetch();

    $requete=$BDD->prepare('select * from campagne where camp_exr=?');
    $requete->execute(array($idExperience));

    $req=$BDD->prepare('select exp from lancer where exr=?');
    $req->execute(array($idExperience));
   
     

?>
<html>
<?php require_once "head.php"; ?>
<body >
    <?php require_once "headerQuest.php"; ?>
<header id="headexp">
    <div class="container">

        <div class="row">
            <div class="container">
      <div class="row" >
            <div class="col-md-4" >
            
                          
            </div>
            <div class="col-md-4" id="description">
                <h1 ><?= $experience['exr_nom'] ?></h1>
        <p><small><?= $experience['exr_desc'] ?></small></p>

            </div>
            <div class="col-md-4" >
              
            </div>

     
          </div>
       
            
          </div>
            <h1 class="lead">Gestion d'expérience </h1>


        </div>
    </div>
</header>



<div class="container-fluid">
   


    <article class="col-md-8 maincontent" >
        <div class="container">

        <div class="row">
            <div class="container">
      <div class="row" >
         <br/>
    <br/>
    <br/>
            <div class="col-md-4" id="gptravail">
                      <span id="code">Code de l'expérience : <?php echo $idExperience?></span>
        <br/>
        <span id="expli">Partagez ce code avec les expérimentateurs que vous souhaitez inviter dans votre groupe de travail</span>
        <br/>
        <span id="membre">Membres du groupe de travail :</span>
        <br/>
        <?php
         foreach ($req as $id) 
    {
        $iden=$id["exp"];
        $reque=$BDD->prepare('select * from experiment where exp_id=?');
        $reque->execute(array($iden));
        foreach ($reque as $nom) 
        {   echo '<br/>';
            echo $nom['exp_nom']." "; 
            echo $nom['exp_prenom']." ";
            echo $nom['exp_mail'];
        }
   }
                       
            ?>
        
                          
            </div>
            <div class="col-md-4" >
     

            </div>
            <div class="col-md-4" >
              
            </div>

     
          </div>
       
            
          </div>
       

    </article>

    
    <aside class="col-md-4 sidebar sidebar-right">
        <h2 id="listexp"> Liste des campagnes dans cette expérience : </h2>
        <?php foreach ($requete as $campagne) { ?>
                       <article>
                        <h5><a class="nom_campagne" href="PageAcceuilCampagne.php?id=<?=$campagne['camp_id']?>"><?= $campagne["camp_nom"] ?></a></h5>
                        
                      
                    <?php } ?>
                        <h3><a  href="CreerCampagne.php?id=<?=$idExperience?>">Ajouter une campagne</a></h3>
                      </article>
    </aside>
</div>

<HR width="80%"/>
<?php require_once "footerQuest.php"; ?>

</body>
</html>
