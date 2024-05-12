<?php

include 'config.php';

if (isset($_POST['submit'])) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $sexe = $_POST['sexe'];
    $id_filiere = $_POST['id_filiere'];
    
    $query = "INSERT INTO stagiaire (nom, prenom, sexe, id_filiere) VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$nom, $prenom, $sexe, $id_filiere]);

    header("location:index.php");
    exit();
}   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un élève</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div>
        <h1>Ajouter un stagiair</h1>
        <form action="" class="container w-50" method="post">
            <input type="text" name="nom" placeholder="Nom..." >
            <input type="text" name="prenom" placeholder="Prenom..." >
            <input type="text" name="sexe" placeholder="sexe..." >
            <input type="text" name="id_filiere" placeholder="id_filiere..." >
            <button type="submit" name="submit" class="btn btn-primary">Save</button>
            <a href="index.php" class="btn btn-danger btn-lg">Cancel</a>
        </form>
    </div> 
</body>
</html>
