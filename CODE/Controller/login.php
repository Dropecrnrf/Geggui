<!--
  Auteur  : Pedro Carneiro - Jordan Richard - Céline Erni
  Date    : 22.09.2022
  Version : V1
  Titre   : Projet VinyleHouse - Ecole entreprise
-->
<?php

// Appel de connexion
require_once('../model/database.php');

//fonction qui sert a ce loger
function login(){

    if (isset($_POST['formConnect'])) {

        //declarations des variables (pseudoconnect, passwordconnect)
        $pseudoconnect = htmlspecialchars($_POST['pseudo']);
        $passwordconnect = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

        //vérifie que les champs ne sont pas vide
        if (!empty($pseudoconnect) && !empty($passwordconnect)) {

            $reqpass = db()->prepare("SELECT * FROM users WHERE Pseudo = ?");
            $reqpass->execute([$pseudoconnect]);
            $pass = $reqpass->fetch(PDO::FETCH_OBJ);
            
            //met les informations de la session 
            if (password_verify($passwordconnect, $pass->Password)) {  
                $_SESSION['id'] = $pass->idUser;
                $_SESSION['pseudo'] = $pass->Pseudo;
                $_SESSION['email'] = $pass->Email;

                header("Location:accueil.php");
            }

        }
    }
}