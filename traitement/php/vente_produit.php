<?php
include_once('connexion_sql.php');
session_start();
include_once('logout.php');

if(isset($_POST['user']))
{
    $_SESSION['id']=$_POST['user'];
}

if(isset($_GET['validate_panier']))
{
    $bdd->query('INSERT INTO vente (codProd, qte_vente, prix_total,date_vente) SELECT codProd, qte_com, prix_total,date_vente FROM panier') or die(print_r($bdd->errorInfo()));

    echo '<script>alert("Le produit a bien ete ajoute au vente")</script>';

    //Vider la table panier a la fin de la saisie du panier
    $bdd->query('TRUNCATE TABLE panier') or die(print_r($bdd->errorInfo()));
}

if(isset($_POST['designation']) AND isset($_POST['quantite']))
{
    $req=$bdd->prepare('INSERT INTO panier(codProd, qte_com, prix_total,supplement,date_vente) VALUES (:codProd,:qte_com,(:qte_com*(SELECT prixUnitaire FROM produit WHERE codProd=:codProd))+:supplement,:supplement,CURRENT_DATE )') or die(print_r($bdd->errorInfo()));
    $req->execute(array(
        ':codProd'=>$_POST['designation'],
        ':qte_com'=>$_POST['quantite'],
        ':supplement'=>$_POST['supplement']
    ));
    echo '<script>alert("Le produit a bien ete ajoute au panier")</script>';
}
$reponse2=$bdd->query('SELECT * FROM produit') or die(print_r($bdd->errorInfo()));


//suppression d'un element du  panier
if(isset($_GET['id']))
{
    $req=$bdd->prepare('DELETE FROM panier WHERE id=:id') or die(print_r($bdd->errorInfo()));
    $req->execute(array(
        'id'=>$_GET['id']
    ));
    echo '<script>alert("La suppresion a ete prise en compte")</script>';
}
$reponsesup=$bdd->query('SELECT * FROM panier') or die(print_r($bdd->errorInfo()));
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
        [class*="titre"]
        {
            margin-left: 37%;
            margin-right: 35%;
        }
        [class*="message"]
        {
            margin-left: 43%;
            margin-right: 35%;
        }
        [class="btn btn-primary"]
        {
            margin-left: 37%;
            margin-right: 40%;
        }
    </style>
    <title>Vente Produit</title>
</head>
<body>
<div class="container">
    <?php include("menu.php"); ?>
    <form class="form-horizontal" action="vente_produit.php" method="post" onsubmit="return validate(this)">
        <fieldset>
            <h2 class="titre">Ajout produit au panier:</h2>
            <div class="form-group">
                <label class="col-md-4 control-label"></label>
                <div class="col-md-4">
                    <select name="designation" id="designation" class="form-control input-md">
                        <?php
                        $reponse=$bdd->query('SELECT * FROM produit') or die(print_r($bdd->errorInfo()));
                        while($donnees=$reponse->fetch())
                        {
                            ?>
                            <option value="<?php echo htmlspecialchars($donnees['codProd']);?>"><?php echo htmlspecialchars($donnees['designation']);?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label"></label>
                <div class="col-md-4">
                    <input type="text" id="quantite" name="quantite" placeholder="Quantite" class="form-control input-md">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label"></label>
                <div class="col-md-4">
                    <input type="text" id="supplement" name="supplement" placeholder="supplement" class="form-control input-md">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label"></label>
                <div class="col-md-4 control-label">
                    <input type="submit" value="Ajouter au panier" class="btn btn-info btn-block">
                </div>
            </div>
        </fieldset>
    </form>
    <div class="row">
        <section class="col-sm-12">
            <div class="panel panel-primary">
                <table class="table table-striped table-condensed">
                    <div class="panel-heading">
                        <h3 class="panel-title">Contenu panier</h3>
                    </div>
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Designation</th>
                        <th>Type unite</th>
                        <th>Quantite acheter</th>
                        <th>Prix unitaire</th>
                        <th>Supplement</th>
                        <th>Prix total ligne</th>
                        <th> </th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $reponse3=$bdd->query('SELECT id, designation, unite, qte_com, prixUnitaire,panier.supplement, prix_total FROM panier, produit WHERE panier.codProd=produit.codProd') or die(print_r($bdd->errorInfo()));
                    $verification=false;
                    while($donnees3=$reponse3->fetch())
                    {
                        $verification=true;
                        ?>
                        <tr>
                            <td><?php echo htmlspecialchars($donnees3['id']);?></td>
                            <td><?php echo htmlspecialchars($donnees3['designation']);?></td>
                            <td><?php echo htmlspecialchars($donnees3['unite']);?></td>
                            <td><?php echo htmlspecialchars($donnees3['qte_com']);?></td>
                            <td><?php echo htmlspecialchars($donnees3['prixUnitaire']);?></td>
                            <td><?php echo htmlspecialchars($donnees3['supplement']);?></td>
                            <td><?php echo htmlspecialchars($donnees3['prix_total']);?></td>
                            <td>
                                    <a><?php echo '<a href="vente_produit.php?id=' . $donnees3['id'] .'">'; ?>
                                        <button class="btn btn-primary btn-xs">Supprimer</button>
                                    </a>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>
                <?php
                if($verification==false)
                {
                    echo '<h3 class="message">Panier vide</h3>';
                }
                ?>
            </div>
        </section>
    </div>
    <a href="vente_produit.php?validate_panier=true"><button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-ok-sign"></span> Valider panier et passer commande</button></a>
</div>
<script src="../js/validate_form_panier.js"></script>
<script src="../js/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script>
    $(function(){
        $('blockquote a').tooltip();
    });
</script>
</body>
</html>
