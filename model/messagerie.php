<?php
/**
 * Created by PhpStorm.
 * User: vanke
 * Date: 15/12/2017
 * Time: 12:53
 */

class messagerie
{
    public static function verifNumClient($numClient){
        $bdd=PdoDomisep::pdoConnectDB();
        $req=$bdd->prepare('SELECT * FROM mail,client WHERE num_client=?');
        $req->execute(array($numClient));
        $val=$req->fetch();
        $req->closeCursor();
        return $val;

    }
    public static function insertMSG($recipient , $subject ,$bin ,  $mess, $num_client, $sender){
        $bdd=PdoDomisep::pdoConnectDB();
        $req = $bdd->prepare('INSERT INTO mail(recipient , subject , mess,bin, num_client, sender ) 
                               VALUES(:recipient , :subject , :mess , :bin, :num_client, :sender)');

        $req->execute(array(
            'recipient'=> $recipient,
            'subject'  => $_POST['subject'],
            'mess' => $mess,
            'bin' => "0",
            'num_client' => $num_client,
            'sender'=> $sender
        ));

    }
}