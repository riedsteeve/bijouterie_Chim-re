<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Création Bijoux - Bijouterie Chimère</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" 
integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
 crossorigin="anonymous" referrerpolicy="no-referrer" />
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

</head>
<body>
    <a href="Acceuil.html" style="margin-top: 10%;"><i class="fa-solid fa-house-user" style="color: #800000; "></i></a>
    
<form action="crea_inser_bij.php" method="post">
        <h3>Création de Bijoux</h3>
        <hr>

        <div class="name-field">
          <div>
            <label>Nom du bijou</label>
            <input type="text" name="nom_bijou" required>
          </div>
          <div>
            <label>Caractéristiques bijou</label>
            <input type="textarea" name="carct_bijou" required>
          </div>  
        </div>
        <div>
            <label>Adresse Mail du commandeur</label>
            <input type="email" name="mail_commandeur" required>
        </div>
        
        <div>
            <label>Prix à payer</label>
            <input type="number" name="prix_payer" required>
        </div>
        <div>
            <label>Date de création</label>
            <input type="date" name="date_debut" required id="month"/>
        </div>
        <div>
            <label>Date de finalisation</label>
            <input type="date" name="date_fin" required id="month"/>
        </div>
        <div>
            <label>1er métier</label>
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
        </div>
        <input type="submit" value="Envoyer">

    </form>
</body>
</html>