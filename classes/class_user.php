<?php

class Utilisateur {

    private $id ;
    public $login; 
    public $password; 

    public function __construct($login, $password)
    {
        $this->login = $login ;
        $this->password = $password ;
    }

    public function connexionBdd($bdd, $user, $pass)
    {
        try{
            $connexion = new PDO('mysql:host=localhost;dbname='.$bdd,$user,$pass);
            $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION) ;

            $this->connexion = $connexion ; 
            // echo 'connexion réussi' ;
            return $this->connexion;


        }
        catch(PDOExeption $e)
        {
            echo 'echec de la connexion : ' .$e->getMessage();
        }
    }

    public function checkLogin()
    {
        $requete = $this->connexion->prepare("SELECT COUNT(login) FROM utilisateurs WHERE login = :login "); 
        $requete->bindParam(':login',$this->login) ;
        $requete->execute();

        $count = $requete->fetchColumn() ;

        if($count == 0)
        {
            return 0 ; 
        }
        elseif($count == 1)
        {
            return 1 ; 
        }
        else
        {
            return -1 ; 
        }
    }
        
    public function inscription()
    {
        if($this->checkLogin() == 0)
        {

            $requete = $this->connexion->prepare("INSERT INTO utilisateurs(login,password) VALUES (:login, :password)"); 
                    
            $requete->bindParam(':login', $this->login);
            $requete->bindParam(':password', $this->password);
    
            $requete->execute();

            header("Location: connexion.php");
    
        }
        else{
            return '<p class="error"> Login déjà pris </p>';
           
            
        }
    }

    public function connect()
    {
        $requete = $this->connexion->prepare("SELECT * FROM utilisateurs WHERE login = :login ") ;

        $requete->bindParam(':login',$this->login) ;
        // $requete->bindParam(':password',$this->pass) ;
                
        $requete->execute();
        $result = $requete->fetch() ;

        if($result && password_verify($this->password,$result['password']))
        {
            return $result ; 
        }
        
    }

    function update($id)
    {
        if($this->checkLogin() == 0)
        {

            $requete = $this->connexion->prepare("UPDATE utilisateurs 
                        SET login = :newlogin,
                            password = :newpass
                                WHERE id = :id "
            );

            $requete->bindValue(":newlogin", $this->login );
            $requete->bindValue(":newpass", $this->password );
            $requete->bindValue(":id", $id );

            $requete->execute();

            return '<p class ="valide"> Changement effectué </p>' ;

        }
        else{
            return '<p class="error"> Login déjà pris </p>' ;
        }

    }

    function getAllinfos()
    {
        $requete = $this->connexion->prepare("SELECT * FROM utilisateurs WHERE login = :login") ;
        $requete->bindParam(':login', $this->login) ;

        $requete->execute(); 

        $result = $requete->fetch(); 

        return $result ;
    }

    
}

// $user2 = new Utilisateur("titi" , "pass") ;
// $user2->connexionBdd("reservationsalles", "root","");
// $user2->checkLogin(); 





?>