<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <link rel="stylesheet" href="./style.css">

</head>
<body>
<?php
require 'Database.class.php';

$db = new Database;
$product = null;
if (isset($_GET['id'])) {
    $product = $db->find($_GET['id']);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [
        'id' => $_POST['id'],
        'nom' => $_POST['nom'],
        'description' => $_POST['description'],
        'prix' => $_POST['prix']
    ];

    if ($db->update($data)) {
        header('Location: index.php');
        exit;
    }else{
        echo 'erreur lors de la modification';
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier un Produit</title>
</head>
<body>

<h1>Modifier le Produit</h1>
<form method="POST"><form method="POST">
    
    <label for="name">Nom du produit:</label>
    <input type="text" id="name" name="nom" value="<?= $product['nom'] ?>" required>
    <input type="hidden" name="id" value="<?php echo htmlspecialchars($product['id']); ?>">

    <label for="description">Description:</label>
    <textarea id="description" name="description" rows="4" required><?php echo htmlspecialchars($product['description']); ?></textarea>

    <label for="price">Prix:</label>
    <input type="number" id="price" name="prix" value="<?php echo htmlspecialchars($product['prix']); ?>" step="0.01" required>

    <input type="submit" name="submit" value="Modifier Produit">
</form>
</form>
<a href="index.php">Retour</a>

</body>
</html>
</body>
</html>