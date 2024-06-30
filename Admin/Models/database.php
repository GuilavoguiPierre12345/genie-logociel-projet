<?php

/**
 * Cette classe permet de faire la connexion avec la base de donnée
 * elle contiendra que des méthodes statiques
 */
class Database
{
    // le nom du serveur de connexion
    private static $servername = "localhost";
    // dsn = data source name : la source des donnée 
    private static  $dsn = 'mysql:host=localhost;dbname=genie_info';
    private static  $source = 'mysql:host=ftp.epizy.com;dbname=epiz_33678868_genie_info';
    // le nom d'utilisateur pour la connexion
    private static $user = 'root';
    private static $utilisateur = 'epiz_33678868';
    // le mot de passe de la connexion 
    private static $password = '';
    private static $mdp = 'QBmhu5QwkQwcAXQ';
    // les options de la connexion
    private static $options = array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES utf8',PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_OBJ);                               
    private static $connexion = null;
    
    /**
     * cette fonction permet de se connecter à la base de donnée
     */
    public static function connexion()
    { 
        // connexion local
        if(self::$servername ==="localhost"){
            try {
               self::$connexion = new PDO(self::$dsn,self::$user,self::$password,self::$options);
            } catch (PDOException $e) {
                die('Erreur de connexion à la base de donnée :'.$e->getMessage());
            } 
        }else{
            try {
                self::$connexion = new PDO(self::$source,self::$utilisateur,self::$mdp,self::$options);
            } catch (PDOException $e) {
                die('Erreur de connexion à la base de donnée :'.$e->getMessage());
            }
        }
        return self::$connexion;
    }

    /**
     * Déconnexion à la base de donnée
     */
    public static function deconnexion()
    {
        return self::$connexion = null;
    }
    
}


