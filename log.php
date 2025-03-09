<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bijouterie_chimere";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $password = $_POST['password'];
    $fonction = filter_var($_POST['fonction'], FILTER_SANITIZE_STRING);

    if (empty($email) || empty($password) || empty($fonction)) {
        echo "Remplissez ce formulaire !";
    } else {
        // Requête pour obtenir les informations de l'utilisateur
        $sql = "SELECT password, fonction FROM login WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($hashed_password, $db_fonction);
            $stmt->fetch();

            // Vérification du mot de passe
            if (password_verify($password, $hashed_password)) {
                // Sauvegarde des informations dans la session
                $_SESSION['email'] = $email;
                $_SESSION['fonction'] = $db_fonction;

                // Normalise la fonction pour éviter des erreurs de casse ou d'espaces
                switch (strtolower(trim($db_fonction))) {
                    case "chef_atelier":
                        // Redirection vers le tableau de bord du chef
                        header('Location: sucess.php');
                        exit;
                    case "fondeur":
                    case "polisseur":
                    case "sertisseur":
                        // Redirection vers la page des opérateurs
                        header('Location: operateur.php');
                        exit;
                    case "admin":
                        // Redirection vers la page d'administration
                        header('Location: admin_dashboard.php');
                        exit;
                    case "superviseur":
                        // Redirection vers la page du superviseur
                        header('Location: superviseur.php');
                        exit;
                    default:
                        echo "Accès non autorisé pour cette fonction.";
                        exit;
                }
            } else {
                echo "Mot de passe incorrect.";
            }
        } else {
            echo "Utilisateur non trouvé.";
        }
        $stmt->close();
    }
}

$conn->close();
?>
