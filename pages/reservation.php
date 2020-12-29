<?php
    session_start();

    if(!isset($_SESSION['user']))
    {
        header("Location: ../index.php") ;
    }

    $connexion = new PDO('mysql:host=localhost;dbname=reservationsalles',"root","");
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION) ; 

    $requete = $connexion->prepare('SELECT login,titre,description,debut,fin
                                            FROM utilisateurs 
                                                INNER JOIN reservations
                                                    ON utilisateurs.id = reservations.id_utilisateur
                                                        WHERE id_utilisateur = :id ' 
    );

    $requete->bindParam(':id', $_GET['id']); 
    $requete->execute() ;

    $result = $requete->fetch() ;

    $login = $result['login'] ; 
    $titre = $result['titre'] ;
    $description = $result['description'] ;
    $debut = $result['debut'] ;
    $fin = $result ['fin'] ;

?>

<DOCTYPE! html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Profil </title>
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    </head>

    <body>
        <?php include("../include/header_co.php") ?>   

        <main>
            <section id="infos_resa">
                <h1> Informations de la réservation </h1>
                <article class="contenu_infos_resa">
                    <div class="infos">
                        <p><span> Nom : </span><?php echo $login ; ?> </p>
                        <p><span> Titre de l'événement : </span><?php echo $titre ; ?> </p>
                        <p><span> Description : </span><?php echo $description ; ?> </p>
                        <p><span> Date de début : </span><?php echo $debut ; ?> </p>
                        <p><span> Date de fin : </span><?php echo $fin ; ?> </p>
                    </div>

                </article>    

            </section>  
            <section id="background_burger">
                <!-- background -->
            </section>    


        </main>

        <?php include("../include/footer.php") ?>
    </body>         


</html>    