<?php

try
{
    $bdd = new PDO('mysql:host=localhost;dbname=domisep;charset=utf8', 'root', '');

}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}




$req = $bdd->prepare('INSERT INTO mail(recipient , subject , mess ) 
                               VALUES(:recipient , :subject , :mess)');


$req->execute(array(
    'recipient'=> $_POST['recipient'],
    'subject'  => $_POST['subject'],
    'mess' => $_POST['mess']
    ));



header('Location: http://localhost/Domisep/index_mvc.php?target=messagerie#');


?>