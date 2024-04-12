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
$username = $password = "";
$usernameErr = $passwordErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["username"])) {
    $usernameErr = "Adresse email est requis";
  } else {
    $username = test_input($_POST["username"]);
    if (!filter_var($username, FILTER_VALIDATE_EMAIL)) {
      $usernameErr = "Format d'adresse email invalide";
    }
  }

  if (empty($_POST["password"])) {
    $passwordErr = "Mot de passe est requis";
  } else {
    $password = test_input($_POST["password"]);
    if (strlen($password) < 8) {
      $passwordErr = "Le mot de passe doit contenir au moins 8 caractères";
    }
  }

}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<form id="registrationForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <h3>Connectez-vous ou créez un compte</h3>
    <label for="username">Adresse email :</label><br>
    <input type="text" id="username" name="username" value="<?php echo $username; ?>" required>
    <span class="error"><?php echo $usernameErr; ?></span><br>
    <label for="password">Mot de passe :</label><br>
    <input type="password" id="password" name="password" value="<?php echo $password; ?>" required>
    <span class="error"><?php echo $passwordErr; ?></span><br>
    <label for="checkbox">Se souvenir de moi
        <input type="checkbox" id="checkbox" name="checkbox">
    </label>
    <button type="submit">Se connecter</button>
    <button type="button" onclick="window.location.href='http://localhost:3000/Login.php'" class="button-link">Créer un compte</button>
</form>

</body>
</html>
