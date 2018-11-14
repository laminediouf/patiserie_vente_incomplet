<?php
include_once('connexion_sql.php');
session_start();
include_once('logout.php');
$reponse=$bdd->query('SELECT designation,quantite,prixUnitaire,quantite * prixUnitaire as Montant FROM produit') or die(print_r($bdd->errorInfo()));
$reponseT=$bdd->query('SELECT sum(quantite * prixUnitaire) as MontantTotal FROM produit') or die(print_r($bdd->errorInfo()));

?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <link href="../css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
        body
        {
            background-color: #DDD;
            padding-top: 10px;
        }
        [class*="col-"]
        {
            margin-bottom: 20px;
        }
        img
        {
            width: 100%;
        }
        .well
        {
            background-color: #CCC;
            padding: 20px;
        }
        a:active, a:focus
        {
            outline: none;
        }
        [class*="nav navbar-nav"]
        {
            margin-left: 35px;
        }
        [class*="panel panel-primary"]
        {
            margin-top: 5%;
        }
    </style>
    <title>Liste produit</title>
</head>
<body>
<div class="container">
    <?php include("menu.php"); ?>
    <div class="row">
        <section class="col-sm-12">
            <div class="panel panel-primary">
                <table class="table table-striped table-condensed">
                    <div class="panel-heading">
                        <h3 class="panel-title">Inventaire des Produits</h3>
                    </div>
                    <thead>
                    <tr>
                        <th>Designation</th>
                        <th>Quantite</th>
                        <th>Prix unitaire</th>
                        <th>Montant</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    while($donnees=$reponse->fetch())
                    {
                        ?>
                        <tr>
                            <td><?php echo htmlspecialchars($donnees['designation']);?></td>
                            <td><?php echo htmlspecialchars($donnees['quantite']);?></td>
                            <td><?php echo htmlspecialchars($donnees['prixUnitaire']);?></td>
                            <td><?php echo htmlspecialchars($donnees['Montant']);?></td>
                        </tr>
                    <?php } ?>

                    <?php
                    while($donnees=$reponseT->fetch())
                    { ?>
                        <tr>
                            <td></td>
                            <td></td>
                            <th> Montant Total</th>
                            <th><?php echo htmlspecialchars($donnees['MontantTotal']);?></th>
                        </tr>

                        <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </section>
    </div>
</div>
<script src="../js/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script>
    $(function(){
        $('blockquote a').tooltip();
    });
</script>
</body>
</html>
