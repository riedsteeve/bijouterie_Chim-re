<?php


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bijouterie_chimere";


$conn = new mysqli($servername, $username, $password, $dbname);
$fonction = $_POST['fonction'];
$comm = $_POST['comm'];
$photo = $_POST['photo'];
$date_debut = $_POST['date_debut'];
$date_fin = $_POST['date_fin'];
$status = $_POST['status'];

//echo $fonction .'<br>' . $comm . '<br>'  . $photo . '<br>'  . $date_debut . '<br>' . $date_fin;

$sql = "INSERT INTO intervention (fonction, comm, photo, date_debut, date_fin, status) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param( "ssssss", $fonction, $comm, $photo, $date_debut, $date_fin, $status);
$stmt->execute();

if($sql){
    header ("Location: polisseur.php");
}
else{
    echo "Erreur lors de l'ajout de l'intervention";
    }


?>