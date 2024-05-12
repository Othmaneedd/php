<?php
include 'config.php';



$query = "SELECT s.id, s.nom, s.prenom, s.sexe, f.nom AS filiere_nom 
              FROM stagiaire s
              INNER JOIN filiere f ON s.id_filiere = f.id ";


if ($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET["s"])) {
    $query .= " WHERE 1 AND s.id_filiere = $_GET[filiere] AND s.sexe = '$_GET[sexe]' ;";
}

$stmt = $pdo->query($query);
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire Bootstrap</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h1 class="text-center">Gestion des Stagiaire</h1>
    </div>
    <div class="container my-1">
        <fieldset class="border p-1">
            <legend>Recherche</legend>
            <form>
                <div class="form-group">
                    <label for="filiere">Filière :</label>
                    <select class="form-control" id="filiere" name="filiere" required>
                        <option value="">Sélectionner une filière</option>
                        <?php
                        $query = "SELECT * FROM filiere";
                        $stmt = $pdo->query($query);
                        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

                        foreach ($results as $row) {
                            echo "<option value='" . $row['id'] . "'>" . $row['nom'] . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="sexe">Sexe :</label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="sexe" id="male" value="male" required>
                        <label class="form-check-label" for="male">Male</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="sexe" id="female" value="female" required>
                        <label class="form-check-label" for="female">Female</label>
                    </div>
                </div>
                <button type="submit" name="s" value="s" class="btn btn-primary">Find</button>
                <a href="./" class="btn btn-success">clear filter</a>
            </form>
        </fieldset>
    </div>
    <div class="container my-2">
        <h2>Liste des stagiaires</h2>
        <a href="add.php" class="btn btn-primary my-1">Ajouter Stagiaire</a>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Sexe</th>
                    <th>Filière</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($data as $row) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['nom'] . "</td>";
                    echo "<td>" . $row['prenom'] . "</td>";
                    echo "<td>" . $row['sexe'] . "</td>";
                    echo "<td>" . $row['filiere_nom'] . "</td>";
                    echo "<td>";
                    echo "<a href='delete.php?id=" . $row['id'] . "' class='btn btn-danger'>Supp</a>";
                    echo "<a href='edit.php?id=" . $row['id'] . "' class='btn btn-primary'>Mod</a>";
                    echo "</td>";
                    echo "</tr>";
                }

                ?>
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
