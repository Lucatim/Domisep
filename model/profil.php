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

    public static function getDateInscription($idUtilisateur)
    {
        $bdd = PdoDomisep::pdoConnectDB();
        $req = $bdd->prepare('SELECT date_reg FROM client WHERE id_client=?');
        $req->execute(array($idUtilisateur));
        $val = $req->fetch();
        $req->closeCursor();
        return $val;
    }

    public static function getpdfPath($idUtilisateur, $datePDF)
    {
        $bdd = PdoDomisep::pdoConnectDB();
        $req = $bdd->prepare('SELECT pdf FROM bill WHERE num_client=? AND date_bill=?');
        $req->execute(array($idUtilisateur, $datePDF));
        $val = $req->fetch();
        $req->closeCursor();
        return $val;
    }

    public static function getIDsub($idUtilisateur)
    {
        $bdd = PdoDomisep::pdoConnectDB();
        $req = $bdd->prepare('SELECT id_sub_list FROM client WHERE id_client=?');
        $req->execute(array($idUtilisateur));
        $val = $req->fetch();
        $req->closeCursor();
        return $val;
    }

    public static function getDiscount($idUtilisateur)
    {
        $bdd = PdoDomisep::pdoConnectDB();
        $req = $bdd->prepare('SELECT discount FROM client WHERE id_client=?');
        $req->execute(array($idUtilisateur));
        $val = $req->fetch();
        $req->closeCursor();
        return $val;
    }



    public static function getsub($idSub)
    {
        $bdd = PdoDomisep::pdoConnectDB();
        $req = $bdd->prepare('SELECT name, price FROM sub_list WHERE id_sub_list=2');
        $req->execute(array($idSub["id_sub_list"]));
        $val = $req->fetch();
        $req->closeCursor();
        return $val;
    }


}

?>