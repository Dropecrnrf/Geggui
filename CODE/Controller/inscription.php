<?php
/**
 * Controller login
 * 
 * @projet Réseau social | Geggui
 * @auteurs Yvan Luthi, Céline Erni, Jordan Richard, Zamader Achraf 
 * @version 1.0.0
 * @date année 2022
 */

// ------------ début solution inscription ----------------
require_once("../Model/fonctions.php");

$email = trim(filter_input(INPUT_POST, "email"), FILTER_SANITIZE_EMAIL);
$username = trim(filter_input(INPUT_POST, "pseudo"), FILTER_SANITIZE_SPECIAL_CHARS);
$password = trim(filter_input(INPUT_POST, "password"));
$verif = fonctions::verifinscription($email, $username);
if($verif == true) {
    fonctions::inscription($email, $username, $password);
    header("location:../Vue/login.php");
} else {
    header("location:../Vue/inscription.php");
}