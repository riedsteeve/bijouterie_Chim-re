<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réparation Bijoux - Bijouterie Chimère</title>
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


 

    <form action="insertbijou.php" method="post" enctype="multipart/form-data">
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