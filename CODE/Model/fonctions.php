<?php
/**
 * Model fonctions
 * 
 * @projet Réseau social | Geggui
 * @auteurs Yvan Luthi, Céline Erni, Jordan Richard, Zamader Achraf 
 * @version 1.0.0
 * @date année 2022
 */
session_start();
require_once("./CODE/const.php");

require_once("./CODE/pdo.php");

class fonctions{

    public static function tableUserMdp($email)
    {
        // Préparation de la requete
        $query = db()->prepare("SELECT * FROM USER WHERE email = ?");
    
        // Execution de la requete
        $query->execute([$email]);
    
        // Récuperation des données s'il y en a
        $record = $query->fetchAll(PDO::FETCH_OBJ);
    
        return $record;
    }
    public static function login($email, $password) {

        $donneeUser = fonctions::tableUserMdp($email);
        $mdp = "";
        if ($donneeUser !== false) {
            foreach ($donneeUser as $key => $value) {
                $email = $value->email;
                $mdp = $value->motDePasse;
                $role = $value->role;
            }
            if ($mdp != "") {
                if (password_verify($password, $mdp)) {
                    $_SESSION["logged"] = true;
                    if($role == 1) {
                        $_SESSION["role"] = true;
                    } else{
                        $_SESSION["role"] = false;
                    }
                } 
                else {
                    $_SESSION["logged"] = false;
                }
            }
        } else {
            $_SESSION["logged"] = false;
        }
    }
    public static function logout()
    {
      // ------------- début solution logout ----------------
    
      // If it's desired to kill the session, also delete the session cookie.
      // Note: This will destroy the session, and not just the session data!
      if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(
          session_name(),
          '',
          time() - 42000,
          $params["path"],
          $params["domain"],
          $params["secure"],
          $params["httponly"]
        );
      }
    
      // Unset all of the session variables.
      $_SESSION = array();
    
      // Finally, destroy the session.
      session_destroy();
      // ------------- fin solution logout ----------------
    }