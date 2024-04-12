<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
  <?php
    // Initialisation des variables
    $nom = $prenom = $email = $password = $confirm_password = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      // Récupération des données du formulaire
      $nom = test_input($_POST["nom"]);
      $prenom = test_input($_POST["prenom"]);
      $email = test_input($_POST["email"]);
      $password = test_input($_POST["password"]);
      $confirm_password = test_input($_POST["confirm_password"]);

      // Validation des données du formulaire
      // (vous pouvez ajouter vos propres règles de validation ici)

      // Affichage des données ou traitement supplémentaire
      echo "Nom : " . $nom . "<br>";
      echo "Prénom : " . $prenom . "<br>";
      echo "Adresse email : " . $email . "<br>";
    }

    // Fonction pour nettoyer les données du formulaire
    function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
  ?>

  <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <h3>Créez un compte</h3>
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
</body>
</html>