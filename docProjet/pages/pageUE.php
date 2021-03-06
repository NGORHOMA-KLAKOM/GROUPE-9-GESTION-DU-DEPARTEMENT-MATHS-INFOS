<?php
//Page Chef de departement
require_once('role.php');
require_once("connexiondb.php");
//recuperation des information de connexion
$login = isset($_GET['login']) ? $_GET['login'] : "";
$size = isset($_GET['size']) ? $_GET['size'] : 3;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($page - 1) * $size;

$requeteUser = "select * from utilisateur where login like '%$login%'";
$requeteCount = "select count(*) countUser from utilisateur";

$resultatUser = $pdo->query($requeteUser);
$resultatCount = $pdo->query($requeteCount);

$tabCount = $resultatCount->fetch();
$nbrUser = $tabCount['countUser'];
$reste = $nbrUser % $size;
if ($reste === 0)
    $nbrPage = $nbrUser / $size;
else
    $nbrPage = floor($nbrUser / $size) + 1;
?>
<! DOCTYPE HTML>
    <HTML>

    <head>
        <meta charset="utf-8">
        <title>Gestion des UE</title>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
    </head>

    <body>
        <?php include("header.php"); ?>

        <div class="container">
        
<br>
            <div class="panel panel-success margetop60">
                <div class="panel-heading">
                Rechercher une UE</div>
                <div class="panel-body">
                    <form method="get" action="utilisateurs.php" class="form-inline">
                        <div class="form-group">
                            <input type="text" name="login" placeholder="Login" class="form-control" value="<?php echo $login ?>" />
                        </div>
                        <button type="submit" class="btn btn-success">
                            <span class="glyphicon glyphicon-search"></span>
                            Chercher...
                        </button>
                        <a href="nouvelleFiliere.php">
                            <span class="glyphicon glyphicon-plus"></span>
                            Ajoutez une UE
                        </a>
                    </form>

                </div>
            </div>

            <div class="panel panel-primary">
                <div class="panel-heading">Liste des UE (<?php echo $nbrUser ?> UE)</div>
                <div class="panel-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>N°</th>
                                <th>Nom une UE</th>
                                <th>Code UE</th>
                                <th>Niveau</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>

                        </tbody>
                    </table>
                    <div>
                        <ul class="pagination">
                            <?php for ($i = 1; $i <= $nbrPage; $i++) { ?>
                                <li class="<?php if ($i == $page) echo 'active' ?>">
                                    <a href="utilisateurs.php?page=<?php echo $i; ?>&login=<?php echo $login ?>">
                                        <?php echo $i; ?>
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </body>

    </HTML>