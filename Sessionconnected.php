<?php
session_start();
    $name = $_SESSION['nom'] . ' ' . $_SESSION['prenom'];
    echo "<style>
    h1 {
        text-align: center;
        font-size: 50px;
        color: #ddd;
        text-transform: capitalize;
        </style>" ;
        echo " <h1> Bonjour, $name </h1>"; 
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BloomBay</title>
    <link rel="icon" href="icons/icon.png" >   
  <link rel="stylesheet" href="style.css">
</head>
<body>
    
   <section class="header"> 
        <div class="menu"></div>
        <div class="text">
            <h1>BloomBay</h1>
            <div>
                <br>
                <a href="http://localhost:3000/Panier.html" class="btnstyle">
                    <img src="cart.png" alt="Panier"> 
                </a>
                <a href="http://localhost:3000/Account%20creation.php" class="btnstyle">
                    <img src="account.png" alt="Compte" class="icon-account">
                </a>
                <br>
            </div> 
    
            <a href="http://localhost:3000/Panier.html" class="btnstyle">Découvrez votre bonheur floral avec nous</a>  
        </div>
        <div class="nav">
            <div class="links">

                <a href="http://localhost:3000/Page%20d'acceuil.html">Acceuil</a>
                <a href="http://localhost:3000/Panier.html">Produits</a>
                
            </div>
            <div class="image">
                <img src="img/500.jpg">
            </div>
        
        </div>

   </section>


   <!-- header -->
   <!--the best -->
   <section class="the-best"> 
    <div class="left">
        <h3 class="title"> Nous sommes les meilleurs </h3>
        <p class="small_text"> Bienvenue sur BloomBay Plongez dans un univers de beauté florale où chaque pétales raconte une histoire, où chaque bouquet évoque une émotion. Chez BloomBay, nous sommes dédiés à vous offrir une expérience florale inoubliable, directement depuis le confort de votre foyer</p>
        <a href="#" class="btnstyle"> nous contacter </a>
     </div>
     <div class="right">
        <img src="img/0.jpg">
     </div>

   </section>
   <!--the best -->

   <!-- picture -->
   <section class="picture">
    <div class="image_content">
        <div class="content">
            <h2>BloomBay,joie garantie !</h2>
        </div>
    </div>
   </section>
   <!-- picture -->

   <!--services-->
   <section class="services">
    <h1 class="title">Nos services</h1>
    <div class="list_services">
        <div class="box">
            <img src="img/low-price.png">
            <h2> Le moins cher</h2>
            <a href="#" class="btnstyle">Voir plus</a>
        </div>
        <div class="box">
            <img src="img/livraison.png">
            <h2> La livraison</h2>
            <a href="#" class="btnstyle">Voir plus</a>
        </div>
        <div class="box">
            <img src="img/speedometer.png">
            <h2> Rapidité</h2>
            <a href="#" class="btnstyle">Voir plus</a>
        </div>
        <div class="box">
            <img src="img/flower_bucket_roses_valentine_love_romantic_valentines_day_icon_233307.png">
            <h2> Votre bouquet personnalisé</h2>
            <a href="#" class="btnstyle">Voir plus</a>
        </div>
    </div>

  <!--contact-->
  <section class="contact">
    <h1 class="titre">Nous contacter </h1>
    <div class="container">
       <form action="" >
        <label>Nom</label>
        <input type="text" placeholder="ex : Faiz Dev">
        <label>Email</label>
        <input type="text" placeholder="ex : dev@gmail.com">
        <label>Message</label>
        <textarea placeholder="Vote message..." cols="30" rows="10"></textarea>
        <button>Envoyer</button>

       </form>
       <div class="form_img">
        <img src="img/200.0.jpg">
       </div>
    </div>

  </section>
  <!--contact-->
  <footer>
    <p>&copy2024 | All right are reseved</p>
  </footer>
  
  
   <script src="in.js"></script>
</body>
</html>