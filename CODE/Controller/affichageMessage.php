<?php 
require_once("../Model/fonctions.php");

function afficherMessage()
    {
        $tableau = fonctions::prendreMessage();
        foreach ($tableau as $key => $value) {
            echo    "<div class=\"card\" style=\"width: 18rem;\">
                        <div class=\"card-body\">
                            <h5 class=\"card-title\">" . $value['pseudo'] . "</h5>
                            <p class=\"card-text\">" . $value['content'] . "</p>
                            <a href=\"#\" class=\"btn btn-primary\">Commenter   </a>
                        </div>
                    </div>";
        }
    }