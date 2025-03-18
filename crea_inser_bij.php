<?php


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bijouterie_chimere";


$conn = new mysqli($servername, $username, $password, $dbname);


$nom_bijou = $_POST['nom_bijou'];
$carct_bijou = $_FILES['carct_bijou'];
$mail_commandeur = $_POST['mail_commandeur'];
$prix_payer = $_POST['prix_payer'];
$date_debut = $_POST['date_debut'];
$date_fin = $_POST['date_fin'];
$fonction = $_POST['fonction'];


//echo $fonction .'<br>' . $comm . '<br>'  . $photo . '<br>'  . $date_debut . '<br>' . $date_fin;

$sql = "INSERT INTO creation_bijoux (nom_bijou, carct_bijou, mail_commandeur, prix_payer, date_debut, date_fin, fonction) VALUES (?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param( "sssssss", $nom_bijou, $carct_bijou, $mail_commandeur, $prix_payer, $date_debut, $date_fin, $fonction);
$stmt->execute();

if($sql) {
    echo "Commande engrésistré avec succes";
    } else {
        echo "Erreur lors de l'insertion de la commande";
        }

?>