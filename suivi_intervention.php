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
$sql = "SELECT fonction, comm, photo, date_debut, date_fin FROM intervention";
$stmt = $conn->prepare($sql);

if ($stmt) {
    $stmt->execute();
    $result = $stmt->get_result();
    
    echo '<!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Interventions</title>
        <link rel="stylesheet" href="monstyle.css">
    </head>
    <body>
        <h1>Liste des interventions et suivi des interventions</h1>
        <div class="container">';

    if ($result->num_rows > 0) {
        echo '<table>
                <tr>
                    <th>Fonction</th>
                    <th>Photo</th>
                    <th>Commentaire</th>
                    <th>Date début</th>
                    <th>Date fin</th>
                </tr>';
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . htmlspecialchars($row["fonction"]) . "</td>
                    <td><img src='" . htmlspecialchars($row['photo']) . "'style='width: 100px; height: 100px; object-fit: cover; border-radius: 5px;'></td>
                    <td>" . htmlspecialchars($row["comm"]) . "</td>
                    <td>" . htmlspecialchars($row["date_debut"]) . "</td>
                    <td>" . htmlspecialchars($row["date_fin"]) . "</td>
                </tr>";
        }

        echo '</table>';
    } else {
        echo "<p>Aucune intervention trouvée.</p>";
    }

    echo '</div></body></html>';

    $stmt->close();
} else {
    echo "Erreur de préparation de la requête : " . $conn->error;
}

$conn->close();
?>
