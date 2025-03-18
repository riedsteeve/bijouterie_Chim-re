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

//echo $fonction .'<br>' . $comm . '<br>'  . $photo . '<br>'  . $date_debut . '<br>' . $date_fin;

$sql = "INSERT INTO intervention (fonction, comm, photo, date_debut, date_fin) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param( "sssss", $fonction, $comm, $photo, $date_debut, $date_fin);
$stmt->execute();

if($sql){
    header ('Location: sertisseur.php');
}

?>