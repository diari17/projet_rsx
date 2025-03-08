<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom = $_POST['nom'];
    $typedoc = $_POST['typedoc'];
    $descriptiondoc = $_POST['descriptiondoc'];

    // Gestion de l'upload du fichier
    if (isset($_FILES['fichier']) && $_FILES['fichier']['error'] == 0) {
        $file_name = $_FILES['fichier']['name']; // Nom du fichier
        $file_tmp = $_FILES['fichier']['tmp_name']; // Emplacement temporaire du fichier
        $file_size = $_FILES['fichier']['size']; // Taille du fichier
        $file_type = $_FILES['fichier']['type']; // Type du fichier

        // Définir le dossier de destination pour les fichiers uploadés
        $upload_dir = 'uploads/';
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0755, true); // Crée le dossier s'il n'existe pas
        }

        // Déplacer le fichier vers le dossier de destination
        $file_path = $upload_dir . basename($file_name);
        if (move_uploaded_file($file_tmp, $file_path)) {
            // Insertion des données dans la base de données
            $sql = "INSERT INTO document (nom, typedoc, descriptiondoc, fichier_nom, fichier_chemin, fichier_taille, fichier_type) 
                    VALUES (:nom, :typedoc, :descriptiondoc, :fichier_nom, :fichier_chemin, :fichier_taille, :fichier_type)";
            $stmt = $conn->prepare($sql);
            $stmt->execute([
                'nom' => $nom,
                'typedoc' => $typedoc,
                'descriptiondoc' => $descriptiondoc,
                'fichier_nom' => $file_name,
                'fichier_chemin' => $file_path,
                'fichier_taille' => $file_size,
                'fichier_type' => $file_type
            ]);

            header('Location: documents.php');
            exit();
        } else {
            echo "<script>alert('Erreur lors du téléversement du fichier.');</script>";
        }
    } else {
        echo "<script>alert('Veuillez sélectionner un fichier.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Document | SmartTec</title>
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
                    <h1><i class="bi bi-file-earmark-plus me-2"></i>Ajouter un Document</h1>
                    <p class="lead">Ajoutez un nouveau document à votre base de données</p>
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
                <li class="breadcrumb-item active" aria-current="page">Ajouter un document</li>
            </ol>
        </nav>
        
        <!-- Carte principale -->
        <div class="card mb-4">
            <div class="card-header bg-primary text-white">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h5 class="mb-0"><i class="bi bi-plus-circle me-2"></i>Ajouter un document</h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="nom" class="form-label">Nom</label>
                        <input type="text" class="form-control" id="nom" name="nom" required>
                    </div>
                    <div class="mb-3">
                        <label for="typedoc" class="form-label">Type</label>
                        <input type="text" class="form-control" id="typedoc" name="typedoc" required>
                    </div>
                    <div class="mb-3">
                        <label for="descriptiondoc" class="form-label">Description</label>
                        <textarea class="form-control" id="descriptiondoc" name="descriptiondoc" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="fichier" class="form-label">Fichier</label>
                        <input type="file" class="form-control" id="fichier" name="fichier" required>
                    </div>
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save me-1"></i> Ajouter
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