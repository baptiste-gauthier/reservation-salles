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
        <title> Connexion </title>
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    </head>
    
<?php

if(isset($_POST['valider']))
{
    $login = htmlspecialchars($_POST['login']) ;
    $password = htmlspecialchars($_POST['password']) ; 

    if(!empty($login) && !empty($password))
    {
        $user = new Utilisateur($login, $password);
        $user->connexionBdd("reservationsalles", "root","");
        $result = $user->connect();
        if($result)
        {
            var_dump($result); 

            $_SESSION['user'] = $result; 

            header("Location: profil.php");
        }
        else{
            $log = '<p class="error"> Login ou mot de passe incorrect </p>' ;
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
                    <form action="connexion.php" method="POST">

                        <label for="login"> Login : </label>
                        <input type="text" id="login" name="login">

                        <label for="pass"> Mot de passe : </label>
                        <input type="password" id="pass" name="password">

                        <?php
                            if(isset($log))
                            {
                                echo $log ; 
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
                        <img src="../media/burger2.jpg" alt="img_burger">
                    </div>
                </article>

            </section>    
        </main>

        <?php
            include("../include/footer.php");
        ?>

    </body>
</html>


