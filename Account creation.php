<?php
session_start();

$bdd = new PDO('mysql:host=localhost;dbname=inscriptions;charset=utf8', 'root');
$error = "";
$username = "";
$password = "";
$usernameErr = "";
$passwordErr = "";
$emailErr = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $password = "";

    if (!empty($_POST['password']) && !empty($_POST['confirm_password'])) {
        $password = sha1($_POST['password']);
        $confirm_password = sha1($_POST['confirm_password']); 
        
        if ($password === $confirm_password) {
            if (empty($nom) || empty($prenom) || empty($email) || empty($password)) {
                $error = "Tous les champs sont obligatoires.";
            } elseif (!preg_match("/^[a-zA-ZÀ-ÿ\-]+$/", $nom) || !preg_match("/^[a-zA-ZÀ-ÿ\-]+$/", $prenom)) {
                $error = "Le nom et le prénom ne doivent contenir que des lettres.";
            } else {
                
                $checkUser = $bdd->prepare('SELECT * FROM users WHERE email = ?');
                $checkUser->execute([$email]);

                if ($checkUser->rowCount() > 0) {
                 $error = "Un compte avec cette adresse email existe déjà.";
                 } else {

                    $insertUser = $bdd->prepare('INSERT INTO users(nom, prenom, email, password) VALUES (?, ?, ?, ?)');
                    $insertUser->execute([$nom, $prenom, $email, $password]);

                    // Sélectionner l'utilisateur fraîchement inséré pour stocker ses données en session
                    $recupUser = $bdd->prepare('SELECT * FROM users WHERE email = ?');
                    $recupUser->execute([$email]);

                    if ($recupUser->rowCount() > 0) {
                        $user = $recupUser->fetch(PDO::FETCH_ASSOC);
                        $_SESSION['email'] = $user['email'];
                        $_SESSION['nom'] = $user['nom'];
                        $_SESSION['prenom'] = $user['prenom'];
                        $_SESSION['id'] = $user['id'];
                    }

                    echo "<script>alert('Compte créé avec succès!');</script>";

                }
            }
        } else {
            $passwordErr = "Les mots de passe ne correspondent pas.";
        }
    } else {
        $passwordErr = "Les champs de mot de passe ne peuvent pas être vides.";
    }
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
<form id="registrationForm" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> ">
    <h3>Créez un compte</h3>
    <?php if (!empty($error)) { ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php } ?>
    <label for="nom">Nom :</label><br>
    <input type="text" id="nom" name="nom" required><br><br>
    <label for="prenom">Prénom :</label><br>
    <input type="text" id="prenom" name="prenom" required><br><br>
    
    <label for="email">Adresse email :</label><br>
    <input type="email" id="email" name="email" required><br>

    <label for="password">Mot de passe :</label><br>
    <input type="password" id="password" name="password" required><br>

    <label for="confirm_password">Confirmez votre mot de passe :</label><br>
    <input type="password" id="confirm_password" name="confirm_password" required><br>

    <button type="submit">Créer un compte</button>
    <a href="http://localhost:3000/Login%201.php">
    <button type="button">Se connecter</button>
    </a>
</form>

  <script src="Account.js"></script>

</body>
</html>