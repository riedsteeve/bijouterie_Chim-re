<?php


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bijouterie_chimere";


$conn = new mysqli($servername, $username, $password, $dbname);


$nom_bijou = $_POST['nom_bijou'];
$photo = $_POST['photo'];
$mail_commandeur = $_POST['mail_commandeur'];
$prix_payer = $_POST['prix_payer'];
$date_debut = $_POST['date_debut'];
$date_fin = $_POST['date_fin'];
$fonction = $_POST['fonction'];


$fichier = pathinfo($carct_bijou ['name'], PATHINFO_EXTENSION);
$nomDefichier = "image_bijoux" . uniqid() . "." . $fichier;
//echo $fonction .'<br>' . $comm . '<br>'  . $photo . '<br>'  . $date_debut . '<br>' . $date_fin;

$sql = "INSERT INTO reparation (nom_bijou, photo, mail_commandeur, prix_payer, date_debut, date_fin, fonction)
 VALUES (?, ?, ?, ?, ?, ?, ?)";
 $stmt = $conn->prepare($sql);
 $stmt->bind_param("ssssss", $nom_bijou, $photo, $mail_commandeur, $prix_payer, $date_debut, $date_fin, $fonction );
 $stmt->execute();
 
 



if($sql){
    echo "Réparation ajoutées au tableaux avec succes !";
}
else{
    echo "Erreur lors de l'ajout de la réparation !";
    }

?>