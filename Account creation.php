<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<?php
$error = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if (empty($nom) || empty($prenom) || empty($email) || empty($password) || empty($confirm_password)) {
        $error = "Tous les champs sont obligatoires.";
    } elseif (!preg_match("/^[a-zA-ZÀ-ÿ\-]+$/", $nom) || !preg_match("/^[a-zA-ZÀ-ÿ\-]+$/", $prenom)) {
        $error = "Le nom et le prénom ne doivent contenir que des lettres.";
    } elseif ($password !== $confirm_password) {
        $error = "Les mots de passe ne correspondent pas.";
    } else {

        echo "Nom: $nom<br>";
        echo "Prénom: $prenom<br>";
        echo "Email: $email<br>";

        echo "Mot de passe: $password<br>";
    }
}
?>

<form id="registrationForm" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"> 
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
</form>

<script>
document.getElementById("registrationForm").addEventListener("submit", function(event) {
    var password = document.getElementById("password").value;
    var confirm_password = document.getElementById("confirm_password").value;

    if (password !== confirm_password) {
        alert("Les mots de passe ne correspondent pas");
        event.preventDefault();
    }
});

document.getElementById("registrationForm").addEventListener("submit", function(event) {
    var nom = document.getElementById("nom").value;
    var prenom = document.getElementById("prenom").value;

    if (!isAlphabetic(nom) || !isAlphabetic(prenom)) {
        alert("Le nom et le prénom ne doivent contenir que des lettres");
        event.preventDefault();
    }
});

function isAlphabetic(str) {
    return /^[a-zA-ZÀ-ÿ\-]+$/.test(str);
}
</script>

</body>
</html>
