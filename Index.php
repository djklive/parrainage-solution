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

<nav class="bg-white text-black p-4 border-b-2 border-slate-300 shadow">

    <div class="max-w-7xl mx-auto">
        <div class="flex justify-between items-center">
            <div>
                <a href="index.php"><h1 class="font-bold text-xl">Parrainage</h1></a>
            </div>
            <div class="flex items-center gap-x-10 font-bold" id="links">
                <a href="index.php" class="hover:underline hover:duration-1000">Home</a>
                <a href="formulaireEtudiant.php" class="hover:underline hover:duration-1000">
                    S'inscrire
                </a>
                <a href="formulaireConnexion.php" class="bg-orange-400 border-2 border-orange-400 text-white font-bold py-2 px-4 rounded transition duration-300 ease-in-out hover:bg-white hover:text-orange-400 hover:border-orange-400">Se connecter</a>
            </div>
            <div class="burger_menu">
                <img src="uploads/menu_30px(2).png" alt="menu_burger">
            </div>
        </div>
    </div>

    <div class="sidebar">
        <div class="text-right">
            <div class="flex flex-col text-center text-black gap-y-8">
                <a href="index.php">Home</a>
                <a href="formulaireEtudiant.php">S'inscrire</a>
                <a href="formulaireConnexion.php" class="bg-orange-400 border-2 border-orange-400 text-white font-bold py-2 px-4 rounded transition duration-300 ease-in-out hover:bg-white hover:text-orange-400 hover:border-orange-400">Se connecter</a>
            </div>
        </div>
    </div>

</nav>

<main>
    <div class="image-section w-full h-full">
        <div class="text-content w-full h-full">
            <h1 class="text-3xl font-bold mb-4">Bienvenue sur l'espace de parrainage IAI-CAMEROUN Centre de DOUALA</h1>
        </div>
    </div>

    <section class="my-8 h-64 flex flex-col justify-center items-center">
        <p class="text-center text-gray-900 mb-4">Commencer cette aventure avec nous</p>
        <div class="flex justify-center items-center gap-8">
            <a href="formulaireEtudiant.php" class="bg-gray-100 border-2 border-orange-400 text-orange-400 font-bold py-2 px-4 rounded shadow-md transition duration-300 ease-in-out transform hover:bg-orange-400 hover:text-white hover:border-orange-400 hover:scale-105">
                S'inscrire
            </a>
            <a href="formulaireConnexion.php" class="bg-orange-400 border-2 border-orange-400 text-white font-bold py-2 px-4 rounded shadow-md transition duration-300 ease-in-out transform hover:bg-gray-100 hover:text-orange-400 hover:border-orange-400 hover:scale-105">
                Se connecter
            </a>
        </div>
    </section>
</main>

<footer class="bg-black text-white p-10">
    <div>
        <div class="flex flex-col sm:flex-row items-center gap-y-14 sm:gap-y-0 sm:items-stretch sm:justify-around">
            <img src="uploads/logo_iai.png" alt="logo_iai" class="w- p-2">
            <div>
                <h1 class="font-bold text-xl">Reseaux sociaux</h1>
                <div class='flex gap-2'>
                    <a href="https://web.facebook.com/IAICamerounOfficiel/?locale=fr_FR&_rdc=1&_rdr#"><img src="uploads/facebook_48px.png" alt=""></a>
                    <a href="https://iaicameroun.com/home"><img src="uploads/google_48px.png" alt=""></a>
                    <a href="https://www.tiktok.com/@iaidouala?_t=ZN-8seP7YA6SHO&_r=1"><img src="uploads/tiktok_48px.png" alt=""></a>
                </div>
            </div>
            <div>
                <h1 class="font-bold text-xl">Acces rapide</h1>
                <a href="index.php">Home</a>
            </div>
            <div>
                <h1 class="font-bold text-xl">Nos coordonnees</h1>
                <a href="#" class="italic">Adresse : B.P. : 2263, IAI,<br> Libreville - Gabon</a>
                <br><a href="#" class="italic">Tel. : +237 6 71 52 47 27</a>
                <br><a href="#" class="italic">Tel. : +237 6 56 96 65 82</a>
                <br><a href="#" class="italic">Tel. : +237 6 74 58 99 58</a>
                <br><a href="#" class="italic">Email:contact@iai-siege</a>
            </div>
        </div>
    </div>
    <hr class="my-6">
    <div class='flex justify-center my-8 items-center h-6'>
        <p>Copyright &COPY; IAI 2025 | Parrainage IAI 2025 | DFK Tech</p>
    </div>
</footer>
    
<script src="script/index.js"></script>
</body>
</html>