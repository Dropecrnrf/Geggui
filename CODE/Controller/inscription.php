<!--
  Auteur  : Pedro Carneiro - Jordan Richard - Céline Erni - Achraf Zamader - Ivan Luthy
  Date    : 30.09.2022
  Version : V1
  Titre   : Projet Geggui M426
-->
<?php

// Appel de connexion
require_once('../Model/');

//fonction qui sert a récupérer les donnes que le user entre 
function inscription(){

if (isset($_POST['formInscritpion'])) {

    //declarations des variables (pseudo, email, mot_de_passe)
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $email = htmlspecialchars($_POST['email']);
    $mot_de_passe = filter_input(INPUT_POST, 'mot_de_passe', FILTER_SANITIZE_STRING);

    
    //verifie si le users a remplie tous les champs
    if (!empty($_POST['pseudo']) && !empty($_POST['email']) && !empty($_POST['mot_de_passe'])) {

        $pseudolenght = strlen($pseudo);

        //requete sql qui verifie la longeur du pseudo
        if ($pseudolenght <= 20) {
            $reqpseudo = db()->prepare("SELECT * FROM USER WHERE pseudo = ?");
            $reqpseudo->execute(array($pseudo));
            $pseudoExistant = $reqpseudo->rowCount();

            //verifie si se pseudo existe déjà
            if ($pseudoExistant == 0) {

                //validation d'email, verifie que l'email n'existe pas déjà dans la base de donnée
                if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $reqmail = db()->prepare("SELECT * FROM USER WHERE email = ?");
                    $reqmail->execute(array($email));
                    $emailExistant = $reqmail->rowCount();

                    // REQUETE SQL QUI INSERT LES INFORMATIONS SI ELLE SONT TOUTES CORRECTE
                    if ($emailExistant == 0) {

                        $passwordHash = password_hash($mot_de_passe, PASSWORD_DEFAULT);

                        $insertUser = db()->prepare("INSERT INTO users(pseudo, email, mot_de_passe) VALUES (?, ?, ?)");
                        $insertUser->execute(array($pseudo, $email, $passwordHash));

                    } 
                }
            }
        }
    }
}
}
