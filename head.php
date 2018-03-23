<head>

    <!--
    Le titre évolue en fonction du contenu de la variable '$titrePage'.
    Initialiser la variable dans le code HTML avant le require_once.
    -->

    <!--Compatibilité -->
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Style -->

    <link rel="stylesheet"  href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet"  href="bootstrap/css/bootstrap-theme.css">
    <link rel="stylesheet"  href="style/style.css">

    <!-- JS -->
    <script src="script/jquery-3.3.1.js"></script>
    <script src="bootstrap/js/bootstrap.js "></script>

    <!-- Titre dynamique et icône -->
    <title><?php if(isset($titrePage)) echo $titrePage; else echo "QUEST UX Analytics";?></title>


</head>