<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nom = $_POST['nom'];
    $typedoc = $_POST['typedoc'];
    $descriptiondoc = $_POST['descriptiondoc'];

    $sql = "UPDATE document SET nom = :nom, typedoc = :typedoc, descriptiondoc = :descriptiondoc WHERE iddoc = :id";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        'id' => $id,
        'nom' => $nom,
        'typedoc' => $typedoc,
        'descriptiondoc' => $descriptiondoc
    ]);

    header('Location: documents.php');
    exit();
}

$id = $_GET['id'];
$sql = "SELECT * FROM document WHERE iddoc = :id";
$stmt = $conn->prepare($sql);
$stmt->execute(['id' => $id]);
$document = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un Document | SmartTec</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        /* Styles identiques à clients.php */
    </style>
</head>
<body>
    <!-- En-tête -->
    <div class="header-container">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h1><i class="bi bi-file-earmark me-2"></i>Modifier un Document</h1>
                    <p class="lead">Modifiez les informations du document</p>
                </div>
                <div class="col-md-4 text-end">
                    <a href="index.php" class="btn btn-outline-light">
                        <i class="bi bi-house-door"></i> Retour à l'accueil
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <!-- Fil d'Ariane -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Accueil</a></li>
                <li class="breadcrumb-item"><a href="documents.php">Documents</a></li>
                <li class="breadcrumb-item active" aria-current="page">Modifier un document</li>
            </ol>
        </nav>
        
        <!-- Carte principale -->
        <div class="card mb-4">
            <div class="card-header bg-primary text-white">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h5 class="mb-0"><i class="bi bi-pencil-square me-2"></i>Modifier un document</h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form method="POST">
                    <input type="hidden" name="id" value="<?php echo $document['iddoc']; ?>">
                    <div class="mb-3">
                        <label for="nom" class="form-label">Nom</label>
                        <input type="text" class="form-control" id="nom" name="nom" value="<?php echo $document['nom']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="typedoc" class="form-label">Type</label>
                        <input type="text" class="form-control" id="typedoc" name="typedoc" value="<?php echo $document['typedoc']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="descriptiondoc" class="form-label">Description</label>
                        <textarea class="form-control" id="descriptiondoc" name="descriptiondoc" rows="3"><?php echo $document['descriptiondoc']; ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save me-1"></i> Enregistrer
                    </button>
                </form>
            </div>
        </div>
    </div>
    
    <!-- Pied de page -->
    <div class="container">
        <div class="footer">
            <p class="mb-0">&copy; 2025 SmartTec - Tous droits réservés</p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>