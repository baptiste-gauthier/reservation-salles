<?php

function checkHoraire($jour,$heure){
    $connexion = new PDO('mysql:host=localhost;dbname=reservationsalles',"root","");
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION) ; 

    $requete = $connexion->prepare('SELECT login,titre,description,debut,fin
                                        FROM utilisateurs 
                                            INNER JOIN reservations
                                                ON utilisateurs.id = reservations.id_utilisateur
                                                    WHERE DATE_FORMAT(debut, "%w") = :jour AND DATE_FORMAT(debut, "%k") = :heure ' 
    );

    $requete->bindParam(':jour', $jour) ;
    $requete->bindParam(':heure', $heure) ;

    $requete->execute();

    $result = $requete->fetch();

    if($result)
    {
    
        echo '<td style="background-color : orange ; color : white ;">'.$result['login'].','.$result['description'].'</td>' ;
        
    }
    else{
        echo '<td> crénaux disponible </td>' ;
    }
}



?>