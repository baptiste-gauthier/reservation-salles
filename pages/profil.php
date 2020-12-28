<?php
    session_start(); 
    require("../classes/class_user.php"); 

    if(!isset($_SESSION['user']))
    {
        header("Location: ../index.php") ;
    }


    
    if(isset($_POST['valider']))
    {
        $id = $_SESSION['user']['id']; 
        $new_login = htmlspecialchars($_POST['new_login']);
        $new_password = password_hash($_POST['new_password'], PASSWORD_DEFAULT);
        $new_confirm_password = htmlspecialchars($_POST['new_confirm_password']);

        if(!empty($_POST['new_login'] && !empty($_POST['new_password']) && !empty($_POST['new_confirm_password'])))
        {
            if($_POST['new_password'] === $_POST['new_confirm_password'] && preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).{8,}$#',$_POST['new_password']))
            {
                $user = new Utilisateur($new_login,$new_password) ;
                $user->connexionBdd("reservationsalles", "root","");
                $user->update($id);

                $log_pris = $user->update($id);

                $table = $user->getAllinfos(); 

                var_dump($table);

                $_SESSION['user'] = $table ;
            }
            elseif($_POST['new_password'] != $_POST['new_confirm_password']){
                $diff_pass = '<p class="error"> Mot de passe différents </p>' ;
            }
            else{
                $pass_error = '<p class="error"> Mot de passe non valide : Il doit faire au minimum 8 caractères et doit contenir 1 majuscule, 1 chiffre et 1 caractère spécial </p>' ;
            }
        }

    }



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
        <?php
        
            include("../include/header_co.php");
        
        ?>

        <main>
            <section id="formulaire">
                <article class="contenu_formulaire">
                    <form action="profil.php" method="POST">

                        <label for="login"> Nouveau Login : </label>
                        <input type="text" id="login" name="new_login">

                        <label for="pass"> Nouveau Mot de passe : </label>
                        <input type="password" id="pass" name="new_password">

                        <label for="confirm_pass"> Confirmation du nouveau mot de passe : </label>
                        <input type="password" id="confirm_pass" name="new_confirm_password">

                        <?php 
                            if(isset($log_pris))
                            {
                                echo $log_pris ; 
                            }
                            elseif(isset($diff_pass ))
                            {
                                echo $diff_pass  ; 
                            }
                            elseif(isset($pass_error ))
                            {
                                echo $pass_error  ; 
                            }
                        ?>

                        <input type="submit" value="Envoyer" name="valider">

                    </form>
                </article>

                <article class="vignette_burger">
                    <div>
                        <img src="../media/burger3.jpg" alt="img_burger">
                    </div>
                </article> 

            </section>      
        </main>

        <?php
            include("../include/footer.php");
        ?>

    </body>
</html>