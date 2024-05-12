<?php 
include "config.php";

$query = "SELECT * FROM stagiaire";
$result = $pdo->query($query);
$rows = $result->fetchAll(PDO::FETCH_ASSOC);

if (isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "DELETE FROM stagiaire WHERE id = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$id]);
    header("location:index.php");
    exit();
}

?>
