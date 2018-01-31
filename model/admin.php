<?php
/**
 * Created by PhpStorm.
 * User: franck.meyer
 * Date: 21/01/2018
 * Time: 12:18
 */


class admin
{
    public static function ajouterUtilisateur($dataForm){
        $bdd=PdoDomisep::pdoConnectDB();
        $req=$bdd->prepare('INSERT INTO client(date_reg,gender,surname,name,birth,bill_addr,bill_town,bill_post_code,bill_state,bill_country,mail,mail_security,phone,fax) 
        VALUES(:date_reg,:gender,:surname,:name,:birth,:bill_addr,:bill_town,:bill_post_code,:bill_state,:bill_country,:mail,:mail_security,:phone,:fax)');
        //$req->bind_param('ii',$chaufPos,$idResidence);
        $req->bindParam(':date_reg',new DateTime(new DateTimeZone("Europe/Paris")));
        //$req->bindParam(':gender',);
        $req->execute();
        $req->closeCursor();
    }

    public static function ajouterDomicile($idUtilisateur,$dataForm){

        $bdd=PdoDomisep::pdoConnectDB();
        $req=$bdd->prepare('INSERT INTO home(name,addr,post_code,state,country) 
        VALUES(:name,:addr,:post_code,:state,:country)');
        //$req->bind_param('ii',$chaufPos,$idResidence);
        $req->bindParam(':name',$dataForm["name"]);
        $req->bindParam(':addr',$dataForm["addr"]);
        $req->bindParam(':post_code',$dataForm["post_code"]);
        $req->bindParam(':state',$dataForm["town"]);
        $req->bindParam(':country',$dataForm["country"]);
        //$req->bindParam(':gender',);
        $req->execute();

        //Liaison domicile a un utilisateur
        $idDomicile=$bdd->lastInsertId();
        echo $idDomicile;
        $req->closeCursor();

        $req=$bdd->prepare('INSERT INTO client_home_residence(num_client,id_home,id_residence) 
        VALUES(:idClient,:idDomi,:idRes)');
        $idResidence=null;
        $req->bindParam(':idClient',$idUtilisateur);
        $req->bindParam(':idDomi',$idDomicile);
        $req->bindParam(':idRes',$idResidence);

        $req->execute();
        $req->closeCursor();
    }

    //Fonction permettant de recuperer la liste de type de piece disponible
    public static function getListeTypePiece(){
        $bdd=PdoDomisep::pdoConnectDB();
        $req=$bdd->prepare('SELECT * FROM room_list');
        $req->execute(array());
        $val=$req->fetchAll();
        $req->closeCursor();
        return $val;
    }

    public static function ajouterPiece($idDomicile,$idRoomList){
        $bdd=PdoDomisep::pdoConnectDB();
        $req=$bdd->prepare('INSERT INTO room(id_home,id_room_list) 
        VALUES(:idHome,:idRoomList)');
        //$req->bind_param('ii',$chaufPos,$idResidence);
        $req->bindParam(':idHome',$idDomicile);
        $req->bindParam(':idRoomList',$idRoomList);
        //$req->bindParam(':gender',);
        $req->execute();
        $req->closeCursor();
    }

}