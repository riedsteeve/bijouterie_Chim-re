<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace Polisseur - Bijouterie Chimère</title>
    <link rel="stylesheet" href="monstyle.css">
</head>
<body>
    <h1>Espace Polisseur</h1>
    <h2>Bijoux assignés</h2>
    <table>
        <tr>
            <th>Image</th>
            <th>Nom</th>
            <th>Description</th>
            <th>Étape actuelle</th>
            <th>Actions</th>
        </tr>
        <?php 
        $requete = "SELECT nom_bijou, carct_bijou, fonction FROM creation_bijoux";
        $resultat = $conn->query($requete);
        while ($donnees = $resultat->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($donnees['nom_bijou']) . "</td>";
            echo "<td>" . htmlspecialchars($donnees['carct_bijou']) . "</td>";
            echo "<td>" . htmlspecialchars($donnees['fonction']) . "</td>";
            echo "<td><button onclick='ouvrirFormulaire()'>Intervenir</button></td>";
            echo "</tr>";
        }
        ?>
    </table>

    <h2>Formulaire d'intervention</h2>
    <form action="validation.php" method="post" id="form-intervention" style="display:none;">
        <label for="etape">Type d'intervention :</label>
        <select name="fonction" id="etape">
            <option value="fonte">Fonte</option>
            <option value="sertissage">Sertissage</option>
            <option value="polissage">Polissage</option>
        </select>

        <label for="commentaire">Date de début :</label>
       <input type="date" name="date_debut" id="etape">

        <label for="commentaire">Commentaire :</label>
        <textarea name="comm" id="commentaire" rows="4"></textarea>

        <label for="photo">Ajouter une photo :</label>
        <input name="photo" type="file" id="photo">

        <label for="commentaire">Date de fin :</label>
       <input type="date" name="date_fin" id="etape">


        <label for="etape-suivante">Passer à l’étape suivante :</label>
        <select name="fonction">
                <option value="fondeur" disabled selected>Fondeur</option>
                <option value="Max(Fondeur)">Max(Fondeur)</option>
                <option value="Laurent (Fondeur)">Laurent (Fondeur)</option>
                <option value="Jérémy(Fondeur)">Jérémy(Fondeur)</option>
                <option value="Gérard(Sertisseur)">Gérard(Sertisseur)</option>
                <option value="Steeve(Sertisseur)">Steeve(Sertisseur)</option>
                <option value="Yoan(Sertisseur)">Yoan(Sertisseur)</option>
                <option value="Didier(Polisseur)">Didier(Polisseur)</option>
                <option value="Samson(Polisseur)">Samson(Polisseur)</option>
                <option value="Gabriel(Polisseur)">Gabriel(Polisseur)</option>
            </select>

            <label for="status">Status:</label>
       <input type="checkbox" name="status" value="Terminé">

        <button type="submit">Valider l’intervention</button>
    </form>



    <script>
        function ouvrirFormulaire() {
            document.getElementById('form-intervention').style.display = 'block';
        }
    </script>



</body>
</html>
