<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion SmartTec</title>
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
        
        .logo {
            font-weight: 700;
            letter-spacing: 1px;
        }
        
        .menu-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border-radius: 10px;
            overflow: hidden;
            border: none;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 1.5rem;
        }
        
        .menu-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
        }
        
        .card-header {
            background-color: #3498db;
            color: white;
            font-weight: 600;
            padding: 1rem;
        }
        
        .card-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
            color: #3498db;
        }
        
        .footer {
            background-color: #2c3e50;
            color: white;
            padding: 1rem 0;
            margin-top: 2rem;
            border-radius: 15px 15px 0 0;
        }
    </style>
</head>
<body>
    <!-- En-tête -->
    <div class="header-container">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h1 class="display-4 logo">Gestion SmartTec</h1>
                    <p class="lead">Plateforme interne de gestion des ressources</p>
                </div>
                <div class="col-md-4 text-end">
                    <p class="mb-0"><i class="bi bi-calendar-check"></i> Bienvenue sur votre espace de travail</p>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Contenu principal -->
    <div class="container">
        <div class="row">
            <!-- Carte Employés -->
            <div class="col-md-4">
                <div class="card menu-card">
                    <div class="card-header">
                        <h5 class="mb-0">Gestion des Employés</h5>
                    </div>
                    <div class="card-body text-center">
                        <div class="card-icon">
                            <i class="bi bi-people"></i>
                        </div>
                        <p>Ajoutez, modifiez et gérez les informations de vos employés</p>
                        <a href="employes.php" class="btn btn-primary w-100">Accéder</a>
                    </div>
                </div>
            </div>
            
            <!-- Carte Clients -->
            <div class="col-md-4">
                <div class="card menu-card">
                    <div class="card-header">
                        <h5 class="mb-0">Gestion des Clients</h5>
                    </div>
                    <div class="card-body text-center">
                        <div class="card-icon">
                            <i class="bi bi-building"></i>
                        </div>
                        <p>Consultez et mettez à jour les informations de vos clients</p>
                        <a href="clients.php" class="btn btn-primary w-100">Accéder</a>
                    </div>
                </div>
            </div>
            
            <!-- Carte Documents -->
            <div class="col-md-4">
                <div class="card menu-card">
                    <div class="card-header">
                        <h5 class="mb-0">Gestion des Documents</h5>
                    </div>
                    <div class="card-body text-center">
                        <div class="card-icon">
                            <i class="bi bi-file-earmark-text"></i>
                        </div>
                        <p>Partagez et organisez vos documents importants</p>
                        <a href="documents.php" class="btn btn-primary w-100">Accéder</a>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Section d'informations supplémentaires -->
        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4><i class="bi bi-info-circle me-2"></i>Tableau de bord</h4>
                        <p>
                            Bienvenue sur la plateforme de gestion SmartTec. Utilisez les cartes ci-dessus pour accéder aux 
                            différentes fonctionnalités de gestion des ressources internes.
                        </p>
                        <div class="alert alert-info">
                            <i class="bi bi-lightbulb me-2"></i> Astuce : Vous pouvez rapidement ajouter ou modifier des informations
                            depuis chaque module de gestion.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Pied de page -->
    <div class="container">
        <div class="footer text-center">
            <p class="mb-0">&copy; 2025 SmartTec - Tous droits réservés</p>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>