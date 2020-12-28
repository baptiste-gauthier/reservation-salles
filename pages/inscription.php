<?php

session_start();
require("../classes/class_user.php"); 

if(isset($_SESSION['user']))
{
    header("Location: ../index.php") ;
}

?>

<DOCTYPE! html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Inscription </title>
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

    </head>

        <?php
        
        if(isset($_POST['valider']))
        {
            $login = htmlspecialchars($_POST['login']) ;
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT) ; 
            $confirm_pass = htmlspecialchars($_POST['confirm_password']) ;
        
            if(!empty($login) && !empty($password) && !empty($confirm_pass))
            {
                if(($_POST['password'] == $_POST['confirm_password']) && (preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).{8,}$#',$_POST['password'])))
                {
                    $user = new Utilisateur($login, $password);
                    $user->connexionBdd("reservationsalles", "root","");
                    $user->inscription();    
                    
                    $error = $user->inscription();    
        
                }
                elseif($_POST['password'] != $_POST['confirm_password'])
                {
                    $pass = '<p class="error"> Mot de passe différents </p>'; 
                }
                else{
                    $pass2 = '<p class="error">Mot de passe non valide : Il doit faire au minimum 8 caractères et doit contenir 1 majuscule, 1 chiffre et 1 caractère spécial </p>' ; 
                }
            }
            else{
                $champs = '<p class="error"> Veuillez remplir tous les champs </p>'; 
            }
        }
        
        ?>

    <body>
        <?php 
            include("../include/header_deco.php");
        ?>

        <main>
            <section id="formulaire">
                <article class="contenu_formulaire">
                    <form action="inscription.php" method="POST">

                        <label for="login"> Login : </label>
                        <input type="text" id="login" name="login">

                        <label for="pass"> Mot de passe : </label>
                        <input type="password" id="pass" name="password">

                        <label for="confirm_pass"> Confirmation mot de passe : </label>
                        <input type="password" id="confirm_pass" name="confirm_password">

                        <?php 
                            if(isset($error))
                            {
                                echo $error ; 
                            }
                            elseif(isset($pass))
                            {
                                echo $pass ;
                            }
                            elseif(isset($pass2))
                            {
                                echo $pass2 ;
                            }
                            elseif(isset($champs))
                            {
                                echo $champs ;
                            }
                        ?>

                        <input type="submit" value="Envoyer" name="valider">

                    </form>
                </article>

                <article class="vignette_burger">
                    <div>
                        <img src="../media/burger1.jpg" alt="img_burger">
                    </div>
                </article> 

            </section>
        </main>

        <?php
            include("../include/footer.php");
        ?>

    </body>
</html>
