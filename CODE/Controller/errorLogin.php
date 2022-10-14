<?php

require_once("../Model/fonctions.php");

if($_SESSION["logged"] == false) {
    $erreur = fonctions::verifLoginError($_SESSION["pseudoLogin"], $_SESSION["pwd"]);
    echo $erreur;
}