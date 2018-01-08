<?php
/**
 * Created by PhpStorm.
 * User: Lucas
 * Date: 15/12/2017
 * Time: 12:48
 */

class profil
{
    // Fonction récupérant toutes les données du profil
    public static function getProfilComplet($id_client){
        $bdd=PdoDomisep::pdoConnectDB(); // Connexion à la BDD
        $req=$bdd->prepare('SELECT * FROM client WHERE id_client=?'); // Préparation de la requête
        $req->execute(array($id_client)); // Exécution de la requête
        $val=$req->fetch(); // Stockage des valeurs
        $req->closeCursor(); // Libération de la connexion au serveur
        return $val;
    }
}