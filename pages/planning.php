<?php
session_start();
include("../functions/fonctions.php");

?>
<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Inscription </title>
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    </head>

    <body>

        <?php 
            if(isset($_SESSION['user'])){

                include("../include/header_co.php") ; 
            }
            else{
                include("../include/header_deco.php") ; 
            }
        
        ?>

        
        <main>

            <section id="planning">
                <article class="contenu_planning">

                    <div class="text">
                        <h1> Planning réservation tables </h1>
                    </div>

                    <div class="tableau">
                        <table>
                            <thead>
                                <tr>
                                    <th> Semaine numéro ? </th>
                                    <td class="jour"> Lundi </td>
                                    <td class="jour"> Mardi </td>
                                    <td class="jour"> Mercredi </td>
                                    <td class="jour"> Jeudi </td>
                                    <td class="jour"> Vendredi </td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    for($heure = 8 ; $heure <= 19 ; $heure++) // boucle pour les lignes des heures
                                    {
                                        echo '<tr></tr>'; 
                                        for($jour = 0 ; $jour <= 5 ; $jour++) // boucle pour les crénaux de chaque jour 
                                        {
                                            if($jour == 0)
                                            {
                                                echo '<th>' .$heure.'h </th>';
                                            }
                                            else{
                                                checkHoraire($jour,$heure) ; 
                                            }
                                        }
                                    }
                                ?>

                            </tbody>

                        </table>
                    </div>
                </article>
            </section>
        </main>            
          

        

        <?php
            include("../include/footer.php");
        ?>
    
    </body>
</html>


