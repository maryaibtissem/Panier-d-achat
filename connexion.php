<?php
$serveur = "localhost";
$user = "root";
$password = "";
$name_bdd = "pannier";

try
{
	$connexion = new PDO('mysql:host='.$serveur.';dbname='.$name_bdd.';charset=utf8', $user, $password);
       $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

?>