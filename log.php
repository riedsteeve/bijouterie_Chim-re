
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bijouterie_chimere";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
        $password = password_verify($_POST['password'], PASSWORD_DEFAULT);
        $fonction = filter_var($_POST['fonction'], FILTER_SANITIZE_STRING);

        if (empty($email) || empty($password) || empty($fonction)) {
            echo "Please fill in all fields";
        } else {
            $sql = "INSERT INTO login (email, password, fonction) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sss", $email, $password, $fonction);

            if ($stmt->execute()) {
                header('Location: sucess.html');
                exit;
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            $stmt->close();
        }
    }
}
$conn->close();
?>
