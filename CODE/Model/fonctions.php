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
require_once("../const.php");
require_once("../pdo.php");

class fonctions
{

    public static function tableUserMdp($pseudo)
    {
        // Préparation de la requete
        $query = db()->prepare("SELECT * FROM UTILISATEUR WHERE pseudo = ?");

        // Execution de la requete
        $query->execute([$pseudo]);

        // Récuperation des données s'il y en a
        $record = $query->fetchAll(PDO::FETCH_OBJ);

        return $record;
    }
    public static function login($pseudo, $password)
    {
        $_SESSION["pseudo"] = "";
        $donneeUser = fonctions::tableUserMdp($pseudo);
        $mdp = "";
        if ($donneeUser !== false) {
            foreach ($donneeUser as $key => $value) {
                $pseudo = $value->pseudo;
                $mdp = $value->mot_de_passe;
            }
            if ($mdp != "") {
                if (password_verify($password, $mdp)) {
                    $_SESSION["logged"] = true;
                    $_SESSION["pseudo"] = $pseudo; 
                } else {
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
    public static function tableUserVerif($email)
    {
        // Préparation de la requete
        $query = db()->prepare("SELECT * FROM UTILISATEUR WHERE email = ?");

        // Execution de la requete
        $query->execute([$email]);

        // Récuperation des données s'il y en a
        $record = $query->fetchAll(PDO::FETCH_OBJ);

        return $record;
    }
    public static function inscription($email, $username, $password)
    {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO UTILISATEUR (idUser, email, pseudo, mot_de_passe) VALUES(NULL, '$email','$username','$password');";
        $query = db()->prepare($sql);    // preparer la requete sql
        $query->execute();    // executer la requete sql
        $records = $query->fetchAll(PDO::FETCH_ASSOC);    // recuperer les donnees de la base
        return $records;
    }
    public static function verifinscription($email)
    {
        $donneeUser = fonctions::tableUserVerif($email);
        $mail = "";
        if ($donneeUser !== false) {
            foreach ($donneeUser as $key => $value) {
                $mail = $value->email;
            }
            if ($mail == "") {
                /*$_SESSION["verif"] = true;*/
                return true;
            } else {
                /*$_SESSION["verif"] = false;*/
                return false;
            }
        } else {
            // $_SESSION["verif"] = false;
            return true;
        }
    }

    public static function prendreUtilisateurConnecter($nameUsers)
    {
        $sql = "SELECT UTILISATEUR.`idUser` FROM dbGeggui.UTILISATEUR
        WHERE UTILISATEUR.`pseudo` = '$nameUsers';";
        $query = db()->prepare($sql);
        $query->execute();
        $records = $query->fetchAll(PDO::FETCH_ASSOC);

        return $records;
    }

    public static function enregistrementUtilisateurConnecter($tableau)
    {
        foreach ($tableau as $key => $value) {
            $_SESSION['nameUsers'] = $value;
        }
    }

    public static function prendreMessage()
    {
        $sql = "SELECT `MESSAGE`.`content`, UTILISATEUR.`pseudo` FROM `dbGeggui`.`MESSAGE` JOIN `dbGeggui`.UTILISATEUR ON UTILISATEUR.`idUser` = `MESSAGE`.`idUser`";
        $query = db()->prepare($sql);
        $query->execute();
        $records = $query->fetchAll(PDO::FETCH_ASSOC);

        return $records;
    }

    public static function prendreMessagePerso()
    {
        $sql = "SELECT `MESSAGE`.`content`, UTILISATEUR.`pseudo` FROM `dbGeggui`.`MESSAGE` JOIN `dbGeggui`.UTILISATEUR ON UTILISATEUR.`idUser` = `MESSAGE`.`idUser` WHERE UTILISATEUR.`pseudo` = :userConnected";
        $query = db()->prepare($sql);
        $query->bindValue(':userConnected', $_SESSION['pseudo']);
        $query->execute();
        $records = $query->fetchAll(PDO::FETCH_ASSOC);

        return $records;
    }

    public static function takeIdByUser($userName){
        $sql = "SELECT idUser FROM dbGeggui.UTILISATEUR WHERE pseudo = '$userName'";
        $query = db()->prepare($sql);
        $query->execute();
        $records = $query->fetch(PDO::FETCH_COLUMN);

        return $records;
    }

    public static function ajouterMessage($message ,$idUser){
        $sql = "INSERT INTO dbGeggui.MESSAGE (nbLike, content, idUser) VALUES(NULL, '$message', $idUser);";
        $query = db()->prepare($sql);
        $query->execute();
    }

    
}
