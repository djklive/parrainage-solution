<?php
session_start();

require_once(__DIR__ . '/config/mysql.php');
require_once(__DIR__ . '/databaseconnect.php');
require_once(__DIR__ . '/function.php');

if (isset($_SESSION['LOGGED_USER'])) {

if (isset($_GET['id'])) {
    $getid = intval($_GET['id']);

    $stmt = $mysqlClient->prepare("SELECT * FROM usersn1 WHERE id_user = ?");
    $stmt->execute([$getid]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        header('Location: formulaireConnexion.php'); // Rediriger si le projet n'existe pas
        exit();
    }
} else {
    redirectToUrl('formulaireConnexion.php');
}

} else {
    redirectToUrl('formulaireConnexion.php');
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <script src="config/tailwindcss.js"></script>
    <link rel="stylesheet" href="style/styleIndex.css">
</head>
<body class="bg-gray-100">

<nav class="bg-black text-white p-4">

    <div class="max-w-7xl mx-auto">
        <div class="flex justify-between items-center">
            <div>
                <h1 class="">Parrainage</h1>
            </div>
            <div class="flex items-center space-x-2" id="links">
                <a href="profil.php">Home</a>
                <a href="formulaireEtudiant.php">S'inscrire</a>
                <a href="formulaireConnexion.php">Se connecter</a>
                <?php if (isset($_SESSION['LOGGED_USER'])) : ?>
                    <a href="logout.php">Déconnexion</a>
                <?php endif; ?>
            </div>
            <div class="burger_menu">
                <img src="uploads/menu_16px.png" alt="menu_burger">
            </div>
        </div>
    </div>

    <div class="sidebar">
        <div class="text-right">
            <div class="flex flex-col text-center text-black gap-y-8">
                <a href="profil.php">Home</a>
                <a href="formulaireEtudiant.php">S'inscrire</a>
                <a href="formulaireConnexion.php">Se connecter</a>
                <?php if (isset($_SESSION['LOGGED_USER'])) : ?>
                    <a href="logout.php">Déconnexion</a>
                <?php endif; ?>
            </div>
        </div>
    </div>

</nav>

<main>
    <h1 class="text-center font-bold text-4xl my-6">Bienvenue sur votre espace <?php echo $user['prenom'] ?></h1>
    <p class="text-center text-gray-900">Ce site a pour but de mettre en lien les parrain et leurs filleuls</p>
    <div class="overflow-x-auto p-3">
        <table class="table-auto w-full text-center text-gray-900">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Listes des personnes que je parraine</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                        Vous n'avez pas encore de filleuls pour le moment
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</main>
    
<script src="script/index.js"></script>
</body>
</html>