<?php
//session
session_start();

//Connection a la base de donnée
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bijouterie_chimere";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nom = filter_var($_POST['nom'], FILTER_SANITIZE_STRING);
        $prenom = filter_var($_POST['prenom'], FILTER_SANITIZE_STRING);
        $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $fonction = filter_var($_POST['fonction'], FILTER_SANITIZE_STRING);

         
        if (empty($nom) || empty($prenom) || empty($email) || empty($password) || empty($fonction)) {
            
            echo "Remplissez tous les champs";
        } else {
            $sql = "INSERT INTO login (nom, prenom, email, password, fonction) VALUES (?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssss", $nom, $prenom, $email, $password, $fonction);
            if ($stmt->execute()) {
                header('Location: login.php'); exit;
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            $stmt->close();
        }
    }
}



?>