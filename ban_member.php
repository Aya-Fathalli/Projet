<?php
session_start();

// Vérifier si l'utilisateur est connecté en tant qu'administrateur
if (!isset($_SESSION['email']) || $_SESSION['role'] !== 'admin') {
    // Rediriger vers une page d'erreur ou de connexion si l'utilisateur n'est pas administrateur
    header("Location: login 1.php");
    exit();
}

// Récupérer la liste des utilisateurs depuis la base de données
$stmt = $bdd->query('SELECT * FROM users');
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Liste des Utilisateurs</title>
<link rel="stylesheet" href="styles.css">
</head>
<body>

<h2>Liste des Utilisateurs</h2>

<table>
    <tr>
        <th>ID</th>
        <th>Nom</th>
        <th>Email</th>
        <th>Action</th>
    </tr>
    <?php foreach ($users as $user): ?>
    <tr>
        <td><?php echo $user['id']; ?></td>
        <td><?php echo $user['nom']; ?></td>
        <td><?php echo $user['email']; ?></td>
        <td>
            <form method="post" action="delete_user.php">
                <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
                <button type="submit" name="delete_user">Supprimer</button>
            </form>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

</body>
</html>
