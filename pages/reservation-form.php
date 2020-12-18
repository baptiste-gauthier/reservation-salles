<?php
    session_start();

    if(isset($_POST['valider']))
    {
        $titre = $_POST['titre'] ;
        $description = $_POST['description'] ;
        $date_debut = $_POST['date_debut'];
        $date_fin = $_POST['date_fin'] ;
        $id_utilisateur = $_SESSION['user']['id'] ; 
        
        if(!empty($titre) && !empty($description) && !empty($date_debut) && !empty($date_fin))
        {
            $connexion = new PDO('mysql:host=localhost;dbname=reservationsalles',"root","");
            $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION) ;

            $requete = $connexion->prepare("INSERT INTO reservations(titre,description,debut,fin,id_utilisateur) VALUES (:titre,:description,:debut,:fin,:id_utilisateur)");
            $requete->bindParam(':titre',$titre );
            $requete->bindParam(':description',$description );
            $requete->bindParam(':debut',$date_debut );
            $requete->bindParam(':fin', $date_fin );
            $requete->bindParam(':id_utilisateur',$id_utilisateur );

            $requete->execute() ; 

            echo 'reservation effectué' ;


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