<?php
session_start();

$bdd = new PDO('mysql:host=localhost;dbname=inscriptions;charset=utf8', 'root');
$error = "";
$username = "";
$password = "";
$usernameErr = "";
$passwordErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Requête SQL pour récupérer l'utilisateur en fonction de l'adresse e-mail fournie
    $getUser = $bdd->prepare('SELECT * FROM users WHERE email = ?');
    $getUser->execute([$username]);

    // Vérifier si l'utilisateur a été trouvé
    if ($getUser->rowCount() > 0) {
        $email = $getUser->fetch(PDO::FETCH_ASSOC);
        
        // Vérifier si le mot de passe correspond
        if (sha1($password) === $email['password']) {
            // Le mot de passe correspond, connectez l'utilisateur
            $_SESSION['email'] = $email['email'];
            $_SESSION['nom'] = $email['nom'];
            $_SESSION['prenom'] = $email['prenom'];
            $_SESSION['id'] = $email['id'];

            // Rediriger l'utilisateur vers la page d'accueil ou une autre page après la connexion
            header("Location: home.php");
            exit();
        } else {
            // Le mot de passe ne correspond pas, afficher un message d'erreur
            $passwordErr = "Adresse email ou mot de passe incorrect.";
        }
    } else {
        // Aucun utilisateur trouvé avec l'adresse e-mail spécifiée, afficher un message d'erreur
        $usernameErr = "Adresse email ou mot de passe incorrect.";
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login</title>
<link rel="icon" href="icons/icon.png" >   
<link rel="stylesheet" href="styles.css">
</head>
<body>
<form id="loginForm" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> ">
    <h3>Connectez-vous</h3>
    <?php if (!empty($usernameErr)) { ?>
        <p style="color: red;"><?php echo $usernameErr; ?></p>
    <?php } ?>
    <?php if (!empty($passwordErr)) { ?>
        <p style="color: red;"><?php echo $passwordErr; ?></p>
    <?php } ?>
    <label for="username">Adresse email :</label><br>
    <input type="text" id="username" name="username" value="<?php echo $username; ?>" required><br>
    <label for="password">Mot de passe :</label><br>
    <input type="password" id="password" name="password" value="<?php echo $password; ?>" required><br>
    <button type="submit">Se connecter</button> 
    <a href="http://localhost:3000/Account%20creation.php">
    <button type="button">Créer un compte</button>
    </a>
</form>
</body>
</html>
