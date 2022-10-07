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
require_once("../Model/fonctions.php");

// case: the user submits an pseudo+password


$pseudo = trim(filter_input(INPUT_POST, "pseudo", FILTER_SANITIZE_SPECIAL_CHARS));
$password = trim(filter_input(INPUT_POST, "password"));
fonctions::login($pseudo, $password);
if($_SESSION["logged"] == true) {
  header("location:../Vue/geg.php");
  echo "user";
} elseif($_SESSION["logged"] == false) {
  header("location:../Vue/login.php");
}