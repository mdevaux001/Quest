<?php session_start();

require('connect_to_quest.php');

$idExperience = $_GET['id'];
$validation=false;
if (!empty($_POST['description']) and !empty($_POST['dateDebut'])and !empty($_POST['dateFin']) and !empty($_POST['nom']))
{
  $nom=$_POST['nom'];
  $desc=$_POST['description'];
  $dateDeb=$_POST['dateDebut'];
  $dateFin=$_POST['dateFin'];

  
  // Création d'un code à 4 charactères pour l'identifiant : 

    
  $characts = '1234567890';
  
  $id = ''; 
  for($i=0;$i < 7;$i++) 
   { $id .= substr($characts,rand()%(strlen($characts)),1); } 
  
  

  
  $requete=$BDD->prepare('INSERT INTO campagne(camp_id,camp_nom,camp_desc,camp_deb,camp_fin,camp_exr) VALUES(:id,:nom,:description,:dateDebut,:dateFin,:id_experience)');
  

  
  $requete->bindValue(':id', $id, PDO::PARAM_STR); 
  $requete->bindValue(':nom', $nom, PDO::PARAM_STR);  
  $requete->bindValue(':description', $desc, PDO::PARAM_STR);
  $requete->bindValue(':dateDebut', $dateDeb, PDO::PARAM_STR);
  $requete->bindValue(':dateFin', $dateFin, PDO::PARAM_STR);
  $requete->bindValue(':id_experience', $idExperience, PDO::PARAM_STR); 
  $requete->execute();

  
$_validation=true;


}
if ($_validation)
    {
        header("Location: http://localhost/web/Quest/PageAcceuilExperience.php?id=$idExperience");
    }

?>

