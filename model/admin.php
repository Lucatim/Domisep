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

}