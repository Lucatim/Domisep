<?php
/**
 * Created by PhpStorm.
 * User: DR
 * Date: 14/12/2017
 * Time: 20:07
 */

class utilisateur
{
    //Fonction permettant de récupérer la liste des id domiciles du client
    public static function getIdDomicileClient($idClient){
        $bdd=PdoDomisep::pdoConnectDB();
        $req=$bdd->prepare('SELECT DISTINCT id_home FROM client_home_residence WHERE num_client=?');
        $req->execute(array($idClient));
        $val=$req->fetchAll();
        $req->closeCursor();
        return $val;
    }

    //Fonction récupérant les données du domicile à partir de son id
    public static function idToDomicile($idDomicile){
        $bdd=PdoDomisep::pdoConnectDB();
        $req=$bdd->prepare('SELECT id_home,name FROM home WHERE id_home=?');
        $req->execute(array($idDomicile));
        $val=$req->fetchAll();
        $req->closeCursor();
        return $val;
    }

    //Fonction permettant de récupérer la liste des domiciles d'un client
    public static function getDomicileClient($idClient){
        $idDomiciles=utilisateur::getIdDomicileClient($idClient);
        var_dump($idDomiciles);
        $nbDomicile=count($idDomiciles);
        var_dump($nbDomicile);
        if($nbDomicile>1){
            $listeDomicile=array();
            foreach ($idDomiciles as $idD){
                $dataDomi=utilisateur::idToDomicile($idD["id_home"]);
                $listeDomicile[]=$dataDomi;
            }
            var_dump($listeDomicile);
            return $listeDomicile;

        }
        else{
            if ($nbDomicile==1){
                var_dump($idDomiciles);
                $dataDomi=utilisateur::idToDomicile($idDomiciles[0][0]);
                var_dump($dataDomi);
                return $dataDomi;

            }
            if ($nbDomicile<1){
                return null;
            }
        }
    }

}