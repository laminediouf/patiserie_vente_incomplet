<?php
include_once('connexion_sql.php');
session_start();
include_once('logout.php');
$reponse=$bdd->query('select designation,prixUnitaire,qte_vente,prix_total,date_vente from produit,vente WHERE produit.codProd=vente.codProd') or die(print_r($bdd->errorInfo()));
//$reponseT=$bdd->query('SELECT sum(qte_vente * prixUnitaire) as MontantTotal FROM produit,vente WHERE produit.codProd=vente.codProd') or die(print_r($bdd->errorInfo()));

$reponseT=$bdd->query('SELECT sum(prix_total) as MontantTotal FROM vente') or die(print_r($bdd->errorInfo()));

/* requette pour la recherche*/
 $rech=$bdd->prepare('select date_vente from vente WHERE  date_vente LIKE "%%"') or die(print_r($bdd->errorInfo()));
/* fin du processus de Recherche*/
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

        /*bouton recherche*/


        #custom-search-input {
            margin:0;
            margin-top: 5px;
            padding: 0;
        }

        #custom-search-input .search-query {
            padding-right: 3px;
            padding-right: 4px \9;
            padding-left: 3px;
            padding-left: 4px \9;
            /* IE7-8 doesn't have border-radius, so don't indent the padding */

            margin-bottom: 0;
            -webkit-border-radius: 3px;
            -moz-border-radius: 3px;
            border-radius: 3px;
        }

        #custom-search-input button {
            border: 0;
            background: none;
            /** belows styles are working good */
            padding: 2px 5px;
            margin-top: 2px;
            position: relative;
            left: -28px;
            /* IE7-8 doesn't have border-radius, so don't indent the padding */
            margin-bottom: 0;
            -webkit-border-radius: 3px;
            -moz-border-radius: 3px;
            border-radius: 3px;
            color:#D9230F;
        }

        .search-query:focus + button {
            z-index: 3;
        }



    </style>
    <title>Liste produit</title>
</head>
<body>
<div class="container">
    <?php include("menu.php"); ?>
    <div class="row">
     <section class="col-sm-6">

         <div id="custom-search-input">
             <div class="input-group col-md-12">
                 <input type="text" class="search-query form-control" id="btnsearch" name="btnsearch" placeholder="Search" />
                 <span class="input-group-btn">
                     <button class="btn btn-danger" type="button" id="btnsearch" name="btnsearch">
                         <span class=" glyphicon glyphicon-search"></span>
                     </button>
                 </span>
             </div>
         </div>

     </section>
    </div>
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
                        <th>Prix Unitaire</th>
                        <th>Quantite Vendu</th>
                        <th>Prix total</th>
                        <th>date de vente</th>
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
                            <td><?php echo htmlspecialchars($donnees['prixUnitaire']);?></td>
                            <td><?php echo htmlspecialchars($donnees['qte_vente']);?></td>
                            <td><?php echo htmlspecialchars($donnees['prix_total']);?></td>
                            <td><?php echo htmlspecialchars($donnees['date_vente']);?></td>
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
²²