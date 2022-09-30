<?php
/**
 * constantes
 * 
 * @projet Réseau social | Geggui
 * @auteurs Yvan Luthi, Céline Erni, Jordan Richard, Zamader Achraf 
 * @version 1.0.0
 * @date année 2022
 */

require_once("../CODE/const.php");
function db(){
    $db = null;
   if ($db === null)
   {
       $dbString = "mysql:host=" . DB_HOST. ";dbname=" . DB_NAME . ";charset=utf8;port=3306";
       $db = new PDO($dbString, DB_USER, DB_PASS);
       $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
   }
   return $db;
   }

   function dbRun($sql, $param = null)
{
    //Préparer la requête SQL
    $statement = db()->prepare($sql);

    //ExecuteR la requête
    $result = $statement->execute($param);

    //Retourne le pdostatement pour lire les données dans le code appelant
    return $statement;
}
