<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réparation Bijoux - Bijouterie Chimère</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

 

    <form action="insertbijou.php" method="post">
        <h3>Réparation de Bijoux</h3>
        <hr>

        <div class="name-field">
          <div>
            <label>Nom du bijou</label>
            <input type="text" name="nom_bijou" required>
          </div>
          <div>
            <label>Caractéristiques bijou</label>
            <input type="file" name="photo" id="">
          </div>  
        </div>
        <div>
            <label>Adresse Mail du commandeur</label>
            <input type="email" name="mail_commandeur" required>
        </div>
        
        <div>
            <label>Prix de la réparation</label>
            <input type="number" name="prix_payer" required>
        </div>
        <div>
            <label>Début de la réparation</label>
            <input type="date" name="date_debut" required id="month"/>
        </div>
        <div>
            <label>Fin de la réparation</label>
            <input type="date" name="date_fin" required id="month"/>
        </div>
        <div>
            <label>1er métier</label>
            <select name="fonction" required>
                <option value="" disabled selected>Choisissez votre fonction</option>
                <option value="fondeur">Fondeur</option>
                <option value="polisseur">Polisseur</option>
                <option value="sertisseur">Sertisseur</option>
            </select>
        </div>
        <input type="submit" value="Envoyer">

    </form>
</body>
</html>