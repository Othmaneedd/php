<?php
include "config.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $query = "SELECT * FROM stagiaire WHERE id = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$id]);
    

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    
    if (isset($_POST['submit'])) {
       
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $sexe = $_POST['sexe'];
        $id_filiere = $_POST['id_filiere'];
        
        
        $update_query = "UPDATE stagiaire SET nom = ?, prenom = ?, sexe = ?, id_filiere = ? WHERE id = ?";
        $update_stmt = $pdo->prepare($update_query);
        
        
        $update_stmt->execute([$nom, $prenom, $sexe, $id_filiere, $id]);

        header("location:index.php");
        exit(); 
    }
} else {
  
    header("location:index.php");
    exit();
}
?>  

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier les informations d'un élève</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .border{
            border-radius: 10px;
            color: white;
        }
    </style>
</head>
<body>
   <div class="container w-75 mt-5">
    <h1 class="text-center text-capitalize mb-5 py-3 bg-primary text-bg-primary border">
        Modifier Les Infos D'un stagiair
    </h1>
    <form action="" class="container w-50" method="post">
        <input type="text" name="nom" value="<?= $row['nom'] ?>" class="form-control my-3">
        <input type="text" name="prenom" value="<?= $row['prenom'] ?>" class="form-control my-3">
        <input type="text" name="sexe" value="<?= $row['sexe'] ?>" class="form-control my-3">
        <input type="text" name="id_filiere" value="<?= $row['id_filiere'] ?>" class="form-control my-3">
       
        <button class="btn btn-dark btn-lg float-right" name="submit">Sauvegarder</button>
        <a href="index.php" class="btn btn-danger btn-lg">Annuler</a>
    </form>
   </div> 
</body>
</html>
