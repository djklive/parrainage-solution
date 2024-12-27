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
        <section class="image-section md:w-1/2 lg:fixed lg:w-5/12 h-full">
            <div class="text-content">
                <h1 class="text-3xl font-bold mb-4">Rejoignez notre Programme de Parrainage</h1>
                <p class="text-lg">Inscrivez-vous pour devenir un parrain ou un filleul et bénéficiez d'un soutien académique et social tout au long de votre parcours universitaire.</p>
            </div>
        </section>

        <section class="form-section md:w-1/2 md:ml-auto lg:w-5/12">
            <h2 class="text-2xl font-bold mb-6">Inscrivez-vous</h2>
            <form class="space-y-6" action="inscription_post.php" method="POST">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="form-group">
                        <label for="prenom" class="block mb-1">Prénom</label>
                        <input type="text" name="prenom" id="prenom" class="form-input" placeholder="Votre prénom">
                        <div class="error-message"></div>
                    </div>
                    <div class="form-group">
                        <label for="nom" class="block mb-1">Nom</label>
                        <input type="text" name="nom" id="nom" class="form-input" placeholder="Votre nom">
                        <div class="error-message"></div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="email" class="block mb-1">Adresse Email</label>
                    <input type="email" name="email" id="email" class="form-input" placeholder="exemple@email.com">
                    <div class="error-message"></div>
                </div>

                <div class="form-group">
                    <label for="tel" class="block mb-1">Téléphone</label>
                    <div class="flex">
                        <input type="text" value="+237" class="form-input w-16 rounded-r-none" readonly placeholder="+237">
                        <input type="tel" name="tel" id="tel" class="form-input flex-grow rounded-l-none" placeholder="671524727">
                    </div>
                    <div class="error-message"></div>
                </div>

                <div class="form-group">
                    <label for="password" class="block mb-1">Mot de passe</label>
                    <input type="password" name="password" id="password" class="form-input" placeholder="Entrer votre mot de passe">
                    <div class="error-message"></div>
                </div>

                <div class="form-group">
                    <label for="classe" class="block mb-1">Nom de la classe</label>
                    <input type="text" name="classe" id="classe" class="form-input" placeholder="Nom du service">
                    <div class="error-message"></div>
                </div>

                <div class="form-group">
                    <label for="category-select" class="block mb-1">Niveau</label>
                    <select name="category" id="category-select" class="form-select">
                        <option value="">Sélectionnez un niveau</option>
                        <option value="Niveau 1">Niveau 1</option>
                        <option value="Niveau 2">Niveau 2</option>
                    </select>
                </div>

                <?php 
                // Affiche un message d'erreur d'inscription s'il existe
                if (isset($_SESSION['REGISTER_ERROR_MESSAGE'])) : ?>
                    <div class="bg-red-100 rounded p-3 text-center">
                            <?php 
                            echo $_SESSION['REGISTER_ERROR_MESSAGE'];
                            // Supprime le message d'erreur après l'avoir affiché
                            unset($_SESSION['REGISTER_ERROR_MESSAGE']); 
                            ?>
                    </div>
                <?php endif; ?>
                <?php 
                // Affiche un message de succès d'inscription s'il existe
                if (isset($_SESSION['REGISTER_SUCCESS_MESSAGE'])) : ?>
                    <div class="bg-green-100 rounded p-3 text-center">
                            <?php 
                            echo $_SESSION['REGISTER_SUCCESS_MESSAGE'];
                            // Supprime le message de succès après l'avoir affiché
                            unset($_SESSION['REGISTER_SUCCESS_MESSAGE']); 
                            ?>
                    </div>
                <?php endif; ?>

                <!-- <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="form-group">
                        <label for="tel" class="block mb-1">Téléphone</label>
                        <div class="flex">
                            <input type="text" value="+237" class="form-input w-16 rounded-r-none" readonly placeholder="+237">
                            <input type="tel" name="tel" id="tel" class="form-input flex-grow rounded-l-none" placeholder="671524727">
                        </div>
                        <div class="error-message"></div>
                    </div>
                    <div class="form-group">
                        <label for="ville" class="block mb-1">Ville</label>
                        <input type="text" name="ville" id="ville" class="form-input" placeholder="Votre ville">
                        <div class="error-message"></div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="category-select" class="block mb-1">Filière</label>
                    <select name="category" id="category-select" class="form-select">
                        <option value="">Sélectionnez une catégorie</option>
                        <option value="">Genie logiciel</option>
                        <option value="">Système et reseau</option>
                    </select>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="form-group">
                        <label for="noms" class="block mb-1">Nom du service</label>
                        <input type="text" name="noms" id="noms" class="form-input" placeholder="Nom du service">
                        <div class="error-message"></div>
                    </div>
                    <div class="form-group">
                        <label for="annee" class="block mb-1">Années d'expérience</label>
                        <input type="number" name="annee" id="annee" class="form-input" min="0" placeholder="Années d'expérience">
                        <div class="error-message"></div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="description" class="block mb-1">Description du service</label>
                    <textarea name="description" id="description" rows="6" class="form-textarea" placeholder="Description du service proposé (minimum 10 mots)"></textarea>
                </div> -->

                <button type="submit" name="submit" class="btn-submit">S'inscrire</button>
            </form>
        </section>
    </main>
    <script src="script/formulaireEtudiant.js"></script>
</body>
</html>