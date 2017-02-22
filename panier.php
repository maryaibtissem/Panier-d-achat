<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    
<script
    src="https://code.jquery.com/jquery-3.1.1.js"
    integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA="
    crossorigin="anonymous">
</script>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="style.css" />
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
<a id='papa' href="page.php"> Panier &nbsp;<i class="fa fa-shopping-cart" aria-hidden="true"></i>(<?php echo $k?>)</a>
</div>
 
    </header>
    
<section id="content">
<?php
$prix=0;
include('connexion.php');  

foreach ($_SESSION['panier'] as $key => $article) 
{
    
    
$req1 = $connexion->prepare("SELECT * FROM article WHERE id_article = ?");
       $req1->execute(array($article[0]));     

    while($row1 = $req1->fetch()) 
           {?>
    <div class="article">
        <?php 
            $prix= $row1["prix"]*$article[1];
            echo "<div ' ><img src=".$row1["chemin"].">"."<br></div>";
            echo " Prix Unitaire : &nbsp;".$row1["prix"]."<br>";
            echo "Prix Totale : &nbsp;<div class='resultat'>".$prix."<br></div>";   
            echo '<input class="champCache" type="hidden" name="id" value='.$row1["id_article"].'>';  
            echo '<input min ="1" class="rech" type="number" name="cpt" value='.$article[1].'> &nbsp;'; 
            echo '<a href="supprimer.php?id='.$row1["id_article"].'"><i class="fa fa-trash-o" aria-hidden="true"></i></a>';
        ?>   
   </div>                   
        <?php
           }    
}

?>
    


</section>
    
    <script>
    
    $('.rech').on('change',function() {
        var clicked = $(this);
        var idArticle = $(this).parent().find(".champCache").val();
        var valeurChamps = $(this).val();
        
//        console.log(idArticle);
//        console.log(valeurChamps);
        
        
        $.ajax({ 
                method: "POST",
     
                url: "some.php",
                data: {'valeurChamps': valeurChamps ,' idArticle':idArticle}, // je passe la variable JS
                success: function(msg)
                { 
//                    console.log(msg);
                    var myObj = JSON.parse(msg);
                    console.log(myObj.qte);
                    console.log(myObj.prix);
             
                clicked.parent().find(".resultat").empty();
                clicked.parent().find(".resultat").append(myObj.prix);
                $("#papa").html(' Panier &nbsp;<i class="fa fa-shopping-cart" aria-hidden="true"></i>('+myObj.qte+')');
                    
                }
            });   
//        
    })
    
    
    </script>

</body>
</html>