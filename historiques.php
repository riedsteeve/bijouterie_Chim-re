
<html>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" 
integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
 crossorigin="anonymous" referrerpolicy="no-referrer" />

<a href="Acceuil.html" style="margin-top: 10%;"><i class="fa-solid fa-house-user" style="color: #800000; "></i></a>

<style>
        a{
            list-style: none;
            text-decoration: none;
            background-color: #ccc;
            padding: 1%;
            border-radius: 5px 5px 5px 5px;
            color: white;
            text-align: center;
            margin-bottom: -20%;
            position:absolute;
            top:-90px;
            left:0;
            margin:10px;

        }
        h2{
            text-align: center;
        }
    </style>

</html>

<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bijouterie_chimere";

// Connexion à la base de données
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}

// Préparation et exécution de la requête SQL
$sql = "SELECT fonction, nom_bijou, mail_commandeur, photo, prix_payer, date_debut, date_fin  FROM reparation";
$stmt = $conn->prepare($sql);

if ($stmt) {
    $stmt->execute();
    $result = $stmt->get_result();
    
    echo '<!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Historiques</title>
        <link rel="stylesheet" href="monstyle.css">
    </head>
    <body>
        <h1>Historiques des commandes et des réparations</h1>;
        <div class="container">';

    if ($result->num_rows > 0) {
        echo '<table>
                <tr>
                    <th>Opérateur</th>
                    <th>Photo</th>
                    <th>Nom du bijou</th>
                    <th>Mail du commandeur</th>
                    <th>Prix</th>
                    <th>Date début</th>
                    <th>Date fin</th>
                </tr>';
        
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['fonction']) . "</td>";
                    echo "<td><img src='" . htmlspecialchars($row['photo']) . "' alt='Image du bijou' style='width: 100px; height: 100px; object-fit: cover; border-radius: 5px;'></td>";
                    echo "<td>" . htmlspecialchars($row['nom_bijou']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['mail_commandeur']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['prix_payer']) . " €</td>";
                    echo "<td>" . htmlspecialchars($row['date_debut']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['date_fin']) . "</td>";
                    echo "</tr>";
                }
        echo '</table>';
    } else {
        echo "<p>Aucune intervention trouvée.</p>";
    }

    echo '</div></body></html>';

    // Fermeture du statement
    $stmt->close();
} else {
    echo "Erreur de préparation de la requête : " . $conn->error;
}

// Fermeture de la connexion
$conn->close();


?>
