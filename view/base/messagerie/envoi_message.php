<?php

try
{
    $bdd = new PDO('mysql:host=localhost;dbname=domisep;charset=utf8', 'root', '');

}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}




$req = $bdd->prepare('INSERT INTO mail(recipient , sender , num_client , subject , mess ) 
                               VALUES(:recipient , :sender , :num_client , :subject , :mess)');


$req->execute(array(
    'recipient'=> $_POST['recipient'],
    'sender' => $_POST['sender'],
    'num_client' => $_POST['num_client'],
    'subject'  => $_POST['subject'],
    'mess' => $_POST['mess']
    ));



header('Location: http://localhost/Domisep/index_mvc.php?target=messagerie#');


?>