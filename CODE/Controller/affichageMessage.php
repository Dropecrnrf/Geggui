<?php 
require_once("../Model/fonctions.php");

function afficherMessage()
    {
        $roleVerif = 0;
        $supprimer = "";
        $role = fonctions::verifRole($_SESSION["pseudo"]);
        foreach ($role as $key => $value) {
            $roleVerif = $value["role"];
        }
        $tableau = fonctions::prendreMessage();
        foreach ($tableau as $key => $value) {
            if ($roleVerif == 1) {
                $supprimer = "<a href=\"../Vue/accueil.php?btn=" . $value["content"] . "\" class=\"btn btn-primary\">supprimé</a>";
            }
            echo    "<div class=\"card\" style=\"width: auto; margin-left:20px; margin-top: 10px;\">
                        <div class=\"card-body\">
                            <h5 class=\"card-title\">" . $value['pseudo'] . "</h5>
                            <p class=\"card-text\">" . $value['content'] . "</p>
                            $supprimer
                        </div>
                    </div>";
        }
    }