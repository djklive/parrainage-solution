<?php 
session_start();

require_once(__DIR__ . '/config/mysql.php');
require_once(__DIR__ . '/databaseconnect.php');
require_once(__DIR__ . '/function.php');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire d'inscription prestataire</title>
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
     <script src="config/tailwindcss.js"></script>
    <link rel="stylesheet" href="style/formulaireÉtudiant.css">
    
</head>
<body class="bg-gray-100">
    <main class="container mx-auto px-4 py-8 flex flex-col md:flex-row gap-8">
        <a href="index.php"><img src="uploads/left_50px.png" alt=""></a>

        <section class="image-section md:w-1/2 lg:fixed lg:w-5/12 h-full">
            <div class="text-content">
                <h1 class="text-3xl font-bold mb-4">Rejoignez notre Programme de Parrainage</h1>
                <p class="text-lg">Inscrivez-vous pour devenir un parrain ou un filleul et bénéficiez d'un soutien académique et social tout au long de votre parcours universitaire.</p>
            </div>
        </section>

        <section class="form-section md:w-1/2 md:ml-auto lg:w-5/12">
            <h2 class="text-2xl font-bold mb-6">Connectez-vous</h2>
            <form class="space-y-6" action="Connexion_submit.php" method="POST">
                

                <div class="form-group">
                    <label for="email" class="block mb-1">Adresse Email</label>
                    <input type="email" name="email" id="email" class="form-input" placeholder="exemple@email.com">
                    <div class="error-message"></div>
                </div>

                

                <div class="form-group">
                    <label for="password" class="block mb-1">Mot de passe</label>
                    <input type="password" name="password" id="password" class="form-input" placeholder="Entrer votre mot de passe">
                    <div class="error-message"></div>
                </div>
                

                <?php 
                // Affiche un message d'erreur de connexion s'il existe
                if (isset($_SESSION['LOGIN_ERROR_MESSAGE'])) : ?>
                    <div class="bg-red-100 rounded p-3 text-center">
                            <?php 
                            echo $_SESSION['LOGIN_ERROR_MESSAGE'];
                            // Supprime le message d'erreur après l'avoir affiché
                            unset($_SESSION['LOGIN_ERROR_MESSAGE']); 
                            ?>
                    </div>
                <?php endif; ?>

                

                <button type="submit" name="submit" class="btn-submit">Se connecter</button>
            </form>
        </section>
    </main>
    <script src="script/formulaireConnexion.js"></script>
</body>
</html>