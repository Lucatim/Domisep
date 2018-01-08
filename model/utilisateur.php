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
    public static function getIdDomicileClient($idClient)
    {
        $bdd = PdoDomisep::pdoConnectDB();
        $req = $bdd->prepare('SELECT DISTINCT id_home FROM client_home_residence WHERE num_client=?');
        $req->execute(array($idClient));
        $val = $req->fetchAll();
        $req->closeCursor();
        return $val;
    }

    //Fonction récupérant les données du domicile à partir de son id
    public static function idToDomicile($idDomicile)
    {
        $bdd = PdoDomisep::pdoConnectDB();
        $req = $bdd->prepare('SELECT id_home,name FROM home WHERE id_home=?');
        $req->execute(array($idDomicile));
        $val = $req->fetch();
        $req->closeCursor();
        return $val;
    }

    //Fonction permettant de récupérer la liste des domiciles d'un client
    public static function getDomicileClient($idClient)
    {
        $idDomiciles = utilisateur::getIdDomicileClient($idClient);
        //var_dump($idDomiciles);
        $nbDomicile = count($idDomiciles);
        //var_dump($nbDomicile);
        //Il ya a plus d'un domicile chez le client
        if ($nbDomicile >= 1) {
            $listeDomicile = array();
            foreach ($idDomiciles as $idD) {
                $dataDomi = utilisateur::idToDomicile($idD["id_home"]);
                $listeDomicile[] = $dataDomi;
            }
            //var_dump($listeDomicile);
            return $listeDomicile;

        } else {
            /*
            if ($nbDomicile==1){
                //var_dump($idDomiciles);
                $dataDomi=utilisateur::idToDomicile($idDomiciles[0][0]);
                //var_dump($dataDomi);
                return $dataDomi;

            }*/

            if ($nbDomicile < 1) {
                return null;
            }
        }
    }

    //Fonction récupérant toutes les données du domicile à partir de son id (version complete)
    public static function getDomicileComplet($idDomicile)
    {
        $bdd = PdoDomisep::pdoConnectDB();
        $req = $bdd->prepare('SELECT id_home,name,addr,post_code,state,country FROM home WHERE id_home=?');
        $req->execute(array($idDomicile));
        $val = $req->fetch();
        $req->closeCursor();
        //Compte le nombre de capteurs du domicile
        $val["nbrCapteurs"]=utilisateur::getNombreCapteurDomicile($idDomicile);
        //Recupere le nombre de piece du domicile
        $val["nbrPiece"]=utilisateur::getNombrePieceDomicile($idDomicile);
        //Recupere les pieces du domiciles
        $val["pieces"] = utilisateur::getPiecesDomicile($val["id_home"]);
        //Recupere les differents types de capteurs a afficher
        $val["capteurs"] = utilisateur::getAllCapteursDomicile($val["id_home"]);
        return $val;
    }


    //Fonction permettant de recuperer les pieces d'un domicile
    public static function getPiecesDomicile($idDomicile)
    {
        $bdd = PdoDomisep::pdoConnectDB();
        $req = $bdd->prepare('SELECT id_room,id_room_list FROM room WHERE id_home=?');
        $req->execute(array($idDomicile));
        $val = $req->fetchAll();
        $req->closeCursor();

        //Boucle permettant de recuperer les infos complementaires de chaques pieces
        foreach ($val as $k => $v) {
            //Recupere caracteristique piece
            $carac = utilisateur::getCaracteristiquePiece($v["id_room_list"]);
            $val[$k] += $carac;
            //Recupere capteurs de la piece
            $capteursPiece = utilisateur::getCapteursPiece($v["id_room"]);
            $val[$k]["capteurs"] = $capteursPiece;
        }

        return $val;
    }

    //Fonction permettant de recuperer les caracteristique d'une piece (nom)
    public static function getCaracteristiquePiece($idPieceList)
    {
        $bdd = PdoDomisep::pdoConnectDB();
        $req = $bdd->prepare('SELECT name FROM room_list WHERE id_room_list=?');
        $req->execute(array($idPieceList));
        $val = $req->fetch();
        $req->closeCursor();
        return $val;

    }

    //Fonction permettant de recuperer les capteurs d'une piece
    public static function getCapteursPiece($idPiece)
    {
        $bdd = PdoDomisep::pdoConnectDB();
        $req = $bdd->prepare('SELECT id_sensor,id_sensor_list,data,sensor_on FROM sensor WHERE id_room=?');
        $req->execute(array($idPiece));
        $val = $req->fetchAll();
        $req->closeCursor();

        //Boucle permettant de recuperer les infos complementaires de chaques capteurs
        foreach ($val as $k => $v) {
            $carac = utilisateur::getCaracteristiqueCapteur($v["id_sensor_list"]);
            $val[$k] += $carac;
        }
        return $val;
    }

    //Fonction permettant de recuperer les caracteristiques (nom du capteur, unite du capteur) d'un capteur
    public static function getCaracteristiqueCapteur($idCapteurList)
    {
        $bdd = PdoDomisep::pdoConnectDB();
        $req = $bdd->prepare('SELECT name,pic,id_sensor_list,unite FROM sensor_list WHERE id_sensor_list=?');
        $req->execute(array($idCapteurList));
        $val = $req->fetch();
        $req->closeCursor();
        return $val;
    }

    //Fonction permettant de récupérer tous les types de capteurs utilisés
    public static function getAllCapteursDomicile($idDomicile)
    {
        $bdd = PdoDomisep::pdoConnectDB();
        $req = $bdd->prepare('SELECT DISTINCT id_sensor_list,name,pic,available FROM sensor_list WHERE id_sensor_list IN (
        SELECT id_sensor_list FROM sensor WHERE id_room IN (
        SELECT id_room FROM room WHERE id_home=?
        )
        )');
        $req->execute(array($idDomicile));
        $val = $req->fetchAll();
        $req->closeCursor();
        return $val;
    }

    //Fonction permettant de récupérer les capteurs d'un domcile a partir d'un type de capteur

    public static function getCapteursDomicileFromTypeCapteur($idDomcile,$idSensorList)
    {
        $pieces =utilisateur::getPiecesDomicile($idDomcile);
        foreach ($pieces as $k=>$v){

        }
        $bdd=PdoDomisep::pdoConnectDB();
        $req=$bdd->prepare('SELECT sensor FROM sensor WHERE id_sensor_list');
        $req->execute(array());
        $val = $req->fetch();
        $req->closeCursor();
        return $val;
    }

    //Fonction permettant de compter le nombre de capteurs d'un domiicile
    public static function getNombreCapteurDomicile($idDomicile){
        $bdd = PdoDomisep::pdoConnectDB();
        $req = $bdd->prepare('SELECT COUNT(*) FROM sensor WHERE id_room IN(SELECT id_room FROM room WHERE id_home=?)');
        $req->execute(array($idDomicile));
        $val = $req->fetch();
        $req->closeCursor();
        return $val[0];
    }

    //Fonction permettant de recuperer le nombre de pieces d'un domciile
    public static function getNombrePieceDomicile($idDomicile){
        $bdd = PdoDomisep::pdoConnectDB();
        $req = $bdd->prepare('SELECT COUNT(*) FROM room WHERE id_home=?');
        $req->execute(array($idDomicile));
        $val = $req->fetch();
        $req->closeCursor();
        return $val[0];
    }

    //Fonction recuperant tout les donnees historise du capteur, utilise notamment pour les requete AJAX de Chartist.js
    public static function getDataCapteurs($idCapteur,$date){
        $bdd = PdoDomisep::pdoConnectDB();
        //Test des parametre de la requete
        if ($date ==null){
            $req = $bdd->prepare('SELECT * FROM sensor_data WHERE id_sensor=?');
            $req->execute(array($idCapteur));
        }
        else{
            $req = $bdd->prepare('SELECT * FROM sensor_data WHERE id_sensor=? and date_sensor>=?  ');
            $req->execute(array($idCapteur,$date));
        }
        $val = $req->fetchAll();
        $req->closeCursor();
        return $val;
    }

}