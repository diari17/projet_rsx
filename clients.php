<?php
include 'config.php';

// Suppression d'un client
if (isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];
    $sql = "DELETE FROM client WHERE idclient = :id";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['id' => $id]);
    header('Location: clients.php');
    exit();
}

// Récupération des clients
$sql = "SELECT * FROM client";
$stmt = $conn->query($sql);
$clients = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Clients | SmartTec</title>
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
        
        .table-wrapper {
            background-color: white;
            border-radius: 10px;
            padding: 1rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
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
        
        .action-buttons .btn {
            margin-right: 5px;
        }
        
        .table-hover tbody tr:hover {
            background-color: rgba(52, 152, 219, 0.1);
        }
        
        .search-box {
            margin-bottom: 20px;
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
                    <h1><i class="bi bi-building me-2"></i>Gestion des Clients</h1>
                    <p class="lead">Consultez, ajoutez et modifiez les informations de vos clients</p>
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
                <li class="breadcrumb-item active" aria-current="page">Clients</li>
            </ol>
        </nav>
        
        <!-- Carte principale -->
        <div class="card mb-4">
            <div class="card-header bg-primary text-white">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h5 class="mb-0"><i class="bi bi-list-ul me-2"></i>Liste des clients</h5>
                    </div>
                    <div class="col-md-6 text-end">
                        <a href="ajouter_client.php" class="btn btn-success">
                            <i class="bi bi-plus-circle me-1"></i> Ajouter un client
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <!-- Barre de recherche -->
                <div class="search-box">
                    <div class="input-group">
                        <span class="input-group-text bg-white"><i class="bi bi-search"></i></span>
                        <input type="text" id="searchInput" class="form-control" placeholder="Rechercher un client...">
                    </div>
                </div>
                
                <!-- Tableau des clients -->
                <div class="table-responsive table-wrapper">
                    <table class="table table-hover table-striped" id="clientsTable">
                        <thead class="table-light">
                            <tr>
                                <th><i class="bi bi-hash me-1"></i>ID</th>
                                <th><i class="bi bi-building me-1"></i>Société</th>
                                <th><i class="bi bi-person me-1"></i>Contact</th>
                                <th><i class="bi bi-envelope me-1"></i>Email</th>
                                <th><i class="bi bi-telephone me-1"></i>Téléphone</th>
                                <th><i class="bi bi-calendar me-1"></i>Date d'ajout</th>
                                <th><i class="bi bi-gear me-1"></i>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (count($clients) > 0): ?>
                                <?php foreach ($clients as $client): ?>
                                <tr>
                                    <td><?php echo $client['idclient']; ?></td>
                                    <td class="fw-bold"><?php echo $client['societe']; ?></td>
                                    <td><?php echo $client['contact']; ?></td>
                                    <td><a href="mailto:<?php echo $client['email']; ?>"><?php echo $client['email']; ?></a></td>
                                    <td><?php echo $client['telephone']; ?></td>
                                    <td><?php echo date('d/m/Y', strtotime($client['date_ajout'])); ?></td>
                                    <td class="action-buttons">
                                        <a href="modifier_client.php?id=<?php echo $client['idclient']; ?>" class="btn btn-sm btn-warning">
                                            <i class="bi bi-pencil-square"></i> Modifier
                                        </a>
                                        <a href="clients.php?delete_id=<?php echo $client['idclient']; ?>" class="btn btn-sm btn-danger" 
                                           onclick="return confirm('Êtes-vous sûr de vouloir supprimer le client <?php echo $client['societe']; ?> ?');">
                                            <i class="bi bi-trash"></i> Supprimer
                                        </a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="7" class="text-center py-4">
                                        <div class="alert alert-info mb-0">
                                            <i class="bi bi-info-circle me-2"></i> Aucun client n'a été trouvé.
                                            <a href="ajouter_client.php" class="alert-link">Ajouter un nouveau client</a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
                
                <!-- Résumé -->
                <div class="mt-3">
                    <p class="text-muted">
                        <i class="bi bi-people me-1"></i> Total : <?php echo count($clients); ?> client(s)
                    </p>
                </div>
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
    
    <!-- Script pour la recherche -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('searchInput');
            const table = document.getElementById('clientsTable');
            const rows = table.getElementsByTagName('tr');
            
            searchInput.addEventListener('keyup', function() {
                const filter = searchInput.value.toLowerCase();
                
                // Commencer à partir de l'index 1 pour ignorer l'en-tête
                for (let i = 1; i < rows.length; i++) {
                    const row = rows[i];
                    const cells = row.getElementsByTagName('td');
                    let shouldDisplay = false;
                    
                    // Vérifier toutes les cellules sauf la dernière (actions)
                    for (let j = 0; j < cells.length - 1; j++) {
                        const cell = cells[j];
                        if (cell) {
                            const text = cell.textContent || cell.innerText;
                            if (text.toLowerCase().indexOf(filter) > -1) {
                                shouldDisplay = true;
                                break;
                            }
                        }
                    }
                    
                    row.style.display = shouldDisplay ? '' : 'none';
                }
            });
        });
    </script>
</body>
</html>