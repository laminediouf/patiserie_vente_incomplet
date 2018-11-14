<nav class="navbar navbar-inverse" role="navigation">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
    </div>
    <div class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
            <li><a href="accueil-admin.php">Accueil</a></li>
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Gestion utilisateurs<b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="liste-utilisateur.php">Liste utilisateur</a></li>
                    <li><a href="ajouter-utilisateur.php">Ajouter utilisateur</a></li>
                </ul>
            </li>

            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Magazin<b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="liste-produit.php">Liste produits</a></li>
                    <li><a href="ajouter-produit.php">Ajouter produits</a></li>
                    <li><a href="inventaire_prod.php">Inventaire des produits</a></li>
                </ul>
            </li>

              <li><a href="vente_produit.php">Vente de produit</a></li>
              <li><a href="inventaire_vente.php">Inventaire Vente</a></li>
            <?php /*
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Gestion commande et livraison<b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="achat.php">Vente</a></li>
                    <li><a href="liste-commande.php">Liste des Ventes</a></li>
                    <li><a href="inventaire_cmd.php">Inventaire des Ventes Par Date</a></li>
                </ul>
            </li>
  */?>
            <li><a href="deconnection.php">Deconnection</a></li>
        </ul>
    </div>
</nav>
