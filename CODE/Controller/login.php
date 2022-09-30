<?php
/**
 * Controller login
 * 
 * @projet Réseau social | Geggui
 * @auteurs Yvan Luthi, Céline Erni, Jordan Richard, Zamader Achraf 
 * @version 1.0.0
 * @date année 2022
 */

// ------------ début solution login vérification ----------------
require_once("./CODE/Model/fonctions.php");

// case: the user submits an email+password


$email = trim(filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL));
$password = trim(filter_input(INPUT_POST, "password"));
fonctions::login($email, $password);
if($_SESSION["logged"] == true && $_SESSION["role"] == false) {
  /*header("location:../vue/accueilUser.php");*/
  echo "user";
} elseif ($_SESSION["logged"] == true && $_SESSION["role"]) {
 /* header("location:../vue/accueilArtiste.php");*/
 echo "admin";
} elseif($_SESSION["logged"] == false) {
  /*header("location:../vue/connexion.php");*/
  echo "pas log";
}
