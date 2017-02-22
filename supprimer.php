<?php
session_start();
echo $_GET["id"];

$_SESSION['panier2']=array();

foreach ($_SESSION['panier'] as $key => $article) 
{
    
   if($article[0]!=$_GET["id"])
   {
    array_push($_SESSION['panier2'],array($article[0],$article[1])) ;  
   } 
    
}

$_SESSION['panier'] = $_SESSION['panier2'];
//var_dump($_SESSION['panier']);
function NbrArticles()
{
   $total=0;
   foreach ($_SESSION['panier'] as $key => $article) 
   {
      $total +=$article[1];
   }
   return $total;

}
$a=NbrArticles();
$_SESSION['nbr']= $a;
header("Location: panier.php");

?>