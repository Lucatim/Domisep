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

    public static function getUtilisateursSecondairesID($id_client){
        $bdd=PdoDomisep::pdoConnectDB(); // Connexion à la BDD
        $req=$bdd->prepare('SELECT id_second_client_1,id_second_client_2,id_second_client_3 FROM client WHERE id_client=?'); // Préparation de la requête
        $req->execute(array($id_client)); // Exécution de la requête
        $val=$req->fetch(); // Stockage des valeurs
        $req->closeCursor(); // Libération de la connexion au serveur
        return $val;
    }

    public static function getUtilisateurSecondaireInfo($id_utilisateur_secondaire){
        $bdd=PdoDomisep::pdoConnectDB(); // Connexion à la BDD
        $req=$bdd->prepare('SELECT id_client,surname,name,pic,second_client,acces_client FROM client WHERE id_client=?'); // Préparation de la requête
        $req->execute(array($id_utilisateur_secondaire)); // Exécution de la requête
        $val=$req->fetch(); // Stockage des valeurs
        $req->closeCursor(); // Libération de la connexion au serveur
        return $val;
    }

    public static function UpdateProfilInfo($id_client, $value_form) {
        $bdd=PdoDomisep::pdoConnectDB(); // Connexion à la BDD

        /*$rs = $bdd->query('SELECT * FROM client LIMIT 0');
        var_dump($rs);
        for ($i = 0; $i < $rs->columnCount(); $i++) {
            $col = $rs->getColumnMeta($i);
            $columns[] = $col['name'];
        }

        switch ($nom_champ) {
            case 'gender':
                $k_array = 1;
                break;
        }*/

        $req=$bdd->prepare("UPDATE client SET surname=:v_surname,name=:v_name,gender=:v_gender, birth=:v_birth, bill_addr=:v_bill_addr, bill_town=:v_bill_town, bill_post_code=:v_bill_post_code, bill_country=:v_bill_country, mail=:v_mail, mail_security=:v_mail_security, phone=:v_phone, fax=:v_fax WHERE id_client=:id"); // Préparation de la requête
        $req->bindParam(':v_surname',mysqli_real_escape_string($bdd, $value_form["surname"]));
        $req->bindParam(':v_name',$value_form["name"]);
        $req->bindParam(':v_gender',$value_form["gender"]);
        $req->bindParam(':v_birth',$value_form["birth"]);
        $req->bindParam(':v_bill_addr',$value_form["bill_addr"]);
        $req->bindParam(':v_bill_town',$value_form["bill_town"]);
        $req->bindParam(':v_bill_post_code',$value_form["bill_post_code"]);
        $req->bindParam(':v_bill_country',$value_form["bill_country"]);
        $req->bindParam(':v_mail',$value_form["mail"]);
        $req->bindParam(':v_mail_security',$value_form["mail_security"]);
        $req->bindParam(':v_phone',$value_form["phone"]);
        $req->bindParam(':v_fax',$value_form["fax"]);
        $req->bindParam(':id',$id_client);

        //die(var_dump($req->execute()));*/
        $req->execute(); // Exécution de la requête
        $req->closeCursor(); // Libération de la connexion au serveur

        return $value_form;
    }

    public static function UploadImage($id_client, $name) {
        $bdd=PdoDomisep::pdoConnectDB(); // Connexion à la BDD
        $req=$bdd->prepare("UPDATE client SET pic=:value_f WHERE id_client=:id"); // Préparation de la requête
        $req->bindParam(':value_f',$name);
        $req->bindParam(':id',$id_client);
        $req->execute(); // Exécution de la requête
        $req->closeCursor(); // Libération de la connexion au serveur
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