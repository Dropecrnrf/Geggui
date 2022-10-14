<?php
require_once("../Model/fonctions.php");

function afficherMessagePerso()
{

    $tableau = fonctions::prendreMessagePerso();
   
    
    foreach ($tableau as $key => $value) {
        
        echo    "<div class=\"card\" style=\"width: auto; margin-left:20px; margin-top: 10px;\">
                        <div class=\"card-body\">
                            <h5 class=\"card-title\">" . $value['pseudo'] . "</h5>
                            <p class=\"card-text\">" . $value['content'] . "</p>
                          
                        </div>
                    </div>";
    }
}
