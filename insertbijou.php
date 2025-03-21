<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bijouterie_chimere";

$conn = new mysqli($servername, $username, $password, $dbname);

$nom_bijou = $_POST['nom_bijou'];
$mail_commandeur = $_POST['mail_commandeur'];
$prix_payer = $_POST['prix_payer'];
$date_debut = $_POST['date_debut'];
$date_fin = $_POST['date_fin'];
$fonction = $_POST['fonction'];

// Gestion de l'upload de l'image
if (isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {
    $fichier = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
    $nomDefichier = "image_bijoux_" . uniqid() . "." . $fichier;
    $chemin = "bijouterie_chimere/image_bijoux/" . $nomDefichier;

    // Vérifier et créer le dossier si nécessaire
    if (!is_dir("bijouterie_chimere/image_bijoux")) {
        mkdir("bijouterie_chimere/image_bijoux", 0777, true);
    }

    // Déplacer le fichier uploadé
    if (!move_uploaded_file($_FILES['photo']['tmp_name'], $chemin)) {
        die("Erreur lors de l'upload de l'image.");
    }
} else {
    die("Erreur : Aucun fichier valide n'a été téléchargé.");
}


$sql = "INSERT INTO reparation (nom_bijou, photo, mail_commandeur, prix_payer, date_debut, date_fin, fonction)
        VALUES (?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssss", $nom_bijou, $chemin, $mail_commandeur, $prix_payer, $date_debut, $date_fin, $fonction);

// Vérification de l'exécution de la requête
if ($stmt->execute()) {
   header('Location: reussite.php');
} else {
    echo "Erreur lors de l'ajout de la réparation : " . $stmt->error;
}

$stmt->close();
$conn->close();

?>
