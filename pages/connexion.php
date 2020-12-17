<?php

session_start();
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
            <form action="connexion.php" method="POST">

                <label for="login"> Login : </label>
                <input type="text" id="login" name="login">

                <label for="pass"> Mot de passe : </label>
                <input type="password" id="pass" name="password">

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
            echo 'Login ou mot de passe incorrect' ;
        }
    }
}


?>

