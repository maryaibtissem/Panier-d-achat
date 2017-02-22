<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="style.css" />
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

<title>Document sans nom</title>
</head>

<body>
<header>
<?php
if(!isset ($_SESSION['nbr']))
{
$k= 0;   
} 
 else 
    {
        $k=$_SESSION['nbr'];    
    }
  
 ?>
<div id='panier'>
<a href="panier.php"> Panier &nbsp;<i class="fa fa-shopping-cart" aria-hidden="true"></i>(<?php echo $k?>)</a>
</div>
 
    </header>
<section>
<?php
include('connexion.php');    

    
$req1= $connexion->query("SELECT * FROM article LIMIT 0, 6  ");       
    
    while($row1 = $req1->fetch())  
    {?>
    <article><?php
	echo "<img src=".$row1["chemin"].">"; 
  
    echo '<div id="padd"><a  href="traitement.php?id='.$row1["id_article"].'"> Ajouter dans le panier > </a><br>';
    echo '<h3> Prix &nbsp'.$row1["prix"].'</h3></div>';
    ?>                  
   
    </article> 
    <?php
    }   

?>
</section>
    
    

</body>
</html>
