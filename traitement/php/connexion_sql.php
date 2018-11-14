<?php
//Connexion a la base de donnees
try
{
    $bdd=new PDO('mysql:host=localhost;dbname=a_vente_patiserie','root','');
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}
