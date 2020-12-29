<?php session_start(); ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Page de présentation </title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
  
</head>
<body>
    <div class="background" id="top_link">

        <?php 
        if(isset($_SESSION['user'])){

            include("include/header_index_connect.php") ; 
        }
        else{
            include("include/header_index.php") ; 
        }
        
        ?>

        
            <section id="presentation" class="animate__animated animate__fadeInDown animate__delay-1s">
                <article class="contenu_presentation">

                    <div class="text_pres">
                        <div class="contenu_text_pres">
                            <h1> Burger Classic </h1>
                            <h3>Une soirée agréable avec des plats délicieux ? – Nos plats sont fraîchement préparés dans une ambiance accueillante. Bienvenue dans notre restaurant Burger Classic. Nous sommes impatients de vous accueillir avec notre menu savoureux et de vous offrir une expérience inoubliable. Inscrivez-vous pour réserver !</h3>
                            <form action="pages/inscription.php">
                                <input type="submit" value="Découvrir">
                            </form>
                        </div>
                    </div>

                    <div class="img_pres">
                        <div>
                            <img src="media/chad-montano--GFCYhoRe48-unsplash.jpg" alt="burger">
                        </div>
                        <nav>   
                            <div>
                                <a href="https://fr-fr.facebook.com/"><i class="fa fa-facebook fa-2x"></i></a>
                            </div>
                            <div>
                                <a href="https://www.instagram.com/?hl=fr"><i class="fa fa-instagram fa-2x"></i></a>
                            </div>
                            <div>
                                <a href="https://twitter.com/home?lang=fr"><i class="fa fa-twitter fa-2x"></i></a>
                            </div>
                            
                        </nav>

                    </div>
                </article>
                <h1 id="infos_resto"> Le classique du burger - Marseille La Joliette - 06 05 04 02 01 </h1>
            </section>
    </div>
            
    <section id="salles">
        <article class="contenu_salles">
            <div class="photo">
                <img src="media/angelos-michalopoulos-H-t_LuxDE_w-unsplash.jpg" alt="person_with_burger">
            </div>
            <div class="description">
                <h1> Restaurant avec carte de menu variée</h1>
                <p> Notre excellente cuisine se compléte par une vaste gamme de plats et de boissons délicieuses. Nos desserts divins et nos pains frais feront votre bonheur le temps d’une pause ou au dessert.   </p>
                <form>
                    <label for="site-search"></label>
                    <input type="search" id="site-search" name="q" placeholder="Rechercher...">

                    <button type="submit"><i class="fa fa-search fa-lg"></i></button>

                </form>
            </div>
            <div class="bloc_orange">
                <!-- couleur -->
            </div>
            
        </article>

        <div class="return_top">
            <a href="#top_link"><i class="fa fa-arrow-circle-up fa-2x"></i></a>
        </div>
    </section>
    

    <?php
        include("include/footer_index.php");
    ?>

</body>
</html>