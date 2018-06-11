<?php
/**
 * Created by PhpStorm.
 * User: franck.meyer
 * Date: 11/06/2018
 * Time: 11:08
 */

class passerelle
{
    public static function recupererDonnees(){
        $ch = curl_init();
        curl_setopt(
            $ch,
            CURLOPT_URL,
            "http://projets-tomcat.isep.fr:8080/appService?ACTION=GETLOG&TEAM=002D");
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        $data = curl_exec($ch);
        curl_close($ch);
        //echo ("$data");
        return $data;
    }

    public static function listeTrame($trameLog){
        return str_split($trameLog,33);
    }

    public static function decouperTrame($listeTrame){
        $listeTrameTraite=array();
        foreach ($listeTrame as $trame){
            $t = substr($trame,0,1);
            $o = substr($trame,1,4);
            $r=substr($trame,5,1);
            $c=substr($trame,6,1);
            $n=substr($trame,7,2);
            $v=substr($trame,9,4);
            $a=substr($trame,13,4);
            $x=substr($trame,17,2);
            $year=substr($trame,19,4);
            $month=substr($trame,23,2);
            $day=substr($trame,25,2);
            $hour=substr($trame,27,2);
            $min=substr($trame,29,2);
            $sec=substr($trame,31,2);


            $paramTrame=list($t, $o, $r, $c, $n, $v, $a, $x, $year, $month, $day, $hour, $min, $sec) =
                sscanf($trame,"%1s%4s%1s%1s%2s%4s%4s%2s%4s%2s%2s%2s%2s%2s");
            $listeTrameTraite[]=$paramTrame;
            passerelle::traitementTrameBDD($paramTrame);
            /*
            foreach ($paramTrame as $param){
                echo ("$param");
            }
            */
            //echo ("$paramTrame");
            //var_dump($paramTrame);
        }
        //echo ("$listeTrameTraite");
        //var_dump($listeTrameTraite);
    }

    public static function traitementTrame(){
        $donneeTrame=passerelle::recupererDonnees();
        $listeTrame=passerelle::listeTrame($donneeTrame);
        passerelle::decouperTrame($listeTrame);
    }

    public static function traitementTrameBDD($trameParam){
        $date =mktime($trameParam[11],$trameParam[12],$trameParam[13],$trameParam[9],$trameParam[10],$trameParam[8]);
        $date=date("Y-m-d",$date);
        $date=(string)$date;
        echo("$date \n");
        $idSensor="1";
        $bdd=PdoDomisep::pdoConnectDB(); // Connexion à la BDD
        /*
        $req = $bdd->prepare('SELECT COUNT (*) FROM sensor_data WHERE id_sensor=? AND date_sensor=?');
        $req->execute(array($idSensor,$date));

        $req = $bdd->prepare('SELECT COUNT (*) FROM sensor_data WHERE id_sensor=?');
        $req->execute(array($idSensor));
        */
        $req = $bdd->prepare('SELECT COUNT(*) FROM sensor_data WHERE id_sensor=? AND date_sensor=?');
        $req->execute(array($idSensor,$date));
        $val = $req->fetch();
        var_dump($val);
        //$req->closeCursor();

        //Verifier le numero de trame pour savoir quelle trame est déjà traité
        if($val[0]>0){
            //Update
        }
        elseif ($val[0]==0){
            //Insert
        }
    }

}