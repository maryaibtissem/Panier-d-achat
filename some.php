<?php
session_start();

$valeurChamps = $_POST['valeurChamps'];
$idArticle = $_POST['idArticle'];
//echo $idArticle."<br>";
//echo $valeurChamps;

$prix=0;
include('connexion.php');  
$req1 = $connexion->prepare("SELECT * FROM article WHERE id_article = ?");
       $req1->execute(array($idArticle));     

    while($row1 = $req1->fetch()) 
    {
    $prix =$row1['prix']*$valeurChamps;
//    echo $prix."<br>";
    
    $qte=0;    
    foreach ($_SESSION['panier'] as $key => $article) 
    {
        if($article[0]==$row1['id_article']) 
        {
           
            $_SESSION['panier'][$key][1]=$valeurChamps;
            break;
        }
     
    }
        
    }


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

$arr = array('qte' =>$a,'prix' =>$prix);
echo json_encode($arr);
