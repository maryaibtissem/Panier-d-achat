 <?php
session_start();

//echo $_GET["id"];
if(!isset($_SESSION['panier']))
{
    
$_SESSION['panier'] = array();
    
}

$isid=false;
$keyArticle=0;

foreach ($_SESSION['panier'] as $key => $article) 
            {
//                echo "TEST ";var_dump ( $article[0]); var_dump ( $_GET["id"]);echo "<br><br><br><br>";
				if($_GET["id"]==$article[0]) 
                    { 
						$isid = true;
                        $keyArticle=$key;
					}
				
			}  
if($isid==false)
{
array_push($_SESSION['panier'],array($_GET["id"],1));

}
else
{

$_SESSION['panier'][$keyArticle][1]++;    
}

var_dump($_SESSION['panier']);
$a= NbrArticles();
$_SESSION['nbr']= $a;
//session_destroy();

header("Location: page.php");

function NbrArticles()
{
   $total=0;
   foreach ($_SESSION['panier'] as $key => $article) 
   {
      $total +=$article[1];
   }
   return $total;

}





?> 