<?php
    session_start();

    if(isset($_POST['valider']))
    {
        $titre = $_POST['titre'] ;
        $description = $_POST['description'] ;
        $date_debut = $_POST['date_debut'];
        $date_fin = $_POST['date_fin'] ;
        $id_utilisateur = $_SESSION['user']['id'] ; 

        // Variable heure + jour début et fin pour les conditions

        $heure_debut_nombre = date_create($date_debut);
        $heure_debut = date_format($heure_debut_nombre ,'G'); // renvoi int 15 pour ex 15h00 
        $jour_debut = date_format($heure_debut_nombre ,'l'); // chaine de caractere : monday, tuesday etc 

        $heure_fin_nombre = date_create($date_fin);
        $heure_fin = date_format($heure_fin_nombre ,'G');
        $jour_fin = date_format($heure_fin_nombre ,'l');

        $interval = $heure_fin - $heure_debut ; 
        
        if(!empty($titre) && !empty($description) && !empty($date_debut) && !empty($date_fin)) // verif champs vide 
        {

            $connexion = new PDO('mysql:host=localhost;dbname=reservationsalles',"root","");
            $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION) ;

            $sql = $connexion->prepare("SELECT COUNT(*) FROM reservations WHERE debut = :datedebut OR fin = :datefin"); 
            $sql->bindParam(':datedebut',$date_debut );
            $sql->bindParam(':datefin',$date_fin );

            $sql->execute(); 

            $resultat = $sql->fetchColumn() ;

            if($resultat == 0 && $jour_debut == $jour_fin && $interval < 2 ) 
            {
                $requete = $connexion->prepare("INSERT INTO reservations(titre,description,debut,fin,id_utilisateur) VALUES (:titre,:description,:debut,:fin,:id_utilisateur)");
                $requete->bindParam(':titre',$titre );
                $requete->bindParam(':description',$description );
                $requete->bindParam(':debut',$date_debut );
                $requete->bindParam(':fin', $date_fin );
                $requete->bindParam(':id_utilisateur',$id_utilisateur );
    
                $requete->execute() ; 
    
                echo 'reservation effectué' ;
            }
            elseif($jour_debut != $jour_fin)
            {
                echo 'Veuillez selectionnez le même jour';
            }
            elseif($interval > 2){
                echo 'Vous ne pouvez pas reservé plus de 2h';
            }
            else{
                echo 'Ce crénau horaire est déjà reservé ! ' ; 
            }
        }
    }
?>



<DOCTYPE! html>
<html>
    <head>
        <title> Formulaire de réservation </title>

    </head>

    <body>
        <header>
            LE HEADER
        </header>

        <main>
            <form action="reservation-form.php" method="POST">

                <label for="titre"> Titre : </label>
                <input type="text" id="titre" name="titre">

                <label for="des"> Description : </label>
                <textarea id="des" name="description"></textarea>

                <label for="date_debut"> Date de début : </label>
                <input type="datetime-local" id="date_debut" name="date_debut">

                <label for="date_fin"> Date de fin : </label>
                <input type="datetime-local" id="date_fin" name="date_fin">

                <input type="submit" value="Envoyer" name="valider">

            </form>
        </main>

        <footer>
            LE FOOTER
        </footer>

    </body>
</html>