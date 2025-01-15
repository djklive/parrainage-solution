<?php
session_start();

require_once(__DIR__ . '/config/mysql.php');
require_once(__DIR__ . '/databaseconnect.php');
require_once(__DIR__ . '/function.php');

if (!isset($_SESSION['LOGGED_USER'])) {
    redirectToUrl('formulaireConnexion.php');
}

define('MAX_FILLEULS_PER_PARRAIN', 3); // Définir le nombre maximum de filleuls par parrain

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['attribution'])) {
    // Récupérer les étudiants de niveau 1 qui n'ont pas encore été attribués
    $sql_étudiants = $mysqlClient->query("SELECT id_user, prenom FROM `usersn1` WHERE attribution_status = 0");
    $étudiants = $sql_étudiants->fetchAll(PDO::FETCH_ASSOC);

    // Récupérer tous les parrains de niveau 2
    $sql_parrains = $mysqlClient->query("SELECT id_user, prenom FROM `usersn2`");
    $parrains = $sql_parrains->fetchAll(PDO::FETCH_ASSOC);

    // Initialiser le compteur d'attributions pour chaque parrain
    $parrainAttributions = array_fill_keys(array_column($parrains, 'id_user'), 0);

    foreach ($étudiants as $étudiant) {
        // Filtrer les parrains disponibles qui n'ont pas atteint le maximum de filleuls
        $parrains_disponibles = array_filter($parrains, function($parrain) use ($parrainAttributions) {
            return $parrainAttributions[$parrain['id_user']] < MAX_FILLEULS_PER_PARRAIN;
        });

        if (!empty($parrains_disponibles)) {
            $index = array_rand($parrains_disponibles); // Choisir un parrain aléatoire
            $parrain = $parrains_disponibles[$index]; // Obtenir le parrain choisi

            // Enregistrer l'attribution dans la base de données
            $stmt = $mysqlClient->prepare("INSERT INTO attributions (etudiant_id, parrain_id) VALUES (:etudiant_id, :parrain_id)");
            $stmt->execute(['etudiant_id' => $étudiant['id_user'], 'parrain_id' => $parrain['id_user']]);

            // Mettre à jour le statut d'attribution de l'étudiant
            $updateStmt = $mysqlClient->prepare("UPDATE usersn1 SET attribution_status = 1 WHERE id_user = :id_user");
            $updateStmt->execute(['id_user' => $étudiant['id_user']]);

            // Incrémenter le compteur d'attributions pour le parrain
            $parrainAttributions[$parrain['id_user']]++;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attributions</title>
    <script src="config/tailwindcss.js"></script>
    <link rel="stylesheet" href="style/admin.css">
</head>
<body>

    <nav class="bg-white text-black p-4 border-b-2 border-slate-300 shadow">
        <div class="max-w-7xl mx-auto">
            <div class="flex justify-between items-center">
                <div>
                    <h1 class="font-bold text-xl">Parrainage</h1>
                </div>
                <div class="flex items-center space-x-2" id="links">
                    <?php if (isset($_SESSION['LOGGED_USER'])) : ?>
                        <a href="logout.php" class="bg-black border-2 border-black text-white font-bold py-2 px-4 rounded transition duration-300 ease-in-out hover:bg-white hover:text-black hover:border-black">Déconnexion</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>

    </nav>

    <div class="container mt-4">
        <h1 class="text-center font-bold text-3xl my-6">Attributions des Parrains</h1>
        <form method="post" action="admin.php">
            <button type="submit" name="attribution" class="p-2 bg-black text-white mb-4">Lancer l'attribution</button>
        </form>
        <table class="attributions-table">
            <thead>
                <tr>
                    <th>Étudiant</th>
                    <th>Parrain</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Afficher les attributions existantes
                $sql_attributions = $mysqlClient->query("SELECT 
                        u1.prenom AS etudiant_nom, 
                        u1.classe AS etudiant_classe,
                        u1.tel AS etudiant_tel,
                        u2.prenom AS parrain_nom, 
                        u2.classe AS parrain_classe,
                        u2.tel AS parrain_tel
                    FROM attributions a
                    JOIN usersn1 u1 ON a.etudiant_id = u1.id_user
                    JOIN usersn2 u2 ON a.parrain_id = u2.id_user
                ");
                $attributions = $sql_attributions->fetchAll(PDO::FETCH_ASSOC);
                foreach ($attributions as $attribution): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($attribution['etudiant_nom']); ?> - <?php echo htmlspecialchars($attribution['etudiant_classe']); ?> - <?php echo htmlspecialchars($attribution['etudiant_tel']); ?></td>
                        <td><?php echo htmlspecialchars($attribution['parrain_nom']); ?> - <?php echo htmlspecialchars($attribution['parrain_classe']); ?> - <?php echo htmlspecialchars($attribution['parrain_tel']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>




