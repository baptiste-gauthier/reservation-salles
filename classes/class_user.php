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
    
            echo ' Utilisateur ajouté ' ;
        }
        else{
            echo 'login déjà pris';
        }
    }

    public function connect($login,$pass)
    {
        $requete = $this->connexion->prepare("SELECT * FROM utilisateurs WHERE login = :login AND password = :password ") ;

        $requete->bindParam(':login',$this->login) ;
        $requete->bindParam(':password',$this->password) ;
                
        $requete->execute();
        $result = $requete->fetch() ;

        return $result ; 

    }

    
}

// $user2 = new Utilisateur("titi" , "pass") ;
// $user2->connexionBdd("reservationsalles", "root","");
// $user2->checkLogin(); 





?>