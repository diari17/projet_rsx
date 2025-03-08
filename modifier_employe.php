<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $poste = $_POST['poste'];
    $salaire = $_POST['salaire'];
    $date_embauche = $_POST['date_embauche'];
    $departement = $_POST['departement'];

    $sql = "UPDATE employes SET nom = :nom, prenom = :prenom, email = :email, poste = :poste, salaire = :salaire, date_embauche = :date_embauche, departement = :departement WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        'id' => $id,
        'nom' => $nom,
        'prenom' => $prenom,
        'email' => $email,
        'poste' => $poste,
        'salaire' => $salaire,
        'date_embauche' => $date_embauche,
        'departement' => $departement
    ]);

    header('Location: employes.php');
    exit();
}

$id = $_GET['id'];
$sql = "SELECT * FROM employes WHERE id = :id";
$stmt = $conn->prepare($sql);
$stmt->execute(['id' => $id]);
$employe = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un Employé</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="my-4">Modifier un Employé</h1>
        <form method="POST">
            <input type="hidden" name="id" value="<?php echo $employe['id']; ?>">
            <div class="mb-3">
                <label for="nom" class="form-label">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom" value="<?php echo $employe['nom']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="prenom" class="form-label">Prénom</label>
                <input type="text" class="form-control" id="prenom" name="prenom" value="<?php echo $employe['prenom']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $employe['email']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="poste" class="form-label">Poste</label>
                <input type="text" class="form-control" id="poste" name="poste" value="<?php echo $employe['poste']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="salaire" class="form-label">Salaire</label>
                <input type="number" step="0.01" class="form-control" id="salaire" name="salaire" value="<?php echo $employe['salaire']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="date_embauche" class="form-label">Date d'embauche</label>
                <input type="date" class="form-control" id="date_embauche" name="date_embauche" value="<?php echo $employe['date_embauche']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="departement" class="form-label">Département</label>
                <input type="text" class="form-control" id="departement" name="departement" value="<?php echo $employe['departement']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Modifier</button>
        </form>
    </div>
</body>
</html>