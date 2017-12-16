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
        $val=$req->fetch();
        $req->closeCursor();
        return $val;
    }

    //Fonction permettant de récupérer la liste des domiciles d'un client
    public static function getDomicileClient($idClient){
        $idDomiciles=utilisateur::getIdDomicileClient($idClient);
        //var_dump($idDomiciles);
        $nbDomicile=count($idDomiciles);
        //var_dump($nbDomicile);
        if($nbDomicile>1){
            $listeDomicile=array();
            foreach ($idDomiciles as $idD){
                $dataDomi=utilisateur::idToDomicile($idD["id_home"]);
                $listeDomicile[]=$dataDomi;
            }
            //var_dump($listeDomicile);
            return $listeDomicile;

        }
        else{
            if ($nbDomicile==1){
                //var_dump($idDomiciles);
                $dataDomi=utilisateur::idToDomicile($idDomiciles[0][0]);
                //var_dump($dataDomi);
                return $dataDomi;

            }
            if ($nbDomicile<1){
                return null;
            }
        }
    }

    //Fonction récupérant toutes les données du domicile à partir de son id (version complete)
    public static function getDomicileComplet($idDomicile){
        $bdd=PdoDomisep::pdoConnectDB();
        $req=$bdd->prepare('SELECT id_home,name,addr,post_code,state,country FROM home WHERE id_home=?');
        $req->execute(array($idDomicile));
        $val=$req->fetch();
        $req->closeCursor();
        return $val;
    }



    //Fonction permettant de recuperer les pieces d'un domicile
    public static function getPiecesDomicile($idDomicile){
        $bdd=PdoDomisep::pdoConnectDB();
        $req=$bdd->prepare('SELECT id_room FROM room WHERE id_home=?');
        $req->execute(array($idDomicile));
        $val=$req->fetch();
        $req->closeCursor();
        return $val;
    }

    //Fonction permettant de recuperer les capteurs d'un domicile
    public static function getCapteursDomicile($idDomicile){
        $bdd=PdoDomisep::pdoConnectDB();
        $req=$bdd->prepare('SELECT id_home,name,addr,post_code,state,country FROM home WHERE id_home=?');
        $req->execute(array($idDomicile));
        $val=$req->fetch();
        $req->closeCursor();
        return $val;
    }

}