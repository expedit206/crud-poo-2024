<!DOCTYPE html>
<html lang="fr">

<?php
    require 'Database.class.php';
    if (isset($_POST['submit'])) {  
        $db = new Database;
        // Récupérer les données du formulaire
        $nom = htmlspecialchars($_POST['name']);
        $description = htmlspecialchars($_POST['description']);
        $prix = floatval($_POST['price']);
        $produit = compact("nom", "description", "prix");
        $sql = "INSERT into produits values(null, :nom, :description, : prix)";
        $db->insert($sql, $produit);

        // Vous pouvez ensuite ajouter ici le code pour insérer ces données dans une base de données ou effectuer d'autres opérations.
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Produit</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <div class="form-container">
        <h2>Ajouter un Produit</h2>
       <form method="POST">
    <input type="hidden" name="id" value="<?php echo htmlspecialchars($product['id']); ?>">
    
    <label for="name">Nom du produit:</label>
    <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($product['nom']); ?>" required>

    <label for="description">Description:</label>
    <textarea id="description" name="description" rows="4" required><?php echo htmlspecialchars($product['description']); ?></textarea>

    <label for="price">Prix:</label>
    <input type="number" id="price" name="price" value="<?php echo htmlspecialchars($product['prix']); ?>" step="0.01" required>

    <input type="submit" name="submit" value="Modifier Produit">
</form>
    </div>
</body>
</html>