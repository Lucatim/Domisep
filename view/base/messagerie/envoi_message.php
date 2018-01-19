<?php
var_dump($_SESSION);
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=domisep;charset=utf8', 'root', '');

}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}




$req = $bdd->prepare('INSERT INTO mail(recipient , subject , mess,bin,num_client, sender, num_client ) 
                               VALUES(:recipient , :subject , :mess , :bin, :num_client, :sender, :num_client)');


$req->execute(array(
    'recipient'=> $_POST['recipient'],
    'subject'  => $_POST['subject'],
    'mess' => $_POST['mess'],
    'bin' => "0",
    'num_client' => $_POST[$_SESSION['id']],
    'sender'=>
));

header('Location: http://localhost/Domisep/index_mvc.php?target=messagerie#');


?>