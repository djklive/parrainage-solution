<?php
session_start();

require_once(__DIR__ . '/config/mysql.php');
require_once(__DIR__ . '/databaseconnect.php');
require_once(__DIR__ . '/function.php');

//empecher l'utilisateur qui est deconnecter d'acceder au profile
if (!$_SESSION['LOGGED_USER']) {
    redirectToUrl('formulaireConnexion.php');
}

if (isset($_SESSION['LOGGED_USER']['user_id'])) {
    $getid = intval($_SESSION['LOGGED_USER']['user_id']);

    if ($_SESSION['LOGGED_USER']['level'] =='1') {
        $stmt = $mysqlClient->prepare("SELECT * FROM usersn1 WHERE id_user = ?");
        $stmt->execute([$getid]);

        // Récupérer le parrain de l'étudiant
            $sql_parrain = $mysqlClient->prepare("
                SELECT u2.prenom AS parrain_nom, u2.filière AS parrain_classe, u2.tel AS parrain_tel
                FROM attributions a
                JOIN usersn2 u2 ON a.parrain_id = u2.id_user
                WHERE a.etudiant_id = ?
            ");
            $sql_parrain->execute([$getid]);
            $parrain = $sql_parrain->fetch(PDO::FETCH_ASSOC);
    }else{
        $stmt = $mysqlClient->prepare("SELECT * FROM usersn2 WHERE id_user = ?");
        $stmt->execute([$getid]);

        // Récupérer les filleuls du parrain
            $sql_filleuls = $mysqlClient->prepare("
                SELECT u1.prenom AS etudiant_nom, u1.filière AS etudiant_classe, u1.tel AS etudiant_tel
                FROM attributions a
                JOIN usersn1 u1 ON a.etudiant_id = u1.id_user
                WHERE a.parrain_id = ?
            ");
            $sql_filleuls->execute([$getid]);
            $filleuls = $sql_filleuls->fetchAll(PDO::FETCH_ASSOC);
    }
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        redirectToUrl('formulaireConnexion.php'); // Rediriger si l'utilisateur n'existe pas
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
    <link rel="stylesheet" href="style/StyleIndex.css">
</head>
<body class="bg-gray-100">

<nav class="bg-white text-black p-4 border-b-2 border-slate-300 shadow">

    <div class="max-w-7xl mx-auto">
        <div class="flex justify-between items-center">
            <div>
                <h1 class="font-bold text-xl">Parrainage</h1>
            </div>
            <div class="flex items-center gap-x-10 font-bold" id="links">
                
                <?php if (!isset($_SESSION['LOGGED_USER'])) : ?>
                    <a href="profil.php">Home</a>
                    <a href="formulaireEtudiant.php">S'inscrire</a>
                    <a href="formulaireConnexion.php" class="bg-orange-400 border-2 border-orange-400 text-white font-bold py-2 px-4 rounded transition duration-300 ease-in-out hover:bg-white hover:text-orange-400 hover:border-orange-400">Se connecter</a>
                <?php endif; ?>
                <?php if (isset($_SESSION['LOGGED_USER'])) : ?>
                    <a href="logout.php" class="bg-black border-2 border-black text-white font-bold py-2 px-4 rounded transition duration-300 ease-in-out hover:bg-white hover:text-black hover:border-black">Déconnexion</a>
                <?php endif; ?>
            </div>
            <div class="burger_menu">
                <img src="uploads/menu_30px(2).png" alt="menu_burger">
            </div>
        </div>
    </div>

    <div class="sidebar">
        <div class="text-right">
            <div class="flex flex-col text-center text-black gap-y-8">
                <?php if (!isset($_SESSION['LOGGED_USER'])) : ?>
                    <a href="profil.php">Home</a>
                    <a href="formulaireEtudiant.php">S'inscrire</a>
                    <a href="formulaireConnexion.php" class="bg-orange-400 border-2 border-orange-400 text-white font-bold py-2 px-4 rounded transition duration-300 ease-in-out hover:bg-white hover:text-orange-400 hover:border-orange-400">Se connecter</a>
                <?php endif; ?>
                <?php if (isset($_SESSION['LOGGED_USER'])) : ?>
                    <a href="logout.php" class="bg-black border-2 border-black text-white font-bold py-2 px-4 rounded transition duration-300 ease-in-out hover:bg-white hover:text-black hover:border-black">Déconnexion</a>
                <?php endif; ?>
            </div>
        </div>
    </div>

</nav>

<main>
    <h1 class="text-center font-bold text-4xl my-6">Bienvenue sur votre espace <?php echo $user['prenom'] ?></h1>
    <p class="text-center text-gray-900">Ce site a pour but de mettre en lien les parrains et leurs filleuls</p>
    <div class="overflow-x-auto p-3">
        <table class="table-auto w-full text-center text-gray-900">
            <?php if ($_SESSION['LOGGED_USER']['level'] =='1'): ?>
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider text-center">Parrain</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider text-center">Classe Parrain</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider text-center">Numéro Parrain</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <?php if ($parrain): ?>
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                <?php echo htmlspecialchars($parrain['parrain_nom']); ?>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                <?php echo htmlspecialchars($parrain['parrain_classe']); ?>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                <?php echo htmlspecialchars($parrain['parrain_tel']); ?>
                            </td>
                        </tr>
                    <?php else: ?>
                        <tr>
                            <td colspan="3" class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                Aucun parrain attribué pour le moment.
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            <?php elseif ($_SESSION['LOGGED_USER']['level'] =='2'): ?>
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider text-center">Filleul</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider text-center">Classe Filleul</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider text-center">Numéro Filleul</th>
                    </tr>
                </thead>   
                <tbody class="bg-white divide-y divide-gray-200">
                    <?php if (!empty($filleuls)): ?>
                        <?php foreach ($filleuls as $filleul): ?>
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                    <?php echo htmlspecialchars($filleul['etudiant_nom']); ?>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                    <?php echo htmlspecialchars($filleul['etudiant_classe']); ?>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                    <?php echo htmlspecialchars($filleul['etudiant_tel']); ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="3" class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                Vous n'avez pas encore de filleuls pour le moment.
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody> 
            <?php endif; ?>    
        </table>
    </div>
</main>
    
<script src="script/index.js"></script>
</body>
</html>