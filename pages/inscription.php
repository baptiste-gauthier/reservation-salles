<?php

require("../classes/class_user.php"); 

?>

<DOCTYPE! html>
<html>
    <head>

    </head>

    <body>
        <header>
            LE HEADER
        </header>

        <main>
            <form action="inscription.php" method="POST">

                <label for="login"> Login : </label>
                <input type="text" id="login" name="login">

                <label for="pass"> Mot de passe : </label>
                <input type="password" id="pass" name="password">

                <label for="confirm_pass"> Confirmation mot de passe : </label>
                <input type="password" id="confirm_pass" name="confirm_password">

                <input type="submit" value="Envoyer" name="valider">

            </form>
        </main>

        <footer>
            LE FOOTER
        </footer>

    </body>
</html>

<?php

if(isset($_POST['valider']))
{
    $login = $_POST['login'] ;
    $password = $_POST['password'] ; 
    $confirm_pass = $_POST['confirm_password'] ;

    if(!empty($login) && !empty($password) && !empty($confirm_pass))
    {
        if($_POST['password'] == $_POST['confirm_password'])
        {
            $user = new Utilisateur($login, $password);
            $user->connexionBdd("reservationsalles", "root","");
            $user->inscription();

            header("Location: connexion.php");
        }
        else
        {
            echo 'mot de passe différents'; 
        }

    }
}

?>