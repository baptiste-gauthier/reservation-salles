<?php

function checkHoraire($jour,$heure){
    $connexion = new PDO('mysql:host=localhost;dbname=reservationsalles',"root","");
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION) ; 

    $requete = $connexion->prepare('SELECT login,titre,description,debut,fin,id_utilisateur
                                        FROM utilisateurs 
                                            INNER JOIN reservations
                                                ON utilisateurs.id = reservations.id_utilisateur
                                                    WHERE DATE_FORMAT(debut, "%w") = :jour AND DATE_FORMAT(debut, "%k") = :heure ' 
    );

    $requete->bindParam(':jour', $jour) ;
    $requete->bindParam(':heure', $heure) ;

    $requete->execute();

    $result = $requete->fetch();

    $_GET['id'] = $result['id_utilisateur'] ;

    if($result)
    {
    
        echo '<td class="reserv"><a href="reservation.php?id='.$_GET['id'].'">'.$result['login'].','.$result['description'].'</a></td>' ;
        
    }
    else{
        echo '<td> crénaux disponible </td>' ;
    }
}



?>