<?php
require_once("../Model/fonctions.php");

class FContent
{
    public static function addContent($content)
    {
        $id = fonctions::takeIdByUser($_SESSION["pseudo"]);
        fonctions::ajouterMessage($content, $id);
    }
}
