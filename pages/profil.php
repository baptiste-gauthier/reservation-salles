<?php
    session_start(); 
    require("../classes/class_user.php"); 


    
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

                $table = $user->getAllinfos(); 

                var_dump($table);

                $_SESSION['user'] = $table ;
            }
            elseif($_POST['new_password'] != $_POST['new_confirm_password']){
                echo 'Mot de passe différents' ;
            }
            else{
                echo 'Mot de passe non valide : Il doit faire au minimum 8 caractères et doit contenir 1 majuscule, 1 chiffre et 1 caractère spécial' ;
            }
        }

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

                <label for="confirm_pass"> Confirmation du nouveau mot de passe : </label>
                <input type="password" id="confirm_pass" name="new_confirm_password">

                <input type="submit" value="Envoyer" name="valider">

            </form>
        </main>

        <footer>
            LE FOOTER
        </footer>

    </body>
</html>