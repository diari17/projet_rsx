<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $societe = $_POST['societe'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];
    $date_ajout = $_POST['date_ajout'];

    $sql = "INSERT INTO client (societe, contact, email, telephone, date_ajout) VALUES (:societe, :contact, :email, :telephone, :date_ajout)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        'societe' => $societe,
        'contact' => $contact,
        'email' => $email,
        'telephone' => $telephone,
        'date_ajout' => $date_ajout
    ]);

    header('Location: clients.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Client | SmartTec</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .header-container {
            background-color: #2c3e50;
            color: white;
            padding: 2rem 0;
            margin-bottom: 2rem;
            border-radius: 0 0 15px 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        
        .card {
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border: none;
        }
        
        .btn-action {
            margin-right: 5px;
        }
        
        .footer {
            background-color: #2c3e50;
            color: white;
            padding: 1rem 0;
            margin-top: 2rem;
            border-radius: 15px 15px 0 0;
            text-align: center;
        }
        
        .breadcrumb {
            background-color: transparent;
            padding: 0;
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>
    <!-- En-tête -->
    <div class="header-container">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h1><i class="bi bi-building me-2"></i>Ajouter un Client</h1>
                    <p class="lead">Ajoutez un nouveau client à votre base de données</p>
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
                <li class="breadcrumb-item"><a href="clients.php">Clients</a></li>
                <li class="breadcrumb-item active" aria-current="page">Ajouter un client</li>
            </ol>
        </nav>
        
        <!-- Carte principale -->
        <div class="card mb-4">
            <div class="card-header bg-primary text-white">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h5 class="mb-0"><i class="bi bi-plus-circle me-2"></i>Ajouter un client</h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form method="POST">
                    <div class="mb-3">
                        <label for="societe" class="form-label">Société</label>
                        <input type="text" class="form-control" id="societe" name="societe" required>
                    </div>
                    <div class="mb-3">
                        <label for="contact" class="form-label">Contact</label>
                        <input type="text" class="form-control" id="contact" name="contact" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="telephone" class="form-label">Téléphone</label>
                        <input type="text" class="form-control" id="telephone" name="telephone">
                    </div>
                    <div class="mb-3">
                        <label for="date_ajout" class="form-label">Date d'ajout</label>
                        <input type="date" class="form-control" id="date_ajout" name="date_ajout" required>
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