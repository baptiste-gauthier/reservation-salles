<?php
session_start();
include("../functions/fonctions.php");

?>
<!DOCTYPE html>
<html>
    <head>
        <title> Planning </title>
    </head>

    <body>

        <header>
        </header>

        <body>
           <table>
            <thead>
                <tr>
                    <th> Semaine numéro ? </th>
                    <td> Lundi </td>
                    <td> Mardi </td>
                    <td> Mercredi </td>
                    <td> Jeudi </td>
                    <td> Vendredi </td>
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

          

        </body>

        <footer>
        </footer>

    </body>
</html>

<style>
    table {
        border-collapse : collapse ; 
    }
    td,th{
        border : 2px solid black ;
        padding : 10px ; 
    }
</style>

