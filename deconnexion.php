<?php
// le fichier de deconnexion supprime la session et renvoie vers l'index
session_start();
session_destroy();
header("Location: indexQuest.php"); ?>