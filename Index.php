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
                <a href="index.php">Home</a>
                <a href="formulaireEtudiant.php">S'inscrire</a>
                <a href="formulaireConnexion.php">Se connecter</a>
            </div>
            <div class="burger_menu">
                <img src="uploads/menu_16px.png" alt="menu_burger">
            </div>
        </div>
    </div>

    <div class="sidebar">
        <div class="text-right">
            <div class="flex flex-col text-center text-black gap-y-8">
                <a href="index.php">Home</a>
                <a href="formulaireEtudiant.php">S'inscrire</a>
                <a href="formulaireConnexion.php">Se connecter</a>
            </div>
        </div>
    </div>

</nav>

<main>
    <h1 class="text-center font-bold text-4xl my-6">Bienvenue sur l'espace de parrainage</h1>
    <p class="text-center text-gray-900">Nous mettons en relation Parrain et Filleul élève du niveau 1 et 2 </p>
</main>
    
<script src="script/index.js"></script>
</body>
</html>