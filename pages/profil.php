<?php
    session_start(); 
    require("../classes/class_user.php"); 


    $id = $_SESSION['user']['id']; 
    @$new_login = htmlspecialchars($_POST['new_login']);
    @$new_password = htmlspecialchars($_POST['new_password']);
    
    if(isset($_POST['valider']))
    {
        $user = new Utilisateur($new_login,$new_password) ;
        $user->connexionBdd("reservationsalles", "root","");
        $user->update($id);
    }



?>

<DOCTYPE! html>
<html>
    <head>
    <title> Modifier le profil </title>

    </head>

    <body>
        <header>
            LE HEADER
        </header>

        <main>
            <form action="profil.php" method="POST">

                <label for="login"> Nouveau Login : </label>
                <input type="text" id="login" name="new_login">

                <label for="pass"> Nouveau Mot de passe : </label>
                <input type="password" id="pass" name="new_password">

                <!-- <label for="confirm_pass"> Confirmation du nouveau mot de passe : </label>
                <input type="password" id="confirm_pass" name="new_confirm_password"> -->

                <input type="submit" value="Envoyer" name="valider">

            </form>
        </main>

        <footer>
            LE FOOTER
        </footer>

    </body>
</html>