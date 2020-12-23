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
        $date_fin = date_create($result['fin']); 
        $heure_fin = date_format($date_fin, 'G' ) ; 
        var_dump($heure);
        var_dump($heure_fin);


        $interval = $heure_fin - $heure ; 

        var_dump($interval);


        echo '<td style="background-color : orange ; color : white ;" rowspan='.$interval.'>'.$result['login'].','.$result['description'].'</td>' ;
        
    }
    else{
        echo '<td rowspan="1"> crénaux disponible </td>' ;
    }
}



?>