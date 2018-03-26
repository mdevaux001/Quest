<?php

require('connect_to_quest.php');
$stmt = $BDD->prepare('SELECT valeur,quest FROM reponse WHERE usr=367674');
$stmt->execute(array());
$data=array();
foreach ($stmt as $rep)
{
    $data[]=$rep;
}

print json_encode($data);






