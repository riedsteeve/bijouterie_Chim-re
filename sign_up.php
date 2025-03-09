<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up page | Bijouterie Chimere</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav id="nav">
        <img src="images/logo.png" alt="Logo Bijouterie Chimere" id="logo">
        
    </nav>

    <div class="welcome">
        <h2>Bienvenu ! Veillez vous connecter</h2>
    </div>
    
    <div id="login-systeme">
        <form action="conn.php" id="login-form" method="post">
            <input type="text" name="nom" placeholder="Entrez votre Nom" required>
            <input type="text" name="prenom" placeholder="Entrez votre prénom" required>
            <input type="email" name="email" placeholder="Entrez votre email" required>
            <input type="password" name="password" placeholder="Entrez votre mot de passe" required>

            <!---Select pour la fonction--->
            <select name="fonction" required>
                <option value="" disabled selected>Choisissez votre fonction</option>
                <option value="chef_atelier">Chef de l'atelier</option>
                <option value="fondeur">Fondeur</option>
                <option value="polisseur">Polisseur</option>
                <option value="sertisseur">Sertisseur</option>
            </select>

            <input type="submit" value="Envoyer">
        </form>
    </div>
</body>
</html>
